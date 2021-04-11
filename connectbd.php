<?php
$db = mysql_connect ("localhost","d28260","Jcrejkf@2019") or die(mysql_error());
    mysql_select_db ("d28260",$db);
    $class = $_GET['class'];
    $result = mysql_query("SELECT * FROM tables WHERE class='$class'", $db);
    $myrow = mysql_fetch_array($result);
    //  WHERE class=1
    echo $myrow["den"];
    echo $myrow["rasp"];
    
?>