<?php
session_start();
include("application/config/config.php");
include("application/config/connect.php");
include("application/config/default_functions.php");
$pageNavId=8;
fHeader($active=$pageNavId);
navigatie($active=$pageNavId);

if(!isSet($_SESSION['blad']))
  {
    $_SESSION['blad']='disclaimer_page';
    }
if(isSet($_SESSION['blad'])&& $_SESSION['blad'] !=='disclaimer_page')    
{
  $_SESSION['blad']='disclaimer_page';
}

echo "<div class=\"container\">";
// haal je gegevens voor disclaimer uit database
$sql = mysql_query("SELECT * FROM `pages` where `page_nav_id`=$pageNavId and `page_show` ='y'");
if (mysql_num_rows($sql)==0)   
{
    die ("Je hebt geen gegevens tot je beschikking");
}

while ($content = mysql_fetch_assoc($sql)) 
{
    echo "<h1>".$content["page_title"]."</h1>";
    echo "<br /><p>";
    echo utf8_encode($content["page_content"]);
    echo "<br /><p>";
}

// show de inhoud
echo "</div>";
fFooter($active=$pageNavId);