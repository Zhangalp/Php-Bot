
<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->

	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="https://getbootstrap.com/docs/4.0/examples/carousel/carousel.css" rel="stylesheet">	
	
<style>Carousel

body{
  background-color: #add8e6;
}


#menu{

  text-decoration:none;
  list-style-type:none;  
}

#menu a{
  text-decoration:none;
  color: white;
}

#menu li{
margin-top:15px;
list-style-type:none;
text-decoration:none;
float:left; margin-right:30px;
padding:5px 8px;
border:1px solid black;


}
.navbar-brand{
  margin-left: 15px;
}

.card-container{
    height: 350px;
    overflow: hidden;
    box-shadow: 0px 0px 15px -5px;
    transition: 0.5s;
    animation: ease-out;
    border-radius: 10px;
    float: left;
    margin-left: 6.3%;
    background-color: white;
}
.card-container:hover{
    transform: scale(1.1);
    box-shadow: 0px 0px 15px 0px;

}
.image-container img{
    overflow: hidden;
    width: 100%;
    height: 200px;
    border-radius: 10px;
}
.card-content{
  width: 100%;
  background-color: white;
  border-radius: 10px;
}
.card-title{
    margin-bottom: 0.5rem;
    text-align: center;
    position: relative;
    justify-content: center;
    align-items: center;

}
.card-text {
  width: 100%;
  justify-content: center;
  text-align: center;
  align-items: center;
  height: 40px;
  white-space: normal;
  word-break: break-all;
  padding: 4px;
}

.card-buttons{
    margin-top: 20px;
    display: flex;
    justify-content: center;
    position: relative;
    border: 1px;
}
.card-buttons button{
    padding: 0.5rem;
    background-color: white;
    border: 5px;
    transition: 0.2s;
    margin-bottom: 0.5rem;
    border-radius: 5px;

}
.card-buttons button:hover{
    background: rgba(27,156,257,0.1);

}
a{
    text-transform: uppercase;
    color: #06090a;
    text-decoration: none;
    font-weight: bold;

}
.page-image-container{
  width: 100%;
  justify-content: center;
  text-align: center;
  margin-bottom: 30px;
  background-color: #d6ffff;
}
.page-image-container img{
  width: 80%;
  border-radius: 20px;
  box-shadow: 0px 0px 20px -5px;
}
#footer-text{
  text-align: center;
  justify-content: center;
}
#footer-copy{
  text-align: center;
  justify-content: center;
}
.kards-container{
  height: 450px;
  background-color: #d6ffff;
}

</style>
    <!-- Custom styles for this template -->
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a  class="navbar-brand" href="#">ARI NEWS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul id="menu">
            <li><a href = "/main_page.php">Ana Sayfa</a></li>
            <li><a href = "/hakkımızda.php">Hakkımızda</a></li>
            <li><a href = "/blog.php">Bloglar</a></li>

            <?php
                if (isset($_SESSION["userid"])){
                  echo "<li><a href = '/profile.php'>Profil</a></li>";
                  echo " <li><a href = '/includes/logout.inc.php'>Çıkış yap</a></li>";
                }
                else{
                  echo "<li><a href = 'signup.php'>Giriş Yap</a></li>";
                  echo " <li><a href = 'loginPage.php'>Login</a></li>";
                }
            ?>
        
         </ul>
        
      </nav>
    </header>






        