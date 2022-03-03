<?php

//index.php

include('config.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token']))
 {
  $access_token = $_SESSION['access_token'];
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }
 
}



?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fresh Milk Records</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!--Scroll reveal CDN-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165982203-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-165982203-1');
</script>

</head>

<body>
    
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=2954324477977774&autoLogAppEvents=1"></script>
<header>
        <div class="container">
            <nav class="nav">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <a href="user-index.php" class="logo"><img src="images/logo-nav.png" alt=""></a>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="user-index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="user-music.php" class="nav-link">Music</a>
                    </li>
                                 <li class="nav-item">
                        <a href="free-download.php" class="nav-link">Free Downloads</a>
                    </li>
            
                    <li class="nav-item">
                        <a href="user-merchandise.php" class="nav-link">Merchandise</a>
                    </li>
                    <li class="nav-item">
                        <a href="user-contact.php" class="nav-link">Contact</a>
                    </li>
                  
            
                </ul>
                <?php 
    if(isset($facebook_login_url))
    {
     echo $facebook_login_url;
    }
    else
    {
        echo '<img src="'.$_SESSION["user_image"].'" style="width:40px; border-style:solid; color:red; border-radius:50px" />';
     echo '<h3><a style="color:red; padding-left:10px padding-right:10px;">'.$_SESSION["user_name"].' <a style=";color:white;" href="logout.php" >Logout</h3 </div>';

        
        }
        ?>
           </nav>
           </div>

    </header>


    <!-- Contact Form !-->

   
   
    <div class="form-container">  
  <form id="contact"
    <h3 style="text-align:center;color:black;">Get in touch</h3>
    <br>
   
    <fieldset style="diplay:flex" >
          <img src="images/email-icon.png" a href="mailto:freshmilkrecords@mail.com" style="width:60px">
<br>
<br>
<a href="mailto:freshmilkrecords@mail.com" style="color:black;font-size:18px;">Click to Email Us</a>
<br>
<br>
			<a class="facebookBtn smGlobalBtn" href=https://www.facebook.com/freshmilkrecords></a>
			<br>
		<h2>Follow us </h2>

    </fieldset>
  <div class="fb-like" data-href="https://www.facebook.com/freshmilkrecords/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
</div>

    <!--Culinary delight ends-->
    <footer>
        <div class="form-container">
            <div class="back-to-top">
                <a href="#hero"><i class="fas fa-chevron-up"></i></a>
            </div>
            <div class="footer-content">
                <div class="footer-content-about animate-top">
                    <h4>About Fresh Milk Records</h4>
                    <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                    <p>
                        We are a strictly vinyl only label bringing you that greatly missed underground House & Garage sound.
                        <br>
                        <br> Selectively bringing forward artists which delve deep into their sample banks for that raw sound of the 90s
                    </p>
                </div>
                <div class="footer-content-divider animate-bottom">
                    <div class="social-media">
                        <h4>Follow Us</h4>
                        <ul class="social-icons">
                            <li>
                                <a href="https://www.instagram.com/freshmilkrecords/"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/freshmilkrecords/"><i class="fab fa-facebook-square"></i></a>
                            </li>
                            <li>
                                <a href="https://soundcloud.com/freshmilkrecords"><i class="fab fa-soundcloud"></i></a>
                            </li>


                        </ul>
                    </div>
                    <div class="newsletter-container">
                        <h4>Email us for new releases</h4>
                        <form action="" class="newsletter-form">
                            <input type="text" class="newsletter-input" placeholder="Your email address...">
                            <button class="newsletter-btn" type="submit">
                            <i class="fas fa-envelope"></i>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
    </script>  
                    

    <script type="text/javascript" src="js/main.js"></script>


</body>

</html>