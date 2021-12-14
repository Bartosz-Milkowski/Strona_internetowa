<?php

$polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

if ($polaczenie->connect_errno!=0)
    echo "Błąd do cholery";
$suma = $polaczenie->query('SELECT COUNT(id) as suma FROM Pracownicy')->fetch_array()['suma'];
if($_GET['strona']-1 < 0)
$strona = 0;
else
$strona = $_GET['strona']-1;
$limit = 10;
$pocz = $strona * $limit;
$wszystko = ceil($suma / $limit);

$sql = 'SELECT * FROM Pracownicy LIMIT '.$pocz.', '.$limit;

$wynik = $polaczenie->query($sql);

$ile = $wynik->num_rows;

echo "<table border = 1 style = 'margin-left: 100px;margin-top: 50px; width: 1000px;'>";
        echo "<tr>";
        echo "<td><b>".'Usuń'."</td></b>";
        echo "<td><b>".'ID'."</td></b>";
        echo "<td><b>".'Imię'."</td></b>";
        echo "<td><b>".'Nazwisko'."</td></b>";
        echo "<td><b>".'Płeć'."</td></b>";
        echo "<td><b>".'Naz.pan'."</td></b>";
	    echo "<td><b>".'Email'."</td></b>";
	    echo "<td><b>".'Kod'."</td></b>";
        echo "</tr>";

if( $ile > 0) {

    while($r = $wynik->fetch_assoc()) {
        echo "<tr>";
        echo '<td><a href="panel.php?subpage=dokasowania&id='.$r['ID'].'">Usuń</a></td>';
        echo "<td>".$r['ID']."</td>";
        echo "<td>".$r['Imie']."</td>";
        echo "<td>".$r['Nazwisko']."</td>";
        echo "<td>".$r['Plec']."</td>";
	    echo "<td>".$r['Naz.pan']."</td>";
	    echo "<td>".$r['Email']."</td>";
	    echo "<td>".$r['Kod']."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>
<div style = "margin-left: 100px;">
<?php
    if($strona >= 1)
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=kasowanie&strona=1"> <-  </a>  ';  
    }
    else
    echo ("  <-");  
    
    for( $i; $i <= $wszystko; $i++)
    {
    echo '<a href="http://mb41449.cba.pl/panel.php?subpage=kasowanie&strona='.$i.'">'.$i.'</a>  ';
    }
    
    if($strona < ($wszystko-1))
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=kasowanie&strona='.$wszystko.'"> -> </a>  ';  
    }
    else
    echo '->';  
}
$wynik->close();
$polaczenie->close();
?>
</div>