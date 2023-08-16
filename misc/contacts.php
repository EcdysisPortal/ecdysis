<?php
include_once('../config/symbini.php');
header("Content-Type: text/html; charset=".$CHARSET);
include_once('content/lang/misc/aboutproject.'.$LANG_TAG.'.php');
?>
<html>
	<head>
		<title><?php echo (isset($LANG['CONTACTS'])?$LANG['CONTACTS']:'Contacts'); ?></title>
		<?php

		include_once($SERVER_ROOT.'/includes/head.php');
		?>
	</head>
	<body>
		<?php
		$displayLeftMenu = false;
		include($SERVER_ROOT.'/includes/header.php');
		?>
		<div class="navpath">
			<a href="../index.php"><?php echo (isset($LANG['HOME'])?$LANG['HOME']:'Home'); ?></a> &gt;&gt;
			<b><?php echo (isset($LANG['CONTACTS'])?$LANG['CONTACTS']:'Contacts'); ?></b>
		</div>
		<!-- This is inner text! -->
		<div id="innertext">
		<?php
		if($LANG_TAG == 'es'){
			?>
			<h1>Contactos y Recursos</h1>

			<p>El portal <b>ecdysis</b> tiene soporte técnico y asistencia para la comunidad de usuarios a través del Symbiota Support Hub.</p>
			
				<ul class="hometext">
				<li><a target="_blank" href="https://biokic.github.io/symbiota-docs/es/">Documentación de Symbiota</a></li>
				<li><a target="_blank" href="https://help.symbiota.org/">Tickets de Asistencia</a> del Equipo Symbiota</li>
				<li><a target="_blank" href="https://forms.gle/rcoSSnnfRnGhVo676">Genere un perfil de colección</a> en ecdysis</li>
				</ul>		
				
			<h3>Soporte para la comunidad de ecdysis </h3>
			<p>Más información acerca de otros medios de comunicación disponibles pronto.</p>
			
			<h3>Comité Directivo de ecdysis</h3>
			<p>El Comité Directivo de ecdysis fue establecido durante el verano de 2023 para proveer dirección y guía para el desarrollo del portal y el crecimiento de la comunidad. El comité se reune cuatro veces al año para discutir proyectos en curso y nuevas iniciativas. El comité directivo motiva a proveer retroalimentación e ideas desde la comunidad de usuarios de ecdysis para continuar con el desarrollo del portal.</p>
			<h4>Integrantes del Comité Directivo:</h4>
			<ul class="hometext">
			<li><b>Jennifer Girón</b>, Acting Collections Manager of Invertebrate Zoology, Museum of Texas Tech University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-0851-6883">https://orcid.org/0000-0002-0851-6883</a></li>
			<li><b>Andrew Johnston</b>, Invertebrate Collections Manager, NEON Biorepository, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-0166-6985">https://orcid.org/0000-0002-0166-6985</a></li>
			<li><b>Sangmi Lee</b>, Researcher Specialist Sr. and Collections Manager of ASU Insects and Mollusks, Biodiversity Knowledge Integration Center, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-9636-8242">https://orcid.org/0000-0002-9636-8242</a></li>
			<li><b>Samanta Orellana</b>, Ph.D. Candidate, School of Life Sciences, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-4098-5823">https://orcid.org/0000-0002-4098-5823</a></li>
			<li><b>Katja C. Seltmann</b>, Researcher and Katherine Esau Director, Cheadle Center for Biodiversity and Ecology Restoration, University of California, Santa Barbara. ORCID: <a target="_blank" href="https://orcid.org/0000-0001-5354-6048">https://orcid.org/0000-0001-5354-6048</a></li>
			<li><b>Lindsay J. Walker</b>, Community Manager, Symbiota Support Hub, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-2162-6593">https://orcid.org/0000-0002-2162-6593</a></li>
			</ul>
			<p>Para consultas acerca del comité directivo, por favor contactar a la directora actual Sangmi Lee (slee281@asu.edu). Para soporte técnico o problemas relacionados con el portal, por favor contactar al administrador del portal Andrew Johnston (ajohnston@asu.edu).</p>

		<?php
		}
		else{
			//Default Language
			?>		
			<h1>Contacts and Resources</h1>

			<p>The <b>ecdysis</b> portal has both technical and community support through the Symbiota Support Hub and its user community.</p>
			
			<h3>Get technical support</h3>
				<ul class="hometext">
				<li><a target="_blank" href="https://biokic.github.io/symbiota-docs/">Symbiota user guide and documentation</a></li>
				<li><a target="_blank" href="https://help.symbiota.org/">Submit a help ticket</a> to the Symbiota Support Hub</li>
				<li>Join ecdysis by <a target="_blank" href="https://forms.gle/rcoSSnnfRnGhVo676">adding your collection</a></li>
				</ul>			

			<h3>ecdysis community support</h3>
			<p>More information coming soon about communications with other portal users.</p>
			
			<h3>ecdysis Steering Committee</h3>
			<p>The steering committee was established in summer 2023 to provide direction and guidance for portal development and community growth. The committee meets quarterly to discuss ongoing projects and new initiatives. The sterring committee encourages feedback and input from the ecdysis user community to continue to develop the portal.</p>
			<h4>Steering Committee members:</h4>
			<ul class="hometext">
			<li><b>Jennifer Girón</b>, Acting Collections Manager of Invertebrate Zoology, Museum of Texas Tech University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-0851-6883">https://orcid.org/0000-0002-0851-6883</a></li>
			<li><b>Andrew Johnston</b>, Invertebrate Collections Manager, NEON Biorepository, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-0166-6985">https://orcid.org/0000-0002-0166-6985</a></li>
			<li><b>Sangmi Lee</b>, Researcher Specialist Sr. and Collections Manager of ASU Insects and Mollusks, Biodiversity Knowledge Integration Center, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-9636-8242">https://orcid.org/0000-0002-9636-8242</a></li>
			<li><b>Samanta Orellana</b>, Ph.D. Candidate, School of Life Sciences, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-4098-5823">https://orcid.org/0000-0002-4098-5823</a></li>
			<li><b>Katja C. Seltmann</b>, Researcher and Katherine Esau Director, Cheadle Center for Biodiversity and Ecology Restoration, University of California, Santa Barbara. ORCID: <a target="_blank" href="https://orcid.org/0000-0001-5354-6048">https://orcid.org/0000-0001-5354-6048</a></li>
			<li><b>Lindsay J. Walker</b>, Community Manager, Symbiota Support Hub, Arizona State University. ORCID: <a target="_blank" href="https://orcid.org/0000-0002-2162-6593">https://orcid.org/0000-0002-2162-6593</a></li>
			</ul>
			<p>For inquiries about the steering committee, please contact the chair Sangmi Lee (slee281@asu.edu). For technical or portal-related issues, please contact the portal manager Andrew Johnston (ajohnston@asu.edu).</p>
			<?php
		}
		?>
		</div>
		<?php
		include($SERVER_ROOT.'/includes/footer.php');
		?>
	</body>
</html>