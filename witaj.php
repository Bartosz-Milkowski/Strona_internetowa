<?php
echo "<center><p>Witaj ".$_SESSION['user']."</p></center>";
$_SESSION['usere'] = $_SESSION['user'];
unset ($_SESSION['user']);
?>