<?php
session_start();
  $Imie =  $_SESSION["Imie1"];
    		
  $Nazwisko = $_SESSION["Nazwisko1"];
echo "<p>Zarejestrowano użytkownika :".$Imie."  ".$Nazwisko."</p>";
?>