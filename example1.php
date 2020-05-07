<?php
include("class/php-gettext/gettext.inc"); // PHP gettext
include("class/LocaleSettings.php"); // Locale Settings
include("class/LocaleSwitch.php"); // Locale
$locale = new LocaleSwitch($supported_locales);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo T_("Site_title");?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo T_("Locale");?>/style.css">
</head>

<body>
	<header>
    	<p class="languages_bar">
			<?php echo $locale->GenerateNavigationLanguageLinks();?>
        </p>
        <nav>
            <p>
                <a href="#"><?php echo T_("Home");?></a>
                | <a href="#"><?php echo T_("Features");?></a>
                | <a href="#"><?php echo T_("Guide");?></a>
                | <a href="#"><?php echo T_("Packages");?></a>
                | <a href="#"><?php echo T_("Partners");?></a>
                | <a href="#"><?php echo T_("Contact");?></a>
            </p>
            <p>
                <a href="#"><?php echo T_("Login");?></a>
                | <a href="#"><?php echo T_("Register");?></a>
            </p>
        </nav>
    </header>
    
    <section>
        <h1><?php echo T_("Welcome");?></h1>
        <p><?php echo T_("Description");?></p>
    </section>
</body>
</html>