<?php
include_once($SERVER_ROOT.'/classes/Manager.php');

class SchemaManager extends Manager{

	private $adminConn;
	private $currentVersion;
	private $targetSchema;
	private $activeTableArr;

	private $logPath;
	private $amendmentPath;
	private $amendmentFH = false;

	public function __construct(){
		parent::__construct();
	}

	public function __destruct(){
		parent::__destruct();
		if($this->amendmentFH) fclose($this->amendmentFH);
	}

	public function installPatch($host, $username, $database, $port){
		if($this->targetSchema){
			$this->logPath = $GLOBALS['SERVER_ROOT'] . '/content/logs/install/db_schema_patch-' . $this->targetSchema. '_'.date('Y-m-d').'.log';
			$this->amendmentPath = $GLOBALS['SERVER_ROOT'] . '/content/logs/install/db_schema_patch-' . $this->targetSchema. '_' . time() . '_failed.sql';
			$this->setVerboseMode(3);
			$this->setLogFH($this->logPath);
			if($this->setDatabaseConnection($host, $username, $database, $port)){
				$this->logOrEcho('Connection to database established ('.date('Y-m-d H:i:s').')');
				if($sqlArr = $this->readSchemaFile()){
					/*
					foreach($sqlArr as $arr){
						print_r($arr);
						echo '<br>';
					}
					return false;
					*/
					$this->logOrEcho('DB schema file analyzed: '. count($sqlArr) . ' statements to apply');
					$cnt = 0;
					foreach($sqlArr as $lineCnt => $stmtArr){
						$cnt++;
						$this->logOrEcho('Statement #' . ($cnt) . ' - line '.$lineCnt.' (' . date('Y-m-d H:i:s') . ')');
						$stmtType = '';
						$targetTable = '';
						$sql ='';
						foreach($stmtArr as $fragment){
							if(substr($fragment, 0, 1) == '#'){
								//is comment
								trim($fragment, '#');
								$this->logOrEcho($fragment, 1);
							}
							elseif(!$stmtType){
								if(preg_match('/`([a-z]+)`/', $fragment, $m)){
									$targetTable = $m[1];
								}
								$stmtType = 'undefined';
								if(strpos($fragment, 'ALTER TABLE') === 0){
									$stmtType = 'ALTER TABLE';
									$this->setActiveTable($targetTable);
								}
								elseif(strpos($fragment, '/*!') === 0) $stmtType = 'Conditional statement';
								elseif(preg_match('/^([A-Z\s]+)/', $fragment, $m)){
									$stmtType = $m[1];
								}
								$this->logOrEcho('Type: ' . $stmtType . ($targetTable ? ' '.$targetTable : ''), 1);
								$sql = $fragment;
							}
							else{
								if($stmtType == 'ALTER TABLE') $fragment = $this->validateAlterTableFragment($fragment, 'w');
								if($fragment) $sql .= ' ' . $fragment;
							}
						}
						if($sql){
							//$this->logOrEcho('Statement: ' . $sql, 1);
							if($this->conn->query($sql)){
								$this->logOrEcho('Success!', 1);
								if(isset($this->warningArr['updated'])){
									$this->logOrEcho('Following adjustments applied:', 2);
									foreach($this->warningArr['updated'] as $adjustStr){
										$this->logOrEcho($adjustStr, 3);
									}
									unset($this->warningArr['updated']);
								}
								if($this->warningArr){
									//Add these warnings to amendment file since they should be reapplied
									if(!$this->amendmentFH) $this->amendmentFH = fopen($this->amendmentPath, 'w');
									$this->logOrEcho('Following fragments excluded due to errors:', 2);
									foreach($this->warningArr as $errCode => $errArr){
										foreach($errArr as $colName => $frag){
											if($errCode == 'exists') $this->logOrEcho($colName.' already exists ', 3);
											elseif($errCode == 'missing') $this->logOrEcho($colName.' does not exists ', 3);
											$failedSql .= $frag;
										}
									}
									fwrite($this->amendmentFH, '# '.$targetTable."\n");
									fwrite($this->amendmentFH, $failedSql."\n\n");
								}
							}
							else{
								if(!$this->amendmentFH) $this->amendmentFH = fopen($this->amendmentPath, 'w');
								$this->logOrEcho('ERROR: ' . $this->conn->error, 2);
								//break;
							}
						}
						//Reset for next statement
						unset($this->warningArr);
						$this->warningArr = array();
						flush();
						ob_flush();
					}
					$this->logOrEcho('Finished: schema applied');
					$logUrl = str_replace($GLOBALS['SERVER_ROOT'], $GLOBALS['CLIENT_ROOT'], $this->logPath);
					$this->logOrEcho('Log file: <a href="' . $logUrl . '" target="_blank">' . $logUrl . '</a>');
					$amendmentUrl = str_replace($GLOBALS['SERVER_ROOT'], $GLOBALS['CLIENT_ROOT'], $this->amendmentPath);
					if($this->amendmentFH) $this->logOrEcho('Amendment (failed statements needing to be applied): ' . $amendmentUrl);
				}
			}
		}
	}

