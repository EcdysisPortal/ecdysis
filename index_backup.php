<?php
include_once('config/symbini.php');
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/index.'.$LANG_TAG.'.php')) include_once($SERVER_ROOT.'/content/lang/index.en.php');
else include_once($SERVER_ROOT.'/content/lang/index.'.$LANG_TAG.'.php');
header('Content-Type: text/html; charset=' . $CHARSET);
?>
<html>
<head>
	<title><?php echo $DEFAULT_TITLE; ?> Home</title>
	<?php
	include_once($SERVER_ROOT . '/includes/head.php');
	include_once($SERVER_ROOT . '/includes/googleanalytics.php');
	?>
	<link href="<?php echo $CSS_BASE_PATH; ?>/quicksearch.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php
	include($SERVER_ROOT . '/includes/header.php');
	?>
	<div class="navpath"></div>
	<div id="innertext">

        <div id="quicksearchdiv">
               <!-- QUICK SEARCH SETTINGS -->
             <form name="quicksearch" id="quicksearch" action="<?php echo $CLIENT_ROOT; ?>/taxa/index.php" method="get" onsubmit="return verifyQuickSearch(this);">
             <div id="quicksearchtext" ><?php echo (isset($LANG['QSEARCH_SEARCH'])?$LANG['QSEARCH_SEARCH']:'Quick Search by Taxon'); ?></div>
             <input id="taxa" type="text" name="taxon" />
             <button name="formsubmit"  id="quicksearchbutton" type="submit" value="Search Terms"><?php echo (isset($LANG['QSEARCH_SEARCH_BUTTON'])?$LANG['QSEARCH_SEARCH_BUTTON']:'Search'); ?></button>
             </form>
       </div>
	
		<?php
		if($LANG_TAG == 'es'){
			?>
			<div style="max-width:700px;text-align:center;margin:0 auto;">
				<h1 style="text-align:center;">Acerca de ecdysis</h1>
				<p>Bienvenidos a <b>ecdysis</b>, un portal para el manejo datos de colecciones de artrópodos en tiempo real, alojado en el Centro de Integración del Conocimiento de la Biodiversidad (<a target="_blank" href="https://biokic.asu.edu/">Biodiversity Knowledge Integration Center</a>) de la Universidad Estatal de Arizona (Arizona State University). <b>ecdysis</b> fue diseñado con el fin de proporcionar, a la comunidad de colecciones de artrópodos, una herramienta eficiente y confiable para la digitalización y el manejo de datos. </p>
				<p>Guía en español para digitalizar especímenes disponible <a target="_blank" href="https://serv.biokic.asu.edu/ecdysis/InstruccionesEcdysis.pdf">aquí</a>, elaborada por Samanta Orellana (sorellana@asu.edu).</p>
				<p>Este portal está diseñado para funcionar como un nodo dentro del <a target="_blank" href="https://riojournal.com/article/8767">Biodiversity Knowledge Graph</a>.  Esto significa que ecdysis está construido para interactuar y compartir datos de biodiversidad con otros portales, no para funcionar como un portal individual que contenga todos los datos de biodiversidad.
				<img src="https://serv.biokic.asu.edu/ecdysis/images/fulgorids.jpg" style="display:block;width:98%;float:center;"/>
				<p>Para obtener más información acerca de la creación de perfiles para las colecciones, por favor contactar a Andrew Johnston (ajohnston@asu.edu).</p> 
			</div>
			<?php
		}
		else{
			//Default Language
			?>
			<div style="max-width:700px;text-align:center;margin:0 auto;">
				<h1 style="text-align:center;">About ecdysis</h1>
				<p>Welcome to <b>ecdysis</b>, a portal for live-managing arthropod collections data. <b>ecdysis</b> is designed to serve the arthropod collections community as a robust and efficient environment for collections digitization and data management.</p>
				<p>This portal is designed to work as one node within the online <a target="_blank" href="https://riojournal.com/article/8767">Biodiversity Knowledge Graph</a>.  Not intended to be a single portal to integrate all biodiversity data, <b>ecdysis</b> is built to interact with and share biodiversity data between other such portals. <b>ecdysis</b> instead provides access to management and research tools to arthropod collections and researchers.</p>
				<img src="https://serv.biokic.asu.edu/ecdysis/images/fulgorids.jpg" style="display:block;width:98%;float:center;"/>
				<p>Hosted by the <a target="_blank" href="https://biokic.asu.edu/">Biodiversity Knowledge Integration Center</a> at Arizona State University. To set up a new collection, report a bug, or get help with data transfers or portal tools - please submit a ticket through the <a href="https://help.symbiota.org/" target="_blank">Symbiota Support Hub Help Desk</a> For other ecdysis-related inquiries you may contact the portal manager Andrew Johnston (ajohnston@asu.edu) or the ecdysis steering committee chair Sangmi Lee (slee281@asu.edu).</p> 
				
			</div>
			<?php
		}
		?>
	</div>
	<?php
	include($SERVER_ROOT . '/includes/footer.php');
	?>
</body>
</html>
