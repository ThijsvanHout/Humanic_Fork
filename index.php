<?php
session_start();
include("application/config/config.php");
include("application/config/connect.php");
include("application/config/default_functions.php");

$pageNavId=1;
fHeader($pageNavId);//actief=$pageNavId);

/*if(!isSet($_SESSION['blad']))
{
 $_SESSION['blad']='index_page';
}
if($_SESSION['blad']!=='index_page')    
{
  $_SESSION['blad']='index_page';
}*/


if(!isSet($_SESSION["user_authorisatie"]) OR  (isSet($_SESSION["user_authorisatie"]) && $_SESSION["user_authorisatie"] === "usr") &&  isSet($_SESSION["loginnaam"]))
     {
       
       navigatie($pageNavId);    
     }
elseif(isSet($_SESSION["user_authorisatie"])&& $_SESSION["user_authorisatie"]=="admin" OR $_SESSION["user_authorisatie"]=="ptr")
         {
           navigatieA($pageNavId);
         }
       
$sql = mysql_query("SELECT * FROM `pages` WHERE `page_nav_id`=$pageNavId  and `page_taal` = 'nl' and `page_show` ='y' ");
    if (mysql_num_rows($sql)==0)   
      {
         die ("Je hebt geen gegevens tot je beschikking");
      }
while ($content = mysql_fetch_assoc($sql)) 
   {   // show de inhoud
       //echo "<div id=\"kolomLinks\">";
       // echo "<div id=\"messageL\">";
        echo utf8_encode($content["page_title"]);
        echo utf8_encode($content["page_content"]);
       //echo "<br /><p>"; 
       //echo utf8_encode($content["page_title"]);
       //echo "<br /><p>";
      // echo "</div>";
   }


/*echo "<div id=\"middle\">";
echo "<aside>";
echo "<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
<!-- advertentie-ruimte -->
<ins class=\"adsbygoogle\"
     style=\"display:block\"
     data-ad-client=\"ca-pub-8569192749694084\"
     data-ad-slot=\"3299327059\"
     data-ad-format=\"auto\"></ins>
 <script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>";
echo "</aside>";
echo "</div>"; */

 fFooter($pageNavId);//$active=$pageNavId);
?>