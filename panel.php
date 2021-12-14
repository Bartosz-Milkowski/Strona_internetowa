<?php
session_start();
$szukaj=$_POST['Szukane'];
$_SESSION['Szukane'] = $szukaj; 
?>
<!doctype html>
<html lang="pl">

<head>

	<meta charset="utf-8"/>
	<meta name="Description" content= "Strona utworzona na pierwsze laboratorium z systemów internetowych" />
	<meta name="Keywords" content="Systemy internetowe, laboratorium, zut" />

	<title> Systemy internetowe </title>
	
	<style>
	#conteiner
	{
	}
	#logo
	{
		text-align:center;
		color:blue;
		background-color:gray;
		height:75px;
		margin-bottom: 10px;
	}
	#lewo
	{
		float:left;
		width: 18%;
		margin-right: 20px;
	}
	#srodek
	{
		
		background-color:yellow;
		float:left;
		width: 65%;
		height: 550px;
		margin-bottom: 10px;
	}
	#prawo
	{
		background-color:yellow;
		margin-left: 20px;
		float:left; 
		width: 13%; 
		height: 250px;
	}
	#stopka
	{
		clear: both;
		text-align:center;
		background-color:gray;
		height:60px;
		margin-top: 20px;
	}
	input[type=text]
	{
		position: absolute;
		text-align:right;
		border-style: inset;
		border-width: 3px;
	}
    #error
    {
		color:red;
		margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 500px;
	}
	</style>

</head>

<body>

	<div id="container">
	
	<div id="logo" >
		<center> <h2>LOGO</h2> </center>
	</div>

	<div id="lewo">

		<ul type="none;" style= "padding:0px">

			<h5><li style = "background: yellow;  border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=home" title="Przejdź do strony głównej"><h3> Strona główna </h3> </a> </li> </h5>
	    <?php
    
        if($_SESSION["dostep"]>=1)
        {
    	 echo '<h5><li style = "background: yellow; margin-top: -20px;  border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=form" title="Przejdź do formularza"><h3> Formularz </h5> </a> </li></h4>

            <h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=sesja" title="Przejdź do wartości sesji"><h3> Zawartość sesji </h3> </a> </li></h5>
            
            <h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=baza&strona=1" title="Przejdź do bazy pracowników"><h3> Baza pracowników </h5> </a>  </li> </h4>';
        }
        if($_SESSION["dostep"]>=2)
        {  
             echo '<h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=edycja&strona=1" title="Przejdź do edycji pracowników"><h3> Edycja pracownika </h3> </a>  </li></h5>';
        } 
        if($_SESSION["dostep"]>=3)
        {
             echo '<h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=kasowanie&strona=1" title="Przejdź do kasowania pracowników"><h3> Usunięcie pracownika </h3> </a>  </li></h5>';
        }
        if($_SESSION["dostep"]>=4)
        {
             echo '<h5><li style = "background: yellow; margin-top: 0px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=zmiana&strona=1" title="Przejdź do kasowania pracowników"><h3> Zmień dane </h3> </a>  </li></h5>
                   <h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=dostep&strona=1" title="Przejdź do kasowania pracowników"><h3> Zmień poziom dostępu </h3> </a>  </li></h5>
                   <h5><li style = "background: yellow; margin-top: -20px; border-style: outset; border-width: 2px">   <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/panel.php?subpage=usuwanie&strona=1" title="Przejdź do kasowania pracowników"><h3> Usuń użytkownika </h3> </a>  </li></h5>';
        }
        ?>
		</ul>
	</div>

	<div id="srodek">
        
        <?php
        if(isset($_GET["subpage"]))
        {
            switch($_GET["subpage"])
            {
  
            case "home" :
                include "home.php";
                break;
                
            case "form" :
                include "form.php";
                break;
                
            case "sesja" :
                include "sesja.php";
                break;
                
            case "baza" :
                include "baza.php";
                break;
                
            case "edycja" :
                include "edycja.php";
                break;
                
            case "kasowanie" :
                include "kasowanie.php";
                break;
                
            case "doedycji" :
                include "doedycji.php";
                break;             
            case "dokasowania" :
                include "dokasowania.php";
                break;
            case "szukane" :
                include "szukane.php";
                break;
            case "usuwanie" :
                include "usuwanie.php";
                break;
            case "zmiana" :
                include "zmiana.php";
                break;
            case "dostep" :
                include "dostep.php";
                break;
            case "dousuwania" :
                include "dousuwania.php";
                break;
            }
        }
        elseif($_SESSION["chod"] == 1)
        {
        $_SESSION["chod"] = 0;
        include "edycja.php";
        }
        elseif($_SESSION["chod"] == 2)
        {
        $_SESSION["chod"]= 0;
        include "kasowanie.php";
        }
        elseif($_SESSION["chod"] == 3)
        {
        $_SESSION["chod"]= 0;
        include "usuwanie.php";
        }
        elseif(isset($_SESSION["user"]))
        {
        include "witaj.php";
        }
        elseif(isset($_SESSION["Szukane"]) != 0)
        {
        include "szukane.php";
        }
        elseif($_SESSION['ses'] != 0 && $_SESSION["chod"] == 0)
        {
        $_SESSION['ses']=0;
        include "sesja.php";
        }
        else
        {
        include "home.php";
        }
        ?>
        
	</div>
	
	<div id="prawo">
    <?php
    
        if($_SESSION["dostep"]>=1)
        {
		 echo '<form  method = POST action="panel.php"> 
		    
            <input type="text" name="Szukane" style= " margin-top: 10px; margin-left: 20px; width: 200px;">  <br/> <br/>
			
			<input type="submit" name="Szukaj" value="Szukaj" style= " margin-left: 20px;">

		</form> ';
        }
    ?>
        <p style="margin-top:30px; margin-left:10px"> <a href="http://mb41449.cba.pl/Index.php?subpage=home" title="Wyloguj się"> Wyloguj </a> </p>

		<p style="margin-top:40px; margin-left:10px"> <a href="http://mb41449.cba.pl/Index.php?subpage=rejestracja" title="Przejdź do rejestracji"> Rejestracja  </a> </p>

	</div>

		<div  id="stopka">
            <?php
            if($_SESSION['licznik']!=0)
            {
            echo ("Liczba dodanych pracowników : ");
            echo $_SESSION['licznik'];
            }
            else
            echo ("Stopka");
            ?>
		</div>
	</div>
</body>
</html>					