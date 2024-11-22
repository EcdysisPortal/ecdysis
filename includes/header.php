<?php
if($LANG_TAG == 'en' || !file_exists($SERVER_ROOT.'/content/lang/templates/header.' . $LANG_TAG . '.php'))
	include_once($SERVER_ROOT . '/content/lang/templates/header.en.php');
else include_once($SERVER_ROOT . '/content/lang/templates/header.' . $LANG_TAG . '.php');
$SHOULD_USE_HARVESTPARAMS = $SHOULD_USE_HARVESTPARAMS ?? false;
$collectionSearchPage = $SHOULD_USE_HARVESTPARAMS ? '/collections/index.php' : '/collections/search/index.php';
?>
<div class="header-wrapper">
	<header>
		<div class="top-wrapper">
			<a class="screen-reader-only" href="#end-nav"><?= $LANG['H_SKIP_NAV'] ?></a>
			<nav class="top-login" aria-label="horizontal-nav">
				<?php
				if ($USER_DISPLAY_NAME) {
					?>
					<div class="welcome-text bottom-breathing-room-rel">
						<?= $LANG['H_WELCOME'] . ' ' . $USER_DISPLAY_NAME ?>!
					</div>
					<span style="white-space: nowrap;" class="button button-tertiary bottom-breathing-room-rel">
						<a href="<?= $CLIENT_ROOT ?>/profile/viewprofile.php"><?= $LANG['H_MY_PROFILE'] ?></a>
					</span>
					<span style="white-space: nowrap;" class="button button-secondary bottom-breathing-room-rel">
						<a href="<?= $CLIENT_ROOT ?>/profile/index.php?submit=logout"><?= $LANG['H_LOGOUT'] ?></a>
					</span>
					<?php
				} else {
					?>
					<span class="button button-tertiary">
						<a onclick="window.location.href='#'">
							<?= $LANG['H_CONTACT_US'] ?>
						</a>
					</span>
					<span class="button button-secondary">
						<a href="<?= $CLIENT_ROOT . "/profile/index.php?refurl=" . htmlspecialchars($_SERVER['SCRIPT_NAME'], ENT_COMPAT | ENT_HTML401 | ENT_SUBSTITUTE) . "?" . htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES); ?>">
							<?= $LANG['H_LOGIN'] ?>
						</a>
					</span>
					<?php
				}
				?>
			</nav>
			<div class="top-brand">
				<a href="<?= $CLIENT_ROOT ?>">
					<div class="image-container">
						<img src="<?= $CLIENT_ROOT ?>/images/ecdysis_logo.png" alt="Ecdysis Logo">
					</div>
				</a>
				<div class="brand-name">
					<h1>ecdysis</h1>
					<h2><?= $LANG['H_SUBTITLE'] ?></h2>
				</div>
			</div>
		</div>
		<div class="menu-wrapper">
			<!-- Hamburger icon -->
			<input class="side-menu" type="checkbox" id="side-menu" />
			<label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
			<!-- Menu -->
			<nav class="top-menu">
				<ul class="menu">
					<li>
						<a href="<?= $CLIENT_ROOT ?>/index.php">
							<?= $LANG['H_HOME'] ?>
						</a>
					</li>
					<li>
						<a href="#"><?= $LANG['H_SEARCH'] ?></a>
						<ul>
							<li>
								<a href="<?= $CLIENT_ROOT . $collectionSearchPage ?>"><?= $LANG['H_NEW_SEARCH'] ?></a>
							</li>
							<li>
								<a href="<?= $CLIENT_ROOT ?>/collections/index.php"><?= $LANG['H_CLASSIC_SEARCH'] ?></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT ?>/collections/map/index.php" rel="noopener noreferrer">
							<?= $LANG['H_MAP_SEARCH'] ?>
						</a>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT ?>/checklists/index.php">
							<?= $LANG['H_INVENTORIES'] ?>
						</a>
					</li>
					<li>
						<a href="<?= $CLIENT_ROOT ?>/imagelib/search.php">
							<?= $LANG['H_IMAGES'] ?>
						</a>
					</li>
					<li>
						<a href="<?php echo $CLIENT_ROOT; ?>/misc/contacts.php">
							<?php echo (isset($LANG['H_CONTACTS'])?$LANG['H_CONTACTS']:'Contacts'); ?>
						</a>
					</li>
					<li>
						<a href='<?= $CLIENT_ROOT ?>/sitemap.php'>
							<?= $LANG['H_SITEMAP'] ?>
						</a>
					</li>
					<li>
						<select onchange="setLanguage(this)">
							<option value="en">English</option>
							<option value="es" <?php echo ($LANG_TAG=='es'?'SELECTED':''); ?>>Espa&ntilde;ol</option>
                            <option value="pt" <?php echo ($LANG_TAG=='pt'?'SELECTED':''); ?>>Português do Brasil</option>
                            <option value="ko" <?php echo ($LANG_TAG=='ko'?'SELECTED':''); ?>>Korean</option>
						</select>
					</li>
				</ul>
			</nav>
		</div>
		<div id="end-nav"></div>
		</header>
</div>