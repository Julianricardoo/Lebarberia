<?php
//define('DB_SERVER', 'sql200.byethost6.com');
//define('DB_SERVER_USERNAME', 'b6_29406732');
//define('DB_SERVER_PASSWORD', 'Lebarberia');
//define('DB_DATABASE', 'b6_29406732_bd_lebarberia');
//define('NUM_ITEMS_BY_PAGE',10);


define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'lebarberia');
define('NUM_ITEMS_BY_PAGE',10);
 



$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
?>