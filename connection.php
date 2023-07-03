<?php

//SERVER NAME
$Server = "";
//SERVER USERNAME
$Server_name = "";
//DATABASE PASSWORD
$DB_Pass = "";
//DATABASE NAME
$DB_name = "";

//CONECTION STRING
$conn = mysqli_connect($Server,$Server_name ,$DB_Pass , $DB_name);

//CHECKING IF THERE CONNECTION WAS ESTABLISHED
if(!$conn){
	echo "No connection established...";
}



