<?php 
 $mysqli = new mysqli("localhost","root","","lebarberia");
//mysqli('sql200.byethost6.com','b6_29406732','Lebarberia','b6_29406732_bd_lebarberia');


 
if($mysqli-> connect_errno){
    echo "falla al conectarse a mysql(".$mysqli ->connect_errno.")".$mysqli->connecct_error;}

else{
   
}
 
 ?>
 
 
