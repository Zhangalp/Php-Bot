
<?php

$hedef_site = file_get_contents("https://www.haberturk.com/tummansetler"); 

preg_match_all('#<img  alt="(.*?)"#',$hedef_site, $baslik);


for($a=0; $a<count($baslik[1]); $a++){
    echo "hello";
    echo $baslik[1][$a].'<br>';

}

?>