<?php
class LocaleSwitch {
	private static $LOCALE_DIR = "locale";
	private static $DEFAULT_LOCALE = 'en_US';
	private static $DOMAIN = 'messages';
	private static $ENCODING = 'UTF-8';
	private static $supported_locales = array('en_US' => 'English');
	
	function __construct($user_defined_locales = null){
		if ($user_defined_locales !== null && !empty($user_defined_locales)) {
        	self::$supported_locales = $user_defined_locales;
    	}
		$this->Set();
	}
	
	public function Set(){
		T_setlocale(LC_MESSAGES, $this->GetLanguageIdentifier());
		T_bindtextdomain(self::$DOMAIN, self::$LOCALE_DIR);
		T_bind_textdomain_codeset(self::$DOMAIN, self::$ENCODING);
		T_textdomain(self::$DOMAIN);
	}
	
	// Optional
	public function SetManualPath($path){
		T_setlocale(LC_MESSAGES, $this->GetLanguageIdentifier());
		T_bindtextdomain(self::$DOMAIN, $path);
		T_bind_textdomain_codeset(self::$DOMAIN, self::$ENCODING);
		T_textdomain(self::$DOMAIN);
	}
	
	public function GetLanguageIdentifier(){
		$lang = '';
		$locale = self::$DEFAULT_LOCALE;
		if(isset($_GET['lang'])) $lang = htmlspecialchars($_GET['lang']);
		if(!empty($lang) && array_key_exists($lang, self::$supported_locales)){
			$locale = $lang;
			// Set cookie
			setcookie("LocaleCookie", $locale, time() + (10 * 365 * 24 * 60 * 60), "/"); // Forever
		}elseif(isset($_COOKIE['LocaleCookie'])	&& empty($lang) && array_key_exists($_COOKIE['LocaleCookie'], self::$supported_locales)){
			// Load cookie
			$locale = $_COOKIE['LocaleCookie'];
		}else{
			// Set default cookie
			setcookie("LocaleCookie", self::$DEFAULT_LOCALE, time() + (10 * 365 * 24 * 60 * 60), "/"); // Forever
		}
		
		return $locale;
	}	
	
	public function GenerateLocalizedSystemMessages(){
		$target = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes/system.messages.js';
		$src = require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes/messages_src.php');
		file_put_contents($target, $src);
	}
	
	public function GenerateNavigationLanguageLinks(){
		$navigationLinks = "";
		foreach(self::$supported_locales as $key => $val) {
			$navigationLinks .= "<a href=\"?lang=$key\" class=\"$key\">$val</a> ";
		}
		
		return $navigationLinks;
	}
}
?>