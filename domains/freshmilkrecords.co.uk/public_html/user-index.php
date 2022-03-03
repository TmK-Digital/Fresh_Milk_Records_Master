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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165982203-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-165982203-1');
</script>

</head>

<body onload="myFunction()">

<script> function myFunction()
{
alert ('You have Logged in')
}</script>



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
    <!--Header ends-->
    <section class="hero" style="border-bottom: 2px solid black" id="hero">
        <div class="container">


            <div class="single-animation">
                <img src="images/logo.png" class="hero-logo" alt="">
            </div>
        </div>

    </section>
    <!--Hero ends-->

    <!-- Modal Pop Up -->


    <div id="my-modal-soundcloud" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Welcome</h2>
            </div>
            <div class="modal-body">
                <div class="login-form">
              
                    <form>
                        <input type="email" placeholder="Username or Email" name="username" required>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <input type="password" placeholder="Confirm Password" name="psw" required>
                        <button type="submit">Admin Login</button>

                        <label class="remember-me"><input type="checkbox" name="remember">Remember me</label>
                        <span class="forget-psw">Forgot <a href="#">password?</a></span>

                        <div class="social-btn">
                        <h3 style="text-align:center; padding-bottom:30px; font-weight:800">OR</h3>
                            <button type="submit" class="twitter-btn"> <a href="merchandise.html" style="color: white;">Continue as Guest</a></button>
                            <input type="button" style=" cursor:pointer;background-color: #3f68be; color:white" onclick="window.location = '<?php echo $facebook_login_url ?>'" value="Login with Facebook" img src="images/fb-login.png" alt="">  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">

            <h2 class="term">I have read and agree to the Terms and Conditions and Privacy Policy
        </div>
    </div>
    </div>

    <!-- Modal Pop up ends-->



    <div id="my-modal-vinyl" class="modal">
        <div class="modal-content">
        <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Welcome</h2>
            </div>
            <div class="modal-body">
                <div class="login-form">
              
                    <form>
                        <input type="email" placeholder="Username or Email" name="username" required>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <input type="password" placeholder="Confirm Password" name="psw" required>
                        <button type="submit">Admin Login</button>

                        <label class="remember-me"><input type="checkbox" name="remember">Remember me</label>
                        <span class="forget-psw">Forgot <a href="#">password?</a></span>

                        <div class="social-btn">
                        <h3 style="text-align:center; padding-bottom:30px; font-weight:800">OR</h3>
                            <button type="submit" class="twitter-btn"> <a href="merchandise.html" style="color: white;">Continue as Guest</a></button>
                            <input type="button" style=" cursor:pointer;background-color: #3f68be; color:white" onclick="window.location = '<?php echo $facebook_login_url_music ?>'" value="Login with Facebook" img src="images/fb-login.png" alt="">  
                        </div>
                    </form>
                </div>
            </div>
        <div class="modal-footer">

            <h2 class="term">I have read and agree to the Terms and Conditions and Privacy Policy
        </div>
    </div>
    </div>



    <div id="my-modal-order" class="modal">
        <div class="modal-content">
        <div class="modal-header">
                <span class="close-soundcloud">&times;</span>
                <h2>Welcome</h2>
            </div>
            <div class="modal-body">
                <div class="login-form">
              
                    <form>
                        <input type="email" placeholder="Username or Email" name="username" required>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <input type="password" placeholder="Confirm Password" name="psw" required>
                        <button type="submit">Admin Login</button>

                        <label class="remember-me"><input type="checkbox" name="remember">Remember me</label>
                        <span class="forget-psw">Forgot <a href="#">password?</a></span>

                        <div class="social-btn">
                        <h3 style="text-align:center; padding-bottom:30px; font-weight:800">OR</h3>
                            <button type="submit" class="twitter-btn"> <a href="merchandise.html" style="color: white;">Continue as Guest</a></button>
                            <input type="button" style=" cursor:pointer;background-color: #3f68be; color:white" onclick="window.location = '<?php echo $facebook_login_url_music ?>'" value="Login with Facebook" img src="images/fb-login.png" alt="">  
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">

            <h2 class="term">I have read and agree to the Terms and Conditions and Privacy Policy
        </div>
    </div>
    </div>


    <div class="container">
        <div class="restaurant-info">
            <div class="restaurant-description padding-right animate-left">
                <div class="player">
                    <span id="arm">   </span>
                    <ul>
                        <li class="artwork">
                        </li>
                        <li class="info">
                            <h1 id="artist" style="letter-spacing:-1px;text-transform:uppercase; font-weight:600">loading</h1>
                            <h2 id="album" style=" color:black; padding-top:3px">loading</h2>
                            <h4 id="song" style="color:black">loading</h4>
                            <div class="button-items">
                                <audio id="music" preload="auto">
                            </audio>
                                <div id="slider">
                                    <div id="elapsed"></div>
                                    <div id="buffered"></div>
                                </div>

                                <p id="timer" style="padding-bottom:3px;font-weight:600; color:black">0:00</p>
                                <div class="controls">
                                    <span class="expend">
                                            <svg id="previous" class="step-backward" viewBox="0 0 30 30" xml:space="preserve">
                                                <g>
                                                    <polygon points="4.9,4.3 9,4.3 9,11.6 21.4,4.3 21.4,20.7 9,13.4 9,20.7 4.9,20.7"/>
                                                </g>
                                            </svg>
                                        </span>
                                    <svg id="play" viewBox="0 0 25 25" xml:space="preserve">
                                            <defs>
                                                <rect x="-49.5" y="-132.9" width="450.4" height="400.4"/>
                                            </defs>
                                    <g>
                                                <circle fill="none" cx="12.5" cy="12.5" r="10.8"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z"/>
                                            </g>
                                        </svg>
                                    <svg id="pause" viewBox="0 0 25 25" xml:space="preserve">
                                            <g>
                                                <rect x="6" y="4.6" width="3.8" height="15.7"/>
                                                <rect x="14" y="4.6" width="3.9" height="15.7"/>
                                            </g>
                                        </svg>
                                    <span class="expend">
                                            <svg id="next" class="step-foreward" viewBox="0 0 25 25" xml:space="preserve">
                                                <g>
                                                    <polygon points="20.7,4.3 16.6,4.3 16.6,11.6 4.3,4.3 4.3,20.7 16.7,13.4 16.6,20.7 20.7,20.7"/>
                                                </g>
                                            </svg>
                                        </span>
                                    <div class="slider">
                                        <div class="volume"></div>
                                        <input type="range" id="volume" min="0" max="1" step="0.01" value="1" />
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <h1 id="headline-buy padding-right animate-left" style="text-transform:uppercase;padding-left:250px;position:absolute;padding-top: 50px; z-index: 1; font-size: 30px">In stock now
                    <br>
                    <br>
               <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="JVR37NCKMPDNE">
                            <table>
                                <tr>
                                    <td><input type="hidden" name="on0" value="FM-001"></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 40px; padding-right: 30px;"><select name="os0">
                                <option value="UK - Shipping">UK - Shipping £18 GBP</option>
                                <option value="Europe - Shipping">Europe - Shipping £24.50 GBP</option>
                                <option value="Worldwide - Shipping">Worldwide - Shipping £33 GBP</option>
                            </select> </td>
                                </tr>
                            </table>
                            <input type="hidden" name="currency_code" value="GBP">
                            <br>
                            <input type="image" src="images/addtocart.jpg" style="width: 100px;" order="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                        </form>
                </h1>

            </div>




            <div class="restaurant-info-img animate-right">
                <img src="images/album.png" class="album-photo" alt="">
                <div class="soundcloud-player">
                    <iframe width="100%" height="400" scrolling="yes" frameborder="yes" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/868383878&color=%23ff002d&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                </div>
                <br>
                <br>
                <div class="button-buy">
                   <form method="get" action="user-music.php">
                <button type="submit" class="button" style="color: white">Order Now</button>
                </div>
                    </form>

            </div>
        </div>
    </div>
    <!--Discover our story ends-->
    <section class="tasteful-recipes between">
        <div class="container">
            <div class="global-headline">

                <div class="animate-bottom">
                    <h1 class="headline" style="letter-spacing:-2px">Underground house & Garage</h1>
                </div>
            </div>
        </div>
    </section>
    <!--Tasteful recipes ends-->
    <section class="discover-our-menu">
        <div class="container">
            <div class="restaurant-info">
                <div class="image-group padding-right animate-left">
                    <img src="images/stripe-secure.png" style="padding-top:70px" alt="">

                    <img src="images/dem-2.png" alt="">

                </div>
                <div class="restaurant-description-2 animate-right">
                    <div class="global-headline">
                 <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/1032508450&color=%23d11d1d&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/freshmilkrecords" title="Fresh Milk Records" target="_blank" style="color: #cccccc; text-decoration: none;">Fresh Milk Records</a> · <a href="https://soundcloud.com/freshmilkrecords/sets/dem2-full-circle-ep-release-20" title="DEM2 - FULL CIRCLE EP - FMR002 - PRE ORDER NOW" target="_blank" style="color: #cccccc; text-decoration: none;"></a></div>
<br>
     <a href="music.php" class="btn body-btn" style="font-weight: 800">Pre-Order now</a>
                
                </div>
            </div>
        </div>
    </section>
    <!--Discover our menu ends-->
    <section class="perfect-blend between">
        <div class="container">
            <div class="global-headline">

                <div class="animate-bottom">
                    <h1 class="headline" style="letter-spacing:-1px">Quality Vinyl Label</h1>
                </div>
            </div>
        </div>
    </section>
    <!--Perfect blend ends-->
    <section class="culinary-delight">
        <div class="container">
            <div class="restaurant-info">
                <div class="restaurant-description padding-right animate-left">
                    <div class="global-headline">
                        <h1 class=" headline headline-dark" style="letter-spacing:-1px">Fresh Milk  Tees in stock</h1>
                    </div>
                    <p style="text-transform:uppercase" style="font-weight: 800">
                        We have Fresh Milk Tees available
                    </p>
                    <a href="merchandise.php" class="btn body-btn" style="font-weight: 800">Order now</a>
                </div>
                <div class="image-group">
                    <img class="animate-top" src="images/delight-group-1.jpg" alt="">
                    <img class="animate-bottom" src="images/delight-group-2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
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