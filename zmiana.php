<?php
 session_start();
 $pomoc=0;
 $slogin = $_SESSION['usere'];
 if(!isset($_POST["Tak"]))
 {
 $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

 if ($polaczenie->connect_errno!=0)
        echo "Błąd do cholery";
        
 $Login = $_SESSION['usere'];

 $wynik = $polaczenie->query("SELECT * FROM `Uzytkownicy` WHERE `login`='$Login'");
 
 $ile = $wynik->num_rows;
 
 if($ile>0)
 {
 $wiersz = $wynik->fetch_assoc();
 
 $Login = $wiersz['login'];
            
 $Imie= $wiersz['imie'];
			
 $Nazwisko = $wiersz['nazwisko'];
 }

 $wynik->close();
 $polaczenie->close();
 }
 
if(isset($_POST["Tak"]))
{
    $zm=1;
    $zm1=0;
    
 $Login = $_POST["Login"];
 
 $Haslo = $_POST["Haslo"];

 $P_Haslo = $_POST["P_Haslo"];
        	
 $Imie= $_POST["Imie"];
			
 $Nazwisko = $_POST["Nazwisko"];


}

?>

	<form  method = POST  style=" padding: 10px;  margin-top: 10px; margin-left: 20px;"> 
			Login: <input type="text" name="Login" value="<?php echo ($Login); ?>"style= "margin-left: 435px;">  <br/> <br/>
                
            <?php
            if($zm==1)
            {
            if (empty($Login) || strlen($Login)<=5) 
            { 
                echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Zły Login".'</p>';
            }
            elseif ($pomoc==1) 
            { 
                echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Ten login już istnieje".'</p>';
            }
            else
                $zm1++;
            }
            ?>  
			Hasło: <input type="text" name="Haslo" style= "margin-left: 435px;"> <br/> <br/>

            <?php
            if($zm==1)
            {
            if (empty($Haslo) || strlen($Haslo)<=5) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Złe Hasło".'</p>';
            }  
            else
                $zm1++;
            }
            ?> 
			
			Powtórz hasło: <input type="text" name="P_Haslo" style= "margin-left: 382px;"> <br/> <br/>
			
            <?php
            if($zm==1)
            {
            if ($Haslo != $P_Haslo) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Hasła nie są takie same".'</p>';
            } 
            else
                $zm1++;
            }
            ?> 
            
			Imię: <input type="text" name="Imie" value="<?php echo ($Imie); ?>" style= "margin-left: 445px;"> <br/> <br/>
			
			Nazwisko: <input type="text" name="Nazwisko" value="<?php echo ($Nazwisko); ?>" style= "margin-left: 410px;"> <br/> <br/>
            
    		<input type="submit" name="Tak" value="Zaakceptuj zmiany" style = "margin-left: 235px">
            
            <input type="submit" name="Nie" value="Odrzuć zmiany" style = "margin-left: 100px">
            
		</form> 

    <?php
    
    if($zm1==3 && isset($_POST["Tak"]))
    {
        
        $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

        if ($polaczenie->connect_errno!=0)
            echo "Błąd do cholery";

        $sql = "UPDATE `Uzytkownicy` SET `login`='$Login', `haslo`='$Haslo',`imie`='$Imie', `nazwisko`='$Nazwisko'  WHERE `login`='$slogin'";
        
        $polaczenie->query($sql)or die("Query failed.");

        $polaczenie->close();
        
        $_SESSION['usere'] = $Login;
        
        $_SESSION['userer'] = 1;
         
        header('Location: panel.php');
    }
    elseif (isset($_POST["Nie"]))
    {
        
        header('Location: panel.php');
    }
    else
    {
        $zm=0;  
        $zm1=0; 
    }

?>