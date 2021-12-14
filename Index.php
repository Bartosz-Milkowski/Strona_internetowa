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

		<ul type="none" style= "padding:0px">

			<h5><li style = "background: yellow;  border-style: outset; border-width: 2px"> <a style="text-decoration: none;color:black" href="http://mb41449.cba.pl/Index.php?subpage=home" title="Przejdź do strony głównej"><h3> Strona główna </h3> </a>  </li></h5>
	
            
		</ul>
	</div>

	<div id="srodek">
        
        <?php
           session_start();
        if(isset($_GET["subpage"]))
        {
             
            switch($_GET["subpage"])
            {
  
            case "home" :
                include "home.php";
                break;
                
            case "logowanie" :
                include "logowanie.php";
                break;
                
            case "rejestracja" :
                include "rejestracja.php";
                break;
                
            case "udanarej" :
                include "udanarej.php";
                break;
                
            }
        }
        elseif($_SESSION["log"] == 2)
        {
        $_SESSION["log"]= 0;
        include "udanarej.php";
        }
        
        else
        include "home.php";
        ?>
        
	</div>
	
	<div id="prawo">



    		<p style="margin-top:30px; margin-left:10px"> <a href="http://mb41449.cba.pl/Index.php?subpage=logowanie" title="Przejdź do logowania"> Zaloguj </a> </p>

			<p style="margin-top:40px; margin-left:10px"> <a href="http://mb41449.cba.pl/Index.php?subpage=rejestracja" title="Przejdź do rejestracji"> Rejestracja  </a> </p>


	</div>

		<div  id="stopka">
         
         <p> Stopka  </p>
            
		</div>
	</div>
</body>
</html>	