	private function readSchemaFile(){
		$sqlArr = false;
		$filename = $GLOBALS['SERVER_ROOT'] . '/config/schema-1.0/utf8/db_schema';
		if($this->targetSchema != '1.0') $filename .= '_patch';
		$filename .= '-'.$this->targetSchema.'.sql';
		if(file_exists($filename)){
			if($fileHandler = fopen($filename, 'r')){
				$sqlArr = array();
				$cnt = 1;
				$index = 0;
				$delimiter = ';';
				while(!feof($fileHandler)) {
					$line = trim(fgets($fileHandler));
					if($line){
						if(!$index) $index = $cnt;
						if(substr($line, 0, 2) == '--') continue;
						if(substr($line, 0, 9) == 'DELIMITER'){
							$delimiter = trim(substr($line, 9));
						}
						else{
							if($line) $sqlArr[$index][] = $line;
						}
						if(substr($line, -strlen($delimiter)) == $delimiter) $index = 0;
					}
					$cnt++;
				}
				fclose($fileHandler);
			}
		}
		else{
			$this->logOrEcho('ABORT: db schema patch does not exist: ' . $filename);
			return false;
		}
		return $sqlArr;
	}

	private function setActiveTable($targetTable){
		unset($this->activeTableArr);
		if($targetTable){
			$this->activeTableArr = array();
			$sql = 'SHOW COLUMNS FROM ' . $targetTable;
			if($rs = $this->conn->query($sql)){
				while($r = $rs->fetch_object()){
					$fieldName = strtolower($r->Field);
					$type = $r->Type;
					if(preg_match('/^([a-z]+)/', $type, $m)){
						$this->activeTableArr[$fieldName]['type'] = $m[1];
					}
					if(preg_match('#\(([\d]*?)\)#', $type, $n)){
						$this->activeTableArr[$fieldName]['length'] = $n[1];
					}
				}
				$rs->free();
			}
			else{
				$this->logOrEcho('ERROR: '.$this->conn->error, 2);
				$this->logOrEcho($sql, 2);
			}
		}
	}

	private function validateAlterTableFragment($fragment){
		if($this->activeTableArr){
			if(strpos($fragment, 'ADD COLUMN') !== false){
				if(preg_match('/^ADD COLUMN `([A-Za-z]+)`/', $fragment, $m)){
					$colName = strtolower($m[1]);
					if(array_key_exists($colName, $this->activeTableArr)){
						$this->warningArr['exists'][$colName] = $fragment;
						return false;
					}
				}
			}
			elseif(strpos($fragment, 'CHANGE COLUMN') !== false){
				if(preg_match('/^CHANGE COLUMN `([A-Za-z]+)` .+ VARCHAR\((\d+)\)/', $fragment, $m)){
					$colName = strtolower($m[1]);
					if(!array_key_exists($colName, $this->activeTableArr)){
						$this->warningArr['missing'][$colName] = $fragment;
						return false;
					}
					$colWidth = $m[2];
					if(isset($this->activeTableArr[$colName]['length']) && $colWidth < $this->activeTableArr[$colName]['length']){
						$this->warningArr['updated'][$colName] = 'Field length expanded from '.$colWidth.' to '.$this->activeTableArr[$colName]['length'];
						$fragment = preg_replace('/VARCHAR(\d+)/', 'VARCHAR(' . $this->activeTableArr[$colName]['length'] . ')', $fragment);
					}
				}
			}
		}
		return $fragment;
	}

	//Misc support functions
	private function setDatabaseConnection($host, $username, $database, $port){
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		if($host && $username && $password && $database && $port){
			$this->conn = new mysqli($host, $username, $password, $database, $port);
			if($this->conn->connect_error){
				$this->logOrEcho('Connection error: ' . $this->conn->connect_error);
				return false;
			}
		}
		else{
			$this->conn = MySQLiConnectionFactory::getCon('admin');
		}
		return true;
	}

	//Misc data retrival functions
	public function getVersionHistory(){
		$versionHistory = false;
		$sql = 'SELECT versionNumber, dateApplied FROM schemaversion ORDER BY id';
		if($rs = $this->conn->query($sql)){
			$versionHistory = array();
			while($r = $rs->fetch_object()){
				$versionHistory[$r->versionNumber] = $r->dateApplied;
				$this->currentVersion = $r->versionNumber;
			}
			$rs->free();
		}
		return $versionHistory;
	}

	//Setters and getters
	public function getCurrentVersion(){
		return $this->currentVersion;
	}

	public function setTargetSchema($schema){
		$this->targetSchema = $schema;
	}
}
?>