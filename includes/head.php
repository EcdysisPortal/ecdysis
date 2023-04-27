<?php
/*
** Symbiota Redesign
** The version is determined by the number of the release
** set in config/symbini.php ($CSS_VERSION_RELEASE).
** To customize the styles, add your own CSS files to the
** css folder and include them here.
*/
?>
<!-- Responsive viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Symbiota styles -->
<link href="<?php echo $CSS_BASE_PATH; ?>/symbiota/normalize.slim.css" type="text/css" rel="stylesheet">
<link href="<?php echo $CSS_BASE_PATH; ?>/symbiota/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo $CLIENT_ROOT; ?>/js/symb/lang.js" type="text/javascript"></script>
<!-- Ecdysis icons -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $CLIENT_ROOT; ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $CLIENT_ROOT; ?>/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $CLIENT_ROOT; ?>/images/favicon-16x16.png">
<link rel="manifest" href="<?php echo $CLIENT_ROOT; ?>/images/site.webmanifest">
<link rel="mask-icon" href="<?php echo $CLIENT_ROOT; ?>/images/safari-pinned-tab.svg" color="#5bbad5">