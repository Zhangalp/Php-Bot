<?php

$hedef_site = file_get_contents("https://www.haberturk.com/"); 

$logo = explode('<img width="80" src="',$hedef_site);

$logo = explode('"',$logo[1]);

$logo = $logo[0];

echo '<img src="'.$logo.'" /><div style="clear:both"></div>';

preg_match_all('#<span class="title">(.*?)</span>#',$hedef_site, $baslik);

preg_match_all('#<span class="title">(.*?)</span>#',$hedef_site, $link);

for($i=2; $i<count($baslik[1]); $i++){

    echo $baslik[1][$i].'<br>';

    

}
/*
echo '<textarea style="width:100%; height:500px">'.$hedef_site.'</textarea>';
*/
?>