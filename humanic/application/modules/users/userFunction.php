<?php

function overzicht()
{
     if(isset($_GET['user_page']))
     {
      $_SESSION['user_page']=$_GET['user_page'];
    
      }
   else
      {
        if (!isset($_SESSION['user_page']))
           {
             $_SESSION['user_page']=0;
            }
       }

    $qpp = 10; // hier geef ik aan hoeveel records ik op een pagina wil zien
    $start=$_SESSION['user_page']*$qpp;
    $prev = $_SESSION['user_page']-1;
    $next = $_SESSION['user_page']+1;
    $from = $_SESSION['user_page']*$qpp+1;
    $to = $_SESSION['user_page'] * $qpp + $qpp;

   /* $start=$_SESSION['user_page']*10;
    $prev = $_SESSION['user_page']-1;
    $next = $_SESSION['user_page']+1;
    $from = $_SESSION['user_page']*10+1;
    $to = $_SESSION['user_page'] * 10 + 10; */

    
    $users = mysql_query("SELECT * FROM user ") or die(mysql_error());// ik doe hier een call(query) naar de databse op alle users in de 'user'tabel
    $count_users = mysql_num_rows($users);// hier tel ik vervolgens hoeveel users de query heeft opgeleverd
    //print "$count_users<br>";
    //print "$to<br>";
    $objecten = mysql_query("SELECT * FROM user LIMIT $start,10") or die(mysql_error());
    $count_Limit_users = mysql_num_rows($objecten);
    
    if (mysql_num_rows($objecten) == 0) 
    {
        die("<i>Nog geen users aanwezig !</i>");
    }
        //$GLOBALS['path']="http://www.pieterspierenburg.com/psinfo/";
        $GLOBALS['path']="http://localhost:7777/humanic/";
        global $path;
     /*   echo "<h3 align=center>Overzicht Geregistreerde Gebruikers</h3>";
        echo "<table id=\"edit\" cellpadding=\"3\" cellspacing=\"3\" >";
        echo "<tr>";
        echo "<th width=\"50\" align=\"left\">Edit</th>";
        echo "<th width=\"50\" align=\"left\">User inlognaam</th>";
        //echo "<th width=\"50\" align=\"left\">User wachtwoord</th>";
        echo "<th width=\"50\" align=\"left\">User authorisatie</th>";
        echo "<th width=\"50\" align=\"left\">User Activ</th>";
        echo "<th width=\"50\" align=\"left\">Geregistreerd sinds</th>";
        echo "<th width=\"90\" align=\"left\">Datum laats gezien</th>";
        echo "<th width=\"50\" align=\"left\">Tijdstip laats gezien</th>";
        echo "</tr>";

	while ($bericht = mysql_fetch_object($objecten)) 
        {
            echo "<tr>";
            echo "<td width=\"50\" align=\"left\"><a href=\"".$_SERVER['PHP_SELF']."?user_id=".$bericht->user_id."\">edit</a></td>";
            echo "<td>".utf8_encode($bericht->user_inlognaam)."</td>";
            //echo "<td>".utf8_encode($bericht->user_wachtwoord)."</td>";
            echo "<td>".utf8_encode($bericht->user_authorisatie)."</td>";
            echo "<td>".utf8_encode($bericht->user_activ)."</td>";
            echo "<td>".utf8_encode($bericht->user_sinds)."</td>";
            echo "<td>".utf8_encode($bericht->datum_gezien)."</td>";
            echo "<td>".utf8_encode($bericht->tijdstip_gezien)."</td>";
            
            echo "</tr>";
        }

        echo "</table>";
        echo "<table>";
        echo "<tr><td colspan='3'></td>";
        //echo "<tr><td>".($prev>=0?"<a href=user.php?user_page=".$prev. "> prev </a>":"prev")."</td>";
        //echo "<td>$from...$to</td>";
        //echo "<td>".(mysql_num_rows($objecten)>9?"<a href=user.php?user_page=" .$next. "> next </a>":"next")."</td>";

        echo "<tr><td>".($prev>=0?"<a href=user.php?user_page=".$prev. "> prev </a>":"prev")."</td>";
        echo "<td>$from...$to</td>";
         echo "<td>".(($count_users - $to)> 0?"<a href=user.php?user_page=" .$next. "> next </a>":"next")."</td>"; 
        echo "</tr>";
        echo "</table>"; */
        
        //donderdag 7 juli 2016 toegevoegd
          echo "<h3 align=center>Overzicht Geregistreerde Gebruikers</h3>";
        echo "<table id=\"edit\" cellpadding=\"3\" cellspacing=\"3\" >";
        echo "<tr>";
        //echo "<th width=\"50\" align=\"left\">Edit</th>";
        echo "<th width=\"50\" align=\"left\">Pasfoto</th>";
        echo "<th width=\"50\" align=\"left\">Geregistreerd sinds</th>";        
        echo "<th width=\"50\" align=\"left\">Achternaam</th>";
        echo "<th width=\"50\" align=\"left\">Tussenvoegsel</th>";
        echo "<th width=\"50\" align=\"left\">Voornaam</th>";
        echo "<th width=\"50\" align=\"left\">Straat</th>";
        echo "<th width=\"50\" align=\"left\">Huisnummer</th>";
        echo "<th width=\"50\" align=\"left\">Postcode</th>";
        echo "<th width=\"50\" align=\"left\">Plaats</th>";
        echo "<th width=\"50\" align=\"left\">Telefoon</th>";
        echo "<th width=\"50\" align=\"left\">Geb.Datum</th>";
        echo "<th width=\"50\" align=\"left\">Salaris Indicatie</th>";
        echo "<th width=\"50\" align=\"left\">WW-geldig-tot</th>";
        echo "<th width=\"50\" align=\"left\">Sector-afkomstig</th>";
        echo "<th width=\"50\" align=\"left\">Bedrijf-grootte</th>";
        echo "<th width=\"50\" align=\"left\">Rijbewijs</th>";
        
        
        
        echo "</tr>";

	while ($bericht = mysql_fetch_object($objecten)) 
        {
            $imagepath=$GLOBALS['path']."assets/images/";
            echo "<tr>";
           // echo "<td width=\"50\" align=\"left\"><a href=\"".$_SERVER['PHP_SELF']."?user_id=".$bericht->user_id."\">edit</a></td>";
            echo "<td>".utf8_encode("<img width=\"60\" height=\"60\" style=\"margin: 5px;\" src=\"$imagepath").utf8_encode($bericht->foto).".jpg\" /></td>";
            echo "<td>".utf8_encode($bericht->user_sinds)."</td>";
            echo "<td>".utf8_encode($bericht->achternaam)."</td>";
            echo "<td>".utf8_encode($bericht->tussenvoegsel)."</td>";
            echo "<td>".utf8_encode($bericht->voornaam)."</td>";
            echo "<td>".utf8_encode($bericht->straat)."</td>";
            echo "<td>".utf8_encode($bericht->huisnummer)."</td>";
            echo "<td>".utf8_encode($bericht->postcode)."</td>";
            echo "<td>".utf8_encode($bericht->plaats)."</td>";
            echo "<td>".utf8_encode($bericht->telefoon)."</td>";
            echo "<td>".utf8_encode($bericht->geboortedatum)."</td>";
            echo "<td>".utf8_encode($bericht->salaris)."</td>";
            echo "<td>".utf8_encode($bericht->ww_geldig_tot)."</td>";
            echo "<td>".utf8_encode($bericht->user_sector)."</td>";
            echo "<td>".utf8_encode($bericht->user_bedrijf_grootte)."</td>";
            echo "<td>".utf8_encode($bericht->user_rijbewijs)."</td>";
            
            
            echo "</tr>";
        }

        echo "</table>";
        echo "<table>";
        echo "<tr><td colspan='3'></td>";
        //echo "<tr><td>".($prev>=0?"<a href=user.php?user_page=".$prev. "> prev </a>":"prev")."</td>";
        //echo "<td>$from...$to</td>";
        //echo "<td>".(mysql_num_rows($objecten)>9?"<a href=user.php?user_page=" .$next. "> next </a>":"next")."</td>";

        echo "<tr><td>".($prev>=0?"<a href=user.php?user_page=".$prev. "> prev </a>":"prev")."</td>";
        echo "<td>$from...$to</td>";
         echo "<td>".(($count_users - $to)> 0?"<a href=user.php?user_page=" .$next. "> next </a>":"next")."</td>"; 
        echo "</tr>";
        echo "</table>";    
        
        
        
        
        
        
        
}
function userBewerken()
{
    if (!isset($_GET['user_id']))
    {
        redirect($_SERVER['PHP_SELF']);
        die();
    }
    $bericht = mysql_query("SELECT * FROM user WHERE user_id = ".$_GET['user_id']." LIMIT 1") or die(mysql_error());
    if (mysql_num_rows($bericht) == 0)
    {
        die("Deze user bestaat niet !");
    }
    $bericht = mysql_fetch_object($bericht);
    echo "Wijzigen van user: <a class=\"edit\">".utf8_encode($bericht->user_inlognaam)."</a> met ID: <a class=\"edit\">".($bericht->user_id)."</a><br /><br />";
    echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\" enctype=\"multipart/form-data\">";
    echo "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"2\">";
    echo "<tr><td width=\"150\">User inlognaam:</td>";
    //echo "<td><input type=\"text\" value=\"".utf8_encode($bericht->usr_inlognaam)."\" size=\"50\" name=\"usr_inlognaam\" /></td></tr>";
    echo "<td>".utf8_encode($bericht->user_inlognaam)."</td></tr>";
   // echo "<tr><td width=\"150\">User wachtwoord:</td>";
    //echo "<td><input type=\"text\" value=\"".utf8_encode($bericht->usr_wachtwoord)."\" size=\"50\" name=\"usr_wachtwoord\" /></td></tr>";
   // echo "<td>".utf8_encode($bericht->user_wachtwoord)."</td></tr>";    
    echo "<tr><td width=\"150\">User authorisatie:</td>";
    // 'beheerder','redacteur','fin_admin','verkoper'
    echo "<td><input type=\"radio\" name=\"user_authorisatie\"";
    $waarde="usr";
    echo "value=$waarde ".(($bericht->user_authorisatie==$waarde)?"checked":"")."> $waarde ";
    echo "<input type=\"radio\" name=\"user_authorisatie\"";
    $waarde="admin";
    echo "value=$waarde ".(($bericht->user_authorisatie==$waarde)?"checked":"")."> $waarde ";
    
    echo "<tr><td width=\"150\">User Activ:</td>";
    // 'yes','no'
    echo "<td><input type=\"radio\" name=\"user_activ\"";
    $waarde="yes";
    echo "value=$waarde ".(($bericht->user_activ==$waarde)?"checked":"")."> $waarde ";
    echo "<input type=\"radio\" name=\"user_activ\"";
    $waarde="no";
    echo "value=$waarde ".(($bericht->user_activ==$waarde)?"checked":"")."> $waarde ";
            
    echo "<tr><td>&nbsp;</td>";
    echo "<td><input type=\"hidden\" name=\"user_id\" value=\"".$bericht->user_id."\" />";
    echo "<input type=\"submit\" name=\"submit_edit_item\" value=\" Opslaan !\" /></td></tr>";
    echo "</table>";
    echo "</form>";
}

