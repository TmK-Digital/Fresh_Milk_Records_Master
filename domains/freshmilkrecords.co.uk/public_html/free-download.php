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
   <script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>

<body>



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
                        <a href="home" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="music" class="nav-link">Music</a>
                    </li>
                    <li class="nav-item">
                        <a href="merchandise" class="nav-link">Merchandise</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact" class="nav-link">Contact</a>
                    </li>
                         <li class="nav-item">
                        <a href="freedownloads" class="nav-link">Free Download</a>
                    </li>

                </ul>
 
           </nav>
           </div>

    </header>
    <!--Header ends-->

<br>
<br>
<br>
<br>

    <div class="container" style="padding-top:100px;">
        <div class="restaurant-info">
            <div class="restaurant-description padding-right animate-left">
<iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/819541366&color=%23dd2840&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/freshmilkrecords" title="Fresh Milk Records" target="_blank" style="color: #cccccc; text-decoration: none;">Fresh Milk Records</a> · <a href="https://soundcloud.com/freshmilkrecords/dee-cypher-storm" title="Dee Cypher - Storm" target="_blank" style="color: #cccccc; text-decoration: none;">Dee Cypher - Storm</a></div>
            </div>




            <div class="restaurant-info-img animate-right">
         
                <div class="soundcloud-player" style"padding-top:200px">
                  <br>
                  <br>
 <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/819541366&color=%23dd2840&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/freshmilkrecords" title="Fresh Milk Records" target="_blank" style="color: #cccccc; text-decoration: none;">Fresh Milk Records</a> · <a href="https://soundcloud.com/freshmilkrecords/dee-cypher-storm" title="Dee Cypher - Storm" target="_blank" style="color: #cccccc; text-decoration: none;">Dee Cypher - Storm</a></div>
                </div>
           

            </div>
        </div>
    </div>


    <!--Culinary delight ends-->
    <footer>
        <div class="container">
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


    <script type="text/javascript" src="js/main.js"></script>


</body>

</html>