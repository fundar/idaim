<!DOCTYPE html>
<html lang="<?php print get("webLang"); ?>">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php print $this->getTitle(); ?></title>
		<link href="<?php print $this->themePath; ?>/css/style.css" rel="stylesheet">
		<link href="<?php print $this->themePath; ?>/css/pack.css" rel="stylesheet">
		<script src="<?php print $this->themePath; ?>/js/d3.v2.js"></script>
		<script src="<?php print $this->themePath; ?>/js/jquery.js"></script>
		<script src="<?php print $this->themePath; ?>/js/functions.js"></script>
		<script src="<?php print $this->themePath; ?>/js/d3.layout.js"></script>
		
		<?php print $this->getCSS(); ?>
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
			<!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
		<!-- Le styles -->
	</head>

	
<body>
	<div id="container">
		<div id="header">
			<div id="logo">
				<a href="/"><img src="<?php print $this->themePath; ?>/css/images/logo.png" title="Nuestros Recursos"/></a>
			</div>
			<div id="menu-top">
				<ul>
					<li><a href="/quienes-somos" title="Quiénes somos">Qui&eacute;nes somos</a></li>
					<li><a href="/indice" title="Índice">&Iacute;ndice</a></li>
					<li><a href="/contacto" title="Contacto">Contacto</a></li>
					<li>
						<a href="" class="social social-facebook" title="Facebook Nuestros Recursos">Facebook Nuestros Recursos</a>
						<a href="" class="social social-rss" title="Rss Nuestros Recursos">Rss Nuestros Recursos</a>
						<a href="" class="social social-twitter" title="Twitter Nuestros Recursos">Twitter Nuestros Recursos</a>
					</li>
				</ul>
			</div>
		</div>