function userBewerktOpslaan()
{   
    $zoek = array("'", "á", "é", "í", "ó", "ú", "ñ", "ç", "Á", "É", "Í", "Ó", "Ú", "Ñ", "Ç", "à", "è", "ì", "ò", "ù", "À", "È", "Ì", "Ò", "Ù",
     "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", "â", "ê", "î", "ô", "û", "Â", "Ê", "Î", "Ô", "Û", "ā", "ū", "ś", "ī");

    $maakentity = array("&acute;", "&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&ntilde;", "&ccedil;", "&Aacute;",
    "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Ntilde;", "&Ccedil;", "&agrave;", "&egrave;", "&igrave;", "&ograve;",
     "&ugrave;", "&Agrave;", "&Egrave;", "&Igrave;", "&Ograve;", "&Ugrave;", "&auml;", "&euml;", "&iuml;", "&ouml;",
    "&uuml;", "&Auml;", "&Euml;", "&Iuml;", "&Ouml;", "&Uuml;", "&acirc;", "&ecirc;", "&icirc;", "&ocirc;", "&ucirc;", "&Acirc;",
    "&Ecirc;", "&Icirc;", "&Ocirc;", "&Ucirc;", "&#257;", "&#363;", "&#347;", "&#299;");
    
    $user_activ=(trim($_POST['user_activ']));
    $user_activ=str_replace($zoek, $maakentity, $user_activ);
    $user_authorisatie=(trim($_POST['user_authorisatie']));          
    $user_authorisatie = str_replace($zoek, $maakentity, $user_authorisatie);

    if (isset($_POST['submit_edit_item']))
    {
        mysql_query("UPDATE `user` SET `user_id` ='".$_POST['user_id']."', `user_authorisatie` ='".$user_authorisatie."', `user_activ`= '".$user_activ."' WHERE `user_id` = ".$_POST['user_id']." ") or die(mysql_error());
    }
    $result_id=$_POST['user_id'];
    show_tekst($result_id);
    echo "</div>";
}

function show_tekst($result_id)
{
    $result_sql = mysql_query("SELECT * FROM user WHERE user_id=".$result_id."");
    while($q=mysql_fetch_array($result_sql))
    {
        echo "De tekst is gewijzigd en ziet er als onderstaand uit.<br />";
        echo "<a href=\"".$_SERVER['PHP_SELF']."?user_id=".$q['user_id']."\" >Klik hier als u nog iets in de tekst wilt veranderen.</a><br /><br />";
        echo "<table cellpadding=\"2\">"; // width=\"90%\">";
        echo "<tr><th>User inlognaam:&nbsp;</th><td class=\"kleur\">".$q['user_inlognaam']."</td></tr>";
        //echo "<tr><th>User wachtwoord:&nbsp;</th><td class=\"kleur\">".$q['user_wachtwoord']."</td></tr>";
        echo "<tr><th>User authorisatie:&nbsp;</th><td class=\"kleur\">".$q['user_authorisatie']."</td></tr>";
        echo "</table><p><hr/ height=\"3px\"></p>";
        overzicht();
    }
}

?>