<?php
$su = $_SESSION['su'];

    for( $j=0; $j <= $su; $j++)
    {
        if (isset($_POST['Send'.$j.'']))
        {
            $poziom = $_POST['Poziom'.$j.''];
            
            $login = $_SESSION['lg'.$j.''];
            
            $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

            if ($polaczenie->connect_errno!=0)
                echo "Błąd do cholery";
                
                $sql1 = "UPDATE `Uzytkownicy` SET `uprawnienia`='$poziom' WHERE `login`='$login'";

                $polaczenie->query($sql1);
                
                $polaczenie->close();           
        }
    }
$j=0;  
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

$_SESSION['su']=$suma;

$sql = 'SELECT * FROM `Uzytkownicy` LIMIT '.$pocz.', '.$limit;

$wynik = $polaczenie->query($sql);

$ile = $wynik->num_rows;

echo "<table border = 1 style = 'margin-left: 100px;margin-top: 50px; width: 1000px;'>";
        echo "<tr>";
        echo "<td><b>".'Login'."</td></b>";
        echo "<td><b>".'Imię'."</td></b>";
        echo "<td><b>".'Nazwisko'."</td></b>";
        echo "<td><b>".'Poziom'."</td></b>";
        echo "<td><b>".'Potwerdź'."</td></b>";
        echo "</tr>";

if( $ile > 0) {

    while($r = $wynik->fetch_assoc()) {
        $j++;
        $upr=$r['uprawnienia'];
        $_SESSION['lg'.$j.'']=$r['login'];
        echo "<tr>";
        echo "<td>".$r['login']."</td>";
        echo "<td>".$r['imie']."</td>";
        echo "<td>".$r['nazwisko']."</td>";
        echo '<td><select name="Poziom'.$j.'" form="poziom'.$j.'">';
        if($upr==0)
        {
        echo '<option value="0"selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>';
        }
        elseif($upr==1)
        {
        echo '<option value="0">0</option>
        <option value="1"selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>';
        }
        elseif($upr==2)
        {
        echo '<option value="0">0</option>
        <option value="1">1</option>
        <option value="2"selected>2</option>
        <option value="3">3</option>
        <option value="4">4</option>';
        }
        elseif($upr==3)
        {
        echo '<option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3"selected>3</option>
        <option value="4">4</option>';
        }
        elseif($upr==4)
        {
         echo '<option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4"selected>4</option>';
        }
        echo '</select></td>';
        echo '<td><form method = POST id="poziom'.$j.'"><input type="submit" name="Send'.$j.'" value="Potwerdź"> </form></td>'; 
        echo "</tr>";
    }
    echo "</table>";
?>
<div style = "margin-left: 100px;">
<?php
    if($strona >= 1)
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=dostep&strona=1"> <-  </a>  ';  
    }
    else
    echo ("  <-");  
    
    for( $i; $i <= $wszystko; $i++)
    {
    echo '<a href="http://mb41449.cba.pl/panel.php?subpage=dostep&strona='.$i.'">'.$i.'</a>  ';
    }
    
    if($strona < ($wszystko-1))
    {
      echo '<a href="http://mb41449.cba.pl/panel.php?subpage=dostep&strona='.$wszystko.'"> -> </a>  ';  
    }
    else
    echo '->';  
}
$wynik->close();
$polaczenie->close();
?>
</div>