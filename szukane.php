<?php
session_start();
$szukane=$_SESSION['Szukane'];
$poszuk = explode(" ", $szukane);
$max=count($poszuk);

$polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

if ($polaczenie->connect_errno!=0)
    echo "Błąd do cholery";

for( $j=0; $j <= $max-1; $j++)
{

$sql = "SELECT COUNT(id) as suma FROM Pracownicy WHERE Nazwisko like '%".$poszuk[$j]."%'";
$tsuma = $polaczenie->query($sql)->fetch_array()['suma'];
$suma = $tsuma + $suma;

}

if($_GET['strona']-1 < 0)
$strona = 0;
else
$strona = $_GET['strona']-1;
$limit = 10;
$pocz = $strona * $limit;
$wszystko = ceil($suma / $limit);

for( $j=0; $j <= $max-1; $j++)
{
$sql1 = "SELECT * FROM Pracownicy WHERE Nazwisko like '%".$poszuk[$j]."%' LIMIT ".$pocz.", ".$limit;

$wynik[$j] = $polaczenie->query($sql1);

$ile[$j] = $wynik[$j]->num_rows;
}
if($suma==0)
{
      echo "Brak wyszukiwanych rekordów";
}
else
{
echo "<table border = 1 style = 'margin-left: 100px;margin-top: 50px; width: 1000px;'>";
        echo "<tr>";
        echo "<td><b>".'ID'."</td></b>";
        echo "<td><b>".'Imię'."</td></b>";
        echo "<td><b>".'Nazwisko'."</td></b>";
        echo "<td><b>".'Płeć'."</td></b>";
        echo "<td><b>".'Naz.pan'."</td></b>";
	    echo "<td><b>".'Email'."</td></b>";
	    echo "<td><b>".'Kod'."</td></b>";
        echo "</tr>";

for( $j=0; $j <= $max-1; $j++)
{
if( $ile[$j] > 0) {

    while($r = $wynik[$j]->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$r['ID']."</td>";
        echo "<td>".$r['Imie']."</td>";
        echo "<td>".$r['Nazwisko']."</td>";
        echo "<td>".$r['Plec']."</td>";
	    echo "<td>".$r['Naz.pan']."</td>";
	    echo "<td>".$r['Email']."</td>";
	    echo "<td>".$r['Kod']."</td>";
        echo "</tr>";
    }
}
$wynik[$j]->close();
}
    echo "</table>";

?>
<div style = "margin-left: 100px;">
<?php
    if($strona >= 1)
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=szukane&strona=1"> <-  </a>  ';  
    }
    else
    echo ("  <-");  
    
    for( $i; $i <= $wszystko; $i++)
    {
    echo '<a href="http://mb41449.cba.pl/panel.php?subpage=szukane&strona='.$i.'">'.$i.'</a>  ';
    }
    
    if($strona < ($wszystko-1))
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=szukane&strona='.$wszystko.'"> -> </a>  ';  
    }
    else
    echo '->';  
}

$polaczenie->close();
?>
</div>