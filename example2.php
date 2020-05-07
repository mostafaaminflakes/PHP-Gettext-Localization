<?php
include("class/php-gettext/gettext.inc"); // PHP gettext
include("class/LocaleSettings.php"); // Locale Settings
include("class/LocaleSwitch.php"); // Locale
$locale = new LocaleSwitch($supported_locales);
$locale->GenerateLocalizedSystemMessages(); // Auto generate js strings file
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo T_("Site_title");?></title>
<link rel="stylesheet" type="text/css" href="css/<?php echo T_("Locale");?>/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<!-- Attaching time to the file to avoid caching when switching languages -->
<script language="javascript" src="includes/system.messages.js?version=<?php echo time();?>"></script>
<script language="javascript" src="js/example2.js"></script>
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
    	<input type="hidden" value="<?php echo T_("Locale");?>" id="locale">
        <input type="button" value="<?php echo T_("Loaddata");?>" id="load_data">
        <div id="container">
        	<p id="language"></p>
        	<p id="success"></p>
        	<p id="usage"></p>
        </div>
    </section>
</body>
</html>