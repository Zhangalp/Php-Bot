
<?php
include ("../header.php");
include ("../includes/db.inc.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class = "search-form" style = "margin-top: 40px;" class = "get-topic" method = "POST">
        <label>What do u want to know?</label>
        <input type = "text" name = "wanted_knowledge" id = "wanted_knowledge">
        <button class="btn btn-lg btn-primary btn-block"  name ="submit" id="submit" value = "LOGIN">Search</button>
    </form>


<div class = info-container>
<?php

if (isset ($_POST["submit"])){
    $wanted = $_POST["wanted_knowledge"];
    if ($wanted != null){
    $hedef_site = file_get_contents("https://tr.wikipedia.org/wiki/".$wanted);
    
    preg_match_all("/<p>(.*?)<\/p>/s", $hedef_site, $bilgi);
    $bilgi_array[] = array();
    for($a=0; $a<count($bilgi[1]); $a++){
        $bilgi_array[] .= $bilgi[1][$a];
        $bilgiler = trim(strip_tags($bilgi_array[$a]));
        echo "<p class = 'main-info'>".$bilgiler."<p>";
    }
    }else{
        echo "Adam akıllı bir şey girin"    ;
    }

}



    echo "<h2><a target = _blank href = https://tr.wikipedia.org/wiki/".$wanted.">"."For more information please visit the actual site by clicking </a> </h2>";



?>

</div>

</body>
</html>






