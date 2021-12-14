<?php

 $id = $_GET["id"];
    
 $Imie = $_GET["Imie"];
 
 $Nazwisko = $_GET["Nazwisko"];

 $Plec = $_GET["Plec"];
        	
 $Nazwisko_panienskie= $_GET["Nazwisko_pan"];
 
 $Email = $_GET["Email"];
	
 $Kod_pocztowy = $_GET["Kod"];

if(isset($_POST["Imie"]))
{
    $zm=1;
    $zm1=0;
    
 $Imie = $_POST["Imie"];
 
 $Nazwisko = $_POST["Nazwisko"];

 $Plec = $_POST["Plec"];
    		
 $Nazwisko_panienskie= $_POST["Nazwisko_panienskie"];
			
 $Email = $_POST["Email"];
			
 $Kod_pocztowy = $_POST["Kod_pocztowy"];

}

?>

	<form  method = POST  style=" padding: 10px;  margin-top: 10px; margin-left: 20px;"> 
			Imie: <input type="text" name="Imie" value="<?php echo ($Imie); ?>" style= "margin-left: 435px;">  <br/> <br/>
                
            <?php
            if($zm==1)
            {
            if (empty($Imie) || strlen($Imie)<=2) 
            { 
                echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Złe imię".'</p>';
            }    
            else
                $zm1++;
            }
            ?>  
			Nazwisko: <input type="text" name="Nazwisko" value="<?php echo ($Nazwisko); ?>" style= "margin-left: 400px;"> <br/> <br/>

            <?php
            if($zm==1)
            {
            if (empty($Nazwisko) || strlen($Nazwisko)<=2) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Złe Nazwisko".'</p>';
            }  
            else
                $zm1++;
            }
            ?> 

            <?php
            if( $Plec == mezczyzna)
            {
            echo "Płeć:
			<input type='radio' name='Plec' value='kobieta' style= 'margin-left: 435px;' > kobieta <br/> <br/>
			<input type='radio' name='Plec' value='mezczyzna' style= 'margin-left: 470px;' checked> mężczyzna <br/> <br/>";
            }
            else
            {
            echo "Płeć:
    		<input type='radio' name='Plec' value='kobieta' style= 'margin-left: 435px;' checked> kobieta <br/> <br/>
			<input type='radio' name='Plec' value='mezczyzna' style= 'margin-left: 470px;'> mężczyzna <br/> <br/>";
            }
            ?> 

			
			Nazwisko panieńskie: <input type="text" name="Nazwisko_panienskie" value="<?php echo ($Nazwisko_panienskie); ?>" style= "margin-left: 328px;"> <br/> <br/>
			
            <?php
            if($zm==1)
            {
            if (empty($Nazwisko_panienskie) || strlen($Nazwisko_panienskie)<=2) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Złe Nazwisko panieńskie".'</p>';
            } 
            else
                $zm1++;
            }
            ?> 
            
			Email: <input type="text" name="Email" value="<?php echo ($Email); ?>"style= "margin-left: 425px;"> <br/> <br/>
			
            <?php 
            if($zm==1)
            {
            if (!preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/', $Email)) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Zły adres email".'</p>';
            }  
            else
                $zm1++;
            }
            ?> 
            
			Kod pocztowy: <input type="text" name="Kod_pocztowy" value="<?php echo ($Kod_pocztowy); ?>" style= "margin-left: 369px;"> <br/> <br/>
			
            <?php 
            if($zm==1)
            {
            if (!preg_match("/^[0-9]{2}+\-[0-9]{3}$/", $Kod_pocztowy)) 
            {
            echo '<p style = "color:red; margin-left: 500px; margin-top: 5px; margin-bttom: 5px;">'."Zły Kod pocztowy".'</p>';
            }
            else
                $zm1++;
            }
            ?> 
            
			<input type="submit" name="Tak" value="Zaakceptuj zmiany" style = "margin-left: 235px">
            
            <input type="submit" name="Nie" value="Odrzuć zmiany" style = "margin-left: 100px">

		</form> 


    <?php
    
    if($zm1==5 && isset($_POST["Tak"]))
    {
        
        $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

        if ($polaczenie->connect_errno!=0)
            echo "Błąd do cholery";

        $sql = "UPDATE `Pracownicy` SET `Imie`='$Imie', `Nazwisko`='$Nazwisko', `Plec`='$Plec', `Naz.pan`='$Nazwisko_panienskie', `Email`='$Email', `Kod`='$Kod_pocztowy' WHERE `ID`='$id'";
        
        $polaczenie->query($sql)or die("Query failed.");

        $polaczenie->close();
        
        $_SESSION['chod'] = 1;
        
        header('Location: panel.php');
    }
    elseif (isset($_POST["Nie"]))
    {
        $_SESSION['chod'] = 1;
        
        header('Location: panel.php');
    }
    else
    {
        $zm=0;  
        $zm1=0; 
    }

?>