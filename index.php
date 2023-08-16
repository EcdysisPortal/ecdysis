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
				<p>Bienvenidos a <b>ecdysis</b> - un portal para el manejo datos de ocurrencia de artrópodos en tiempo real. El portal <b>ecdysis</b> está diseñado para proporcionar un ambiente eficiente para la digitalización de colecciones y proyectos de investigación basados en datos, para la comunidad de colecciones entomológicas. La comunidad de  <b>ecdysis</b> está abierta y da la bienvenida a todas las colecciones e individuos que deseen publicar, manejar y analizar datos de ocurrencia de artrópodos, especialmente de especímenes digitalizados.</p>
				<p>Visite nuestra <a href="<?php echo $CLIENT_ROOT; ?>/misc/contacts.php">página de Contactos</a> para más información acerca del portal, el comité directivo y más recursos de ayuda.</p>
				<p>Guía en español para digitalizar especímenes disponible <a target="_blank" href="https://serv.biokic.asu.edu/ecdysis/InstruccionesEcdysis.pdf">aquí</a>, elaborada por Samanta Orellana (sorellana@asu.edu).</p>

				<br><br>
				<h3>Las siguientes herramientas están disponibles para los usuarios del portal:</h3>
				<h4 style="text-align:left;padding-left:15px;">Herramientas de manejo de Colecciones</h4>
				<ul class="hometext">
				<li>Ingreso y edición de registros individuales o por lote, por medio de herramientas en línea.</li>
				<li>Uso de herramientas de crowdsourcing para transcribir y limpiar datos</li>
				<li>Manejo y rastreo de préstamos</li>
				<li>Generación de etiquetas personalizadas de localidad y determinación desde la base de datos</li>
				<li>Georreferenciación y visualización de registros de especímenes en mapas</li>
				<li>Utilización de un tesauro taxonómico curado por la comunidad</li>
				<li>Vinculación de registros en el portal o plataformas externas</li>
				<li>Publicación de datos en GBIF, iDigBio y otros servicios como Bionomia</li>
				</ul>
				<p></p>
				<h4 style="text-align:left;padding-left:15px;">Herramientas de Investigación</h4>
				<ul class="hometext">
				<li>Creación y manejo de Listados de Especie: colabore y comparta listados con la posibilidad de vincular vouchers e imágenes específicos, y de exportarlos para publicaciones</li>
				<li>Creación de claves de identificación vinculadas a grupos taxonómicos o listados específicos</li>
				<li>Curación directa de conjuntos de datos o listados de registros para uso en proyectos de investigación</li>
				<li>Descarga de resultados de búsquedas o visualizaciones en mapas en tiempo real</li>
				</ul>
				<p></p>
				<h4 style="text-align:left;padding-left:15px;">Recursos de la Comunidad</h4>
				<ul class="hometext">
				<li><a target="_blank" href="https://biokic.github.io/symbiota-docs/es/">Documentación de Symbiota</a></li>
				<li><a target="_blank" href="https://help.symbiota.org/">Tickets de Asistencia</a> del Equipo Symbiota</li>
				<li><a target="_blank" href="https://forms.gle/rcoSSnnfRnGhVo676">Genere un perfil de colección</a> en ecdysis</li>
				<li> Interactuar con el <a href="<?php echo $CLIENT_ROOT; ?>/misc/contacts.php">Comité Directivo de ecdysis</a></li>
				</ul>
			
			</div>
			<?php
		}
		else{
			//Default Language
			?>
			<div style="max-width:700px;text-align:center;margin:0 auto;">
				<h1 style="text-align:center;">About ecdysis</h1>
				<p>Welcome to <b>ecdysis</b> - a portal for live-managing arthropod occurrence data. <b>ecdysis</b> is designed to serve the entomological community as a robust and efficient environment for collections digitization and data-driven research projects. The <b>ecdysis</b> community is open to and welcomes all collections and individuals who wish to publish, manage, and analyze arthropod occurrence data - especially in the form of digitized specimens.</p>
				<p>Visit our <a href="<?php echo $CLIENT_ROOT; ?>/misc/contacts.php">Contact page</a> for more information about the portal, its steering committee, and more help and resources.</p>

				<br><br>
				<h3>The following tools are available to portal users:</h3>
				<h4 style="text-align:left;padding-left:15px;">Collection management tools</h4>
				<ul class="hometext">
				<li>Add and edit records individually or in batch through online web tools</li>
				<li>Use crowdsourcing tools to clean and transcribe data</li>
				<li>Manage and track loans</li>
				<li>Generate custom locality and determination labels from the database</li>
				<li>Georeference and map specimen records</li>
				<li>Utilize and contribute to community-curated backbone taxonomy</li>
				<li>Link records to each other or external data sources (e.g., pollinator record to host-plant record)</li>
				<li>Publish data to GBIF, iDigBio and to services like Bionomia</li>
				</ul>
				<p></p>
				<h4 style="text-align:left;padding-left:15px;">Research tools</h4>
				<ul class="hometext">
				<li>Create and manage Checklists: collaborate and share checklists with the ability to link to specific voucher records and images or export for publication.</li>
				<li>Create multi-entry identification keys tied to higher taxonomic ranks or specific checklists</li>
				<li>Curate live datasets - lists of records for use in research projects</li>
				<li>Download search results or view in a live map</li>
				</ul>
				<p></p>
				<h4 style="text-align:left;padding-left:15px;">Community resources</h4>
				<ul class="hometext">
				<li><a target="_blank" href="https://biokic.github.io/symbiota-docs/">Symbiota user guide and documentation</a></li>
				<li><a target="_blank" href="https://help.symbiota.org/">Submit a help ticket</a> to the Symbiota Support Hub</li>
				<li>Join ecdysis by <a target="_blank" href="https://forms.gle/rcoSSnnfRnGhVo676">adding your collection</a></li>
				<li> Interact with the community-driven ecdysis <a href="<?php echo $CLIENT_ROOT; ?>/misc/contacts.php">Steering Committee</a></li>
				</ul>

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
