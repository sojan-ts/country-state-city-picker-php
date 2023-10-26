<?php
$connection = new mysqli("localhost","root","","csc_picker_db");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
