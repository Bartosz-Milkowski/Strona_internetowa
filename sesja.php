<?php
session_start();

if(isset($_POST["Imie"]))
{
 $_SESSION['Imie'] = $_POST["Imie"];
 
 $_SESSION['Nazwisko'] = $_POST["Nazwisko"];
 
 $_SESSION['Płeć'] = $_POST["Płeć"];
			
 $_SESSION['Nazwisko_panienskie'] = $_POST["Nazwisko_panienskie"];
			
 $_SESSION['Email'] = $_POST["Email"];
			
 $_SESSION['Kod_pocztowy'] = $_POST["Kod_pocztowy"];
}
 echo " Imię: <b>".$_SESSION['Imie']. "</b><br>";
 
 echo " Nazwisko: <b>" .$_SESSION['Nazwisko']. "</b><br>";
 
 echo " Płeć: <b>".$_SESSION['Płeć']. "</b><br>";
 
 echo " Nazwisko panieńskie: <b>".$_SESSION['Nazwisko_panienskie']. "</b><br>";
 
 echo " Email: <b>".$_SESSION['Email']. "</b><br>";
 
 echo " Kod pocztowy: <b>".$_SESSION['Kod_pocztowy']. "</b><br>";
			
?>
			
