<?php
if($_SESSION['userer'] == 1)
{
echo"<center> <p> Zmieniono dane </p> </center>";
$_SESSION['userer'] = 0;
}
else
echo"<center> <h2><p> Strona główna </p></h2> </center>";
?>