
<?php
include ("../includes/db.inc.php");
include("../header.php");


$hedef_site = file_get_contents("https://www.haberturk.com/tummansetler"); 


preg_match_all('#<a  href="(.*?)"#',$hedef_site, $link);
$parcala= explode( '<img src="', $hedef_site);
preg_match_all("/< *img[^>]*alt *= *[\"\']?([^\"\']*)/i",$hedef_site, $title);




$link_array = array();
$title_array = array();
$resim_array = array();
$aciklama_array = array();

for($i=0; $i<count($link[1]); $i++){

$link_array[] .= $link[1][$i];

$linke_baglan = file_get_contents('https://www.haberturk.com'.$link[1][$i]);

$link_parcala= explode( '<h2 class="spot-title">', $linke_baglan);

$link_parcala= explode( '</h2>', $link_parcala[1]);

$aciklama_array[] .=$link_parcala[0];


}


for($t=17; $t<count($parcala);$t++){

$parcala2 = explode('"', $parcala[$t]);
$resim_array[] .= $parcala2[0];


}


for($a=18; $a<count($title[1]); $a++){

$title_array[] .= $title[1][$a];

}

// INSERT İŞLEMİ BAŞLIYOR.

for($m=0; $m<count($link_array); $m++){

$link = trim(strip_tags(addslashes($link_array[$m])));
$resim = trim(strip_tags(addslashes($resim_array[$m])));
$title = trim(strip_tags(addslashes($title_array[$m])));
$aciklama = trim(strip_tags(addslashes($aciklama_array[$m])));

$varmi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM haberler WHERE Link='$link'"));

if($varmi==0 and isset($link) and isset($resim) and isset($title)){

$sql = "INSERT INTO haberler SET Resim='$resim', Baslik='$title', Link='$link', Aciklama='$aciklama'";    

$query = mysqli_query($conn, $sql);

if($query){

echo '<span style="color:green">Haber eklenmiştir</span><br>';

}

}else{

echo '<span style="color:darkred">Bu haber daha önce eklenmiş</span><br>';

}


}


/*
for($i=0; $i<count($link[1]); $i++){

    foreach ($link as $db_link){

    echo "https://www.haberturk.com/".$link[1][$i].'<br>';
    $sql = "INSERT INTO haberler(Link) VALUES ('$db_link[1][$i]')";
    $query = mysqli_query($conn, $sql);
}

}


for($t=17; $t<count($parcala);$t++){
    $parcala2 = explode('"', $parcala[$t]);
    echo '<img src="'.$parcala2[0].'"><br/>';
}



for($a=18; $a<count($title[1]); $a++){
    echo $title[1][$a].'<br>';

}
*/

/*
echo '<textarea style="width:100%; height:500px">'.$hedef_site.'</textarea>';
*/


?>







<!DOCTYPE html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<table class="table table-striped"> 
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Resim</th>
      <th scope="col">Link</th>
      <th scope="col">Açıklama</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  
  $haber_cek = mysqli_query($conn, "SELECT * FROM haberler ORDER BY ID DESC LIMIT 0,10");
  
  while ($rows = mysqli_fetch_assoc($haber_cek))
  {
    ?>  

    <tr>
      <td scope="row"><?php echo $rows["ID"]?> </td>
      <td scope="row"><img src="<?php echo $rows["Resim"];?>" width="70" /> </td>
      <td scope="row"><a target = '_blank' href="haber.php?haber_id=<?php echo $rows["ID"]?>"><?php echo $rows["Baslik"]?> </a></td>
      <td scope="row"><?php echo $rows["Aciklama"]?> </td>
    </tr> 
    <?php
  }
  ?>
  </tbody>
</table>
</html>