<?php

$hedef_site = file_get_contents("https://www.haberturk.com/tummansetler"); 

preg_match_all('#<img  src="(.*?)"#',$hedef_site, $resim);
echo "Hello";

for($m=0; $m<count($resim[1]); $m++){
    echo "hello";
    echo $resim[1][$m].'<br>';

}

?>