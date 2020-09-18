<?php
ob_start();
session_start();

// Databas information
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','wsp');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Sätt tidszon
date_default_timezone_set('Europe/Stockholm');

// Ladda in klasser vid behov
function __autoload($class) {
   
   $class = strtolower($class);
   // Om inuti assets
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }  
   
   // Om utanför -> anpassa
   $classpath = 'blogg/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   // Om utanför -> anpassa
   $classpath = '../blogg/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   // Om utanför -> anpassa
   $classpath = 'assets/blogg/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
   
   // Om utanför -> anpassa
   $classpath = '../assets/blogg/classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }
    
}
$user = new User($db); 
include('functions.php');
?>