	<?php

if(isset($_POST["Imie"]))
{
    $zm=1;
    $zm1=0;
    
 $Imie = $_POST["Imie"];
 
 $Nazwisko = $_POST["Nazwisko"];

 $Płeć = $_POST["Płeć"];
    		
 $Nazwisko_panienskie= $_POST["Nazwisko_panienskie"];
			
 $Email = $_POST["Email"];
			
 $Kod_pocztowy = $_POST["Kod_pocztowy"];

}

?>

	<form  method = POST  style=" padding: 10px;  margin-top: 10px; margin-left: 20px;"> 
			Imie: <input type="text" value="<?php echo ($Imie); ?>" name="Imie" style= "margin-left: 435px;">  <br/> <br/>
                
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
			Nazwisko: <input type="text" value="<?php echo ($Nazwisko); ?>" name="Nazwisko" style= "margin-left: 400px;"> <br/> <br/>

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

			Płeć:
			<input type="radio" name="Płeć" value="kobieta" style= "margin-left: 435px;" checked > kobieta <br/> <br/>
			<input type="radio" name="Płeć" value="mezczyzna" style= "margin-left: 470px;"> mężczyzna <br/> <br/>
			
			Nazwisko panieńskie: <input type="text" value="<?php echo ($Nazwisko_panienskie); ?>" name="Nazwisko_panienskie" style= "margin-left: 328px;"> <br/> <br/>
			
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
            
			Email: <input type="text" value="<?php echo ($Email); ?>" name="Email" style= "margin-left: 425px;"> <br/> <br/>
			
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
            
			Kod pocztowy: <input type="text" value="<?php echo ($Kod_pocztowy); ?>" name="Kod_pocztowy" style= "margin-left: 369px;"> <br/> <br/>
			
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
            
			<input type="submit" name="Send" value="Wyślij" style = "margin-left: 535px">

		</form> 


    <?php
    
    if($zm1==5)
    {
        
        $_SESSION["Imie"] = $Imie;
 
        $_SESSION["Nazwisko"] = $Nazwisko;

        $_SESSION["Płeć"] = $Płeć;
        	
        $_SESSION["Nazwisko_panienskie"] = $Nazwisko_panienskie;
			
        $_SESSION["Email"] = $Email;
			
        $_SESSION["Kod_pocztowy"] = $Kod_pocztowy;
        
        $_SESSION['licznik']++;
        
        $_SESSION['ses'] = 1;
        
        $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

        if ($polaczenie->connect_errno!=0)
            echo "Błąd do cholery";
         
        $polaczenie->query("INSERT INTO Pracownicy VALUES (NULL, '$Imie', '$Nazwisko', '$Płeć', '$Nazwisko_panienskie', '$Email', '$Kod_pocztowy')");

        $polaczenie->close();
        
        header('Location: panel.php');
    }
    else
    {
        $zm=0;  
        $zm1=0; 
    }
?>

		