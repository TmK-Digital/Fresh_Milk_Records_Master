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

    <!-- Fresh Milk Product Area  -->

    <div class="product-container">

    
        <div class="grid-row">
            <div class="grid-item">

                <div class="grid-item-wrapper">
                    <div class="card">
                        <img src="images/slipmats.jpg">

                        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="GNDLF4BQ7LKWS">
                            <table>
                                <tr>
                                    <td><input type="hidden" name="on0" value="Fresh Milk Slipmats + Postage">
                                        <h3 style=" text-decoration: underline; color:black"> DJ Slipmats £15</h3>
                                                    
                                    </td>
                                    <br>
                                </tr>


                                <tr>

                                    <td style="padding-left: 40px; padding-right: 35px; padding-bottom: 35px; padding-top: 10px;"><select name="os0">
                                <option value="UK - Shipping">UK - Shipping £19 GBP</option>
                                <option value="EU - Shipping">EU - Shipping £26.49 GBP</option>
                                <option value="Worldwide - Shipping">Worldwide - Shipping £34.99 GBP</option>
                            </select> </td>
                                </tr>
                            </table>
                            <br>
                            <input type="hidden" name="currency_code" value="GBP">
                            <input type="image" src="images/addtocart.jpg" style="width: 100px; margin-right: 10px;" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                </div>
            </div>

            <div class="grid-item">

                <div class="grid-item-wrapper">
                    <div class="card">
                        <img src="images/box-shirt.jpg" style="width:100%">

                        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="ZMQLDGABD6KC6">
                            <table>
                                <tr>
                                    <td><input type="hidden" name="on0" value="Fresh Milk Box Logo T-shirt  + Postage">
                                        <h3 style="text-decoration:underline;margin-bottom: 10px; color:black ">Logo T-shirt £15                           </h3>
                             
                                </tr>
                                <tr>
                                    <td style="padding-left: 40px; padding-right: 30px;"><select name="os0">
                                <option value="UK - Shipping">UK - Shipping £19</option>
                                <option value="EU - Shipping">EU - Shipping £26.50 GBP</option>
                                <option value="Worldwide - Shipping">Worldwide - Shipping £35.00 GBP</option>
                            </select> </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:10px; padding-bottom: 10px;"><input type="hidden" name="on1" value="Size">Size</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px;"><select name="os1">
                                <option value="Small">Small </option>
                                <option value="Medium">Medium </option>
                                <option value="Large">Large </option>
                                <option value="XL">XL </option>
                            </select> </td>
                                </tr>
                            </table>
                            <input type="hidden" name="currency_code" value="GBP">
                            <input type="image" src="images/addtocart.jpg" style="width: 100px;" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                        </form>



                    </div>
                </div>
            </div>

            <div class="grid-item">

                <div class="grid-item-wrapper">
                    <div class="card">
                        <img src="images/crate-shirt.jpg" style="height:220px">

                        <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="8UV79FMGUS7WU">
                            <table>
                                <tr>
                                    <td><input type="hidden" name="on0" value="Fresh Milk Crate Logo T-shirt  + Postage">
                                        <h3 style="text-decoration:underline;margin-bottom: 15px; color:black"> Crate Logo T-shirt £15 </td>
                                   
                                </tr>
                                <tr>
                                    <td style="padding-left: 40px; padding-right: 30px;"><select name="os0">
                                <option value="UK - Shipping">UK - Shipping £19 GBP</option>
                                <option value="EU - Shipping">EU - Shipping £26.50 GBP</option>
                                <option value="Worldwide - Shipping">Worldwide - Shipping £35GBP</option>
                            </select> </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:10px; padding-bottom: 10px;"><input type="hidden" name="on1" value="Size">Size</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px;"><select name="os1">
                                <option value="Small">Small </option>
                                <option value="Medium">Medium </option>
                                <option value="Large">Large </option>
                                <option value="XL">XL </option>
                            </select> </td>
                                </tr>
                            </table>
                            <input type="hidden" name="currency_code" value="GBP">
                            <input type="image" src="images/addtocart.jpg" style="width: 100px;" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                        </form>


                    </div>
                </div>
            </div>

             
                     <div class="grid-item">

                <div class="grid-item-wrapper">
                    <div class="card">
                        <img src="images/blackshirt.jpg" style="width:100%; height:220px;>
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="HQHBD3WKBR6Q6">
<table>
      <tr>
                                    <td><input type="hidden" name="on0" value="">
                                        <h3 style="text-decoration:underline;margin-bottom: 13px; color:black"> Black  Crate Tee £15 </td>
                                       
                                </tr>
                                <tr>
                                    <td style="padding-left: 40px; padding-right: 30px;"><select name="os0">
                                <option value="UK - Shipping">UK - Shipping £19 GBP</option>
                                <option value="EU - Shipping">EU - Shipping £26.50 GBP</option>
                                <option value="Worldwide - Shipping">Worldwide - Shipping £35 GBP</option>
                            </select> </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:10px; padding-bottom: 10px;"><input type="hidden" name="on1" value="Size">Size</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px;"><select name="os1">
                                <option value="Small">Small </option>
                                <option value="Medium">Medium </option>
                                <option value="Large">Large </option>
                                <option value="XL">XL </option>
                            </select> </td>
                                </tr>
</table>
<input type="hidden" name="currency_code" value="GBP">
<input type="image" src="images/addtocart.jpg" style="width:100px" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>



                    </div>
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