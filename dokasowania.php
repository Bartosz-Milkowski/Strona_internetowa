	<form  method = POST  style=" padding: 10px;  margin-top: 10px; margin-left: 20px;"> 
			Czy na pewno usunąć rekord?</br>
            <input type="submit" name="Tak" value="Tak" style = "margin-left: 50px">
            
            <input type="submit" name="Nie" value="Nie" style = "margin-left: 5px">

		</form> 


    <?php
        session_start();
    
     $id = $_GET['id'];
    
    if(isset($_POST["Tak"]))
    {
        
        $polaczenie = new mysqli("mysql.cba.pl", "mb41449", "Bartek31031998", "mb41449");

        if ($polaczenie->connect_errno!=0)
            echo "Błąd do cholery";
         
        $polaczenie->query("DELETE FROM Pracownicy WHERE ID='$id'");

        $polaczenie->close();
        
        $_SESSION['chod'] = 2;

        header('Location: panel.php');
    }  
    elseif (isset($_POST["Nie"]))
    {
        $_SESSION['chod'] = 2;
        
        header('Location: panel.php');
    }


?>