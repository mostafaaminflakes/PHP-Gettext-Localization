<?php
include("class/LocaleSettings.php"); // Locale Settings
$locale = new LocaleSwitch($supported_locales);
$lang = strtolower($locale->GetLanguageIdentifier());
return
"//------------------------------------------
//******************************************
// *  System Messages
//******************************************
//------------------------------------------
var System = System || {};
System.Messages = {
	$lang: {
		Language: '" . T_("Language") . "',
		Success: '" . T_("Success") . "',
		Usage: '" . T_("Usage") . "'
	}
};";
?>