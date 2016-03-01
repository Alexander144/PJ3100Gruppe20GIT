<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/searchStudResalt.inc.php';
 
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tung?</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
    </head>
    <body>

  <div id="container">
    
      <input id="textfield" name="textfield" type="text" placeholder="Søk" />
          <input type="button" onclick="alert('Search & Find!')" value="Søk">
  
  <header id="mainPageHeader" class="col">
    <img src="img/WACT_hovedlogo_sort_rgb.png" class="imgLogo">
      <div class="nav">
      <ul>
        <li id="jobs" class="li-border"><a href="#">Jobber</a></li>
        <li id="addJob" class="li-border"><a href="#">Legg til en stilling</a></li>
        <li id="profileLink" class="li-border"><?php if (login_check($mysqli) == true) { echo '<a href="userinfo_page.php">Profil</a>';
            
        } else{
            echo 'Profil';
            }
              ?>
        </li>
        <li id="loginLogout" class=""><?php if (login_check($mysqli) == true) {
            echo '<a href="includes/logout.php">Logout?</a>';  
        } else {
                    echo '<a href="login.php">Logg inn</a></li>';        
                }
            ?>
<!-- *******************************************************
Lim inn denne koden for velkomst beskjed i php'en;

echo '<p>Hi ' . htmlentities($_SESSION['username']) .  '.</p>';
************************************************************-->
          </li>
          <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="updateProfile_form">
          <li><input id="textfield" name="textfield" type="text" placeholder="Søk" />
          <input type="button" id="UpdateBTN" onclick="return SearchOnProfile(this.form,this.form.textfield);" value="Søk"/>
        </form>
          </li>
      </ul>
          
    </div>
  </header>
