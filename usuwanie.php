<?php

$polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

if ($polaczenie->connect_errno!=0)
    echo "Błąd do cholery";

$suma = $polaczenie->query('SELECT COUNT(login) as suma FROM `Uzytkownicy`')->fetch_array()['suma'];
if($_GET['strona']-1 < 0)
$strona = 0;
else
$strona = $_GET['strona']-1;
$limit = 10;
$pocz = $strona * $limit;
$wszystko = ceil($suma / $limit);

$sql = 'SELECT * FROM `Uzytkownicy` LIMIT '.$pocz.', '.$limit;

$wynik = $polaczenie->query($sql);

$ile = $wynik->num_rows;

echo "<table border = 1 style = 'margin-left: 100px;margin-top: 50px; width: 1000px;'>";
        echo "<tr>";
        echo "<td><b>".'Login'."</td></b>";
        echo "<td><b>".'Imię'."</td></b>";
        echo "<td><b>".'Nazwisko'."</td></b>";
        echo "<td><b>".'Poziom'."</td></b>";
        echo "<td><b>".'Usuń'."</td></b>";
        echo "</tr>";

if( $ile > 0) {

    while($r = $wynik->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$r['login']."</td>";
        echo "<td>".$r['imie']."</td>";
        echo "<td>".$r['nazwisko']."</td>";
        echo "<td>".$r['uprawnienia']."</td>";
        echo '<td><a href="panel.php?subpage=dousuwania&login='.$r['login'].'&uprawnienia='.$r['uprawnienia'].'">Usuń</a></td>';
        echo "</tr>";
    }
    echo "</table>";
?>
<div style = "margin-left: 100px;">
<?php
    if($strona >= 1)
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=usuwanie&strona=1"> <-  </a>  ';  
    }
    else
    echo ("  <-");  
    
    for( $i; $i <= $wszystko; $i++)
    {
    echo '<a href="http://mb41449.cba.pl/panel.php?subpage=usuwanie&strona='.$i.'">'.$i.'</a>  ';
    }
    
    if($strona < ($wszystko-1))
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=usuwanie&strona='.$wszystko.'"> -> </a>  ';  
    }
    else
    echo '->';  
}
$wynik->close();
$polaczenie->close();
?>
</div>