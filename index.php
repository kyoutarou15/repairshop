<?php
    include 'php/popout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ady Repair Shop</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>
</head>
<body>

    <?php popout_render(); ?>

    <div class="top_nav_bar">
        <img class="logo_image" src="res/logo.png">
        <a href="">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact Us</a>
    </div>

    <div id="login_panel" class="login_cover">
        <form action="login.php" method="post" class="login_panel">
            <input id="type_input" type="hidden" name="login">
            <img src="res/side_info_logo.png" alt="">
            <p id="login_ask_text" style="text-align: center;">Don't you have account?</p>
            <button type="button" id="switch_mode_btn" class="signup_btn" onclick="switch_mode()">Sign Up</button>
            <input class="input_box" name="username" type="text" id="username" placeholder="USERNAME">
            <input class="input_box" name="password" type="password" id="password" placeholder="PASSWORD">
            <input class="input_box" style="display: none;" name="firstname" type="text" id="firstname" placeholder="FIRST NAME">
            <input class="input_box" style="display: none;" name="lastname" type="text" id="lastname" placeholder="LAST NAME">
            <a id="forgot_btn" class="forgot_pass" href="">forgot password?</a>
            <button id="submit_btn" class="login_panel_btn" type="submit">LOGIN</button>
        </form>
        <div class="clsbttn"><a  href="index.php"><img  src="./res/Red-Close-Button-Transparent.png" alt="" height="30px" width="30px"></a></div>
    </div>

    <!-- Landing group -->
    <div class="view_group home_group">
        <div id="home" class="info_group">
            <div class="info_panel">
                <p class="logo_text">
                    ADY<br>
                    REPAIR<br>
                    SHOP<br>
                </p>

                <p>
                    ADY Aircon and Refrigiration Repair Shop<br>
                    is an emerging business in Zamboanga City.<br>
                    It mainly offers repairing and maintenance<br>
                    of refrigeration & aircon units. 
                </p>

                <a class="login_btn" onclick="document.getElementById('login_panel').style.display = 'flex'">Login</a>
            </div>
            <div class="logo_panel">
                <img class="info_img" src="res/side_info_logo.png">
            </div>
        </div>
    </div>

    <!-- Repair group -->
    <div class="view_group repair_group">
        <p id="services" class="txt_main">ADY Repair Shop</p>
        <p class="txt_sub">Aircon, Refrigirator, and All Appliances</p>
        <div class="hori_demo">
            <img class="rg_demo_img" src="res/r1.png">
            <img class="rg_demo_img" src="res/r2.png">
            <img class="rg_demo_img" src="res/r3.png">
        </div>

        <p class="txt_sub">Trouble Shooting Repair</p>
        <div class="hori_demo">
            <div class="rg_serv">
                <img class="rg_serv_img" src="res/air-conditioner.png">
                <p class="rg_serv_txt">Installing Car AC</p>
            </div>
            
            <div class="rg_serv">
                <img class="rg_serv_img" src="res/fan.png">
                <p class="rg_serv_txt">Electric Fans</p>
            </div>

            <div class="rg_serv">
                <img class="rg_serv_img" src="res/television.png">
                <p class="rg_serv_txt">Television LED</p>
            </div>

            <div class="rg_serv">
                <img class="rg_serv_img" src="res/microwave.png">
                <p class="rg_serv_txt">Microwave Oven</p>
            </div>
        </div>
    </div>

    <!-- About group -->
    <div class="view_group about_group">
        <p id="about" class="txt_main">About Us</p>
        <div class="ab_info">
            <div class="ab_info_sub">
                <img class="ab_info_logo" src="res/logo.png">
            </div>

            <div class="ab_info_sub">
                <p class="txt_main" style="text-align: left;">ADY Repair Shop</p>
                <p class="txt_sub" style="text-align: left;">
                    ADY Aircon and Refrigeration Repair Shop is<br>
                    an emerging business in Zamboanga City. It<br>
                    mainly offers repairing and maintenance<br>
                    of refrigeration & aircon units.<br>
                    <br>
                    We also accept electronic items like TV LCD<br>
                    & etc. Our store is located at Sto. Nino Village,<br>
                    Zamboanga, 7000, Zamboanga del Sur.<br>
                    We provide the best service for the customer's<br>
                    satisfaction and ensures their Customer's health<br>
                    and safety factors.
                </p>
            </div>
        </div>

        <div class="ab_info">
            <div class="ab_info_sub ab_info_sub_bel">
                <p class="txt_main">Mission</p>
                <p class="txt_sub">
                    We are highly passionate in our<br>
                    expertise to restore your life<br>
                    valued appliances at home and<br>
                    at work. By providing our customer<br>
                    a well satisfied workmanship and<br>
                    technical services we offered.
                </p>
            </div>

            <div class="ab_info_sub ab_info_sub_bel">
                <p class="txt_main">Vision</p>
                <p class="txt_sub">
                    Expertise satisfaction and<br>
                    Technician expertise through<br>
                    sharing of knowledges our key<br>
                    to Qualify workmanship.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact group -->
    <div class="view_group contact_group">
        <p id="contact" class="txt_main">Get in Touch</p>
        <img style="margin: auto;" src="res/map.png">
        <p class="txt_sub">Contact Details</p>

        <div class="cg_demo">
            <div class="cg_sub">
                <img class="cg_icon" src="res/mark.png">
                <div>
                    <b><p>Our Location</p></b>
                    <p>
                        Block 11, Lot 13<br>
                        Sto, Nino Village Putik<br>
                        Zamboanga City
                    </p>
                </div>
            </div>

            <div class="cg_sub">
                <img class="cg_icon" src="res/email.png">
                <div>
                    <b><p>Our Email</p></b>
                    <p>
                        adyairref@yahoo.com<br>
                        adyairref@google.com
                    </p>
                </div>
            </div>

            <div class="cg_sub">
                <img class="cg_icon" src="res/telephone.png">
                <div>
                    <b><p>Call Us</p></b>
                    <p>
                        Cellphone Number<br>
                        0975 934 3078<br>
                        Telephone number:<br>
                        993 - 2067, 993 - 2666
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>