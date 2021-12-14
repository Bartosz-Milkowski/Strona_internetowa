<?php
session_start();
$pomoc=0;
if(isset($_POST["Send"]))
{
    
 $Login = $_POST["Login"];
 
 $Haslo = $_POST["Haslo"];
     
 $_SESSION["log"] = 1;
        
 $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

 if ($polaczenie->connect_errno!=0)
        echo "Błąd do cholery";
    
 $sql= "SELECT * FROM Uzytkownicy WHERE `login`='$Login' AND `haslo`='$Haslo'";           

 if($wynik = $polaczenie->query($sql)) 
 {

     $ile= $wynik->num_rows;
     if($ile>0)
     {
         $wiersz = $wynik->fetch_assoc();
         $_SESSION['user'] = $wiersz['login'];
         $_SESSION['dostep'] = $wiersz['uprawnienia'];
         $pomoc=1;
         $wynik->close();
     }
     else
     {
        $pomoc=2;
     }
 } 

 $polaczenie->close();
        

}

?>

	<form  method = POST  style=" padding: 10px;  margin-top: 10px; margin-left: 20px;"> 
			
            Login: <input type="text" name="Login" style= "margin-left: 435px;">  <br/> <br/>
 
			Hasło: <input type="password" name="Haslo" style= "margin-left: 435px;"> <br/> <br/>

            
			<input type="submit" name="Send" value="Zaloguj" style = "margin-left: 535px">

		</form> 

<?php
    
    if(isset($_POST["Send"]))
    {
  if($pomoc==1 && $_SESSION['dostep'] != 0)      
    header('Location: panel.php');
  elseif($_SESSION['dostep'] == 0) 
     header('Location: Index.php');
  elseif($pomoc==2)      
    echo "<p style= 'color:red'> Niepoprawny login lub hasło</p>";
    }

?>