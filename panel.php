<?php
    include 'php/dbsql.php';
    include 'php/popout.php';

    if (!isset($_SESSION))
        session_start();

    $db = new dbcon();
    $db->werr_connect('index.php');

    if (!array_key_exists('id', $_SESSION))
    {
        popout_set('Invalid session!');
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/panel.css">
    <script src="js/panel.js"></script>
</head>
<body>
    <?php popout_render(); ?>
    <div class="panel_nav">
        <div class="nav_container">
            <div class="logo_nav">
                <img class="logo_img_nav" src="res/logo.png" alt="">
                <p class="logo_txt_nav">REPAIR SHOP</p>
            </div>

            <div id="nav_dashboard" onclick="handler_nav_click(this)" class="opt_nav nav_selected">
                <p class="opt_txt_nav">Dashboard</p>
            </div>

            <div id="nav_services" onclick="handler_nav_click(this)" class="opt_nav">
                <p class="opt_txt_nav">Services</p>
            </div>

            <div id="nav_history" onclick="handler_nav_click(this)" class="opt_nav">
                <p class="opt_txt_nav">History</p>
            </div>

            <div id="nav_profile" onclick="handler_nav_click(this)" class="opt_nav">
                <p class="opt_txt_nav">Profile</p>
            </div>

            <div id="nav_appointment" onclick="handler_nav_click(this)" class="opt_nav">
                <p class="opt_txt_nav">Appointment</p>
            </div>

            <div id="nav_logout" class="opt_nav" onclick="window.location.href = 'logout.php'">
                <p class="opt_txt_nav">Logout</p>
            </div>

        </div>
        <img class="panel_img" src="res/pic1.png" alt="">
    </div>
    
    <div class="panel_content">
        <p id="panel_indicator" class="panel_indicator">Dashboard</p>

        <div id="view_dashboard" class="panel_view">
            <div class="dash_greet">
                <p class="dash_greet_text">Hello, <?php echo $_SESSION['firstname'];?>!</p>
                <p class="dash_count_text">Today you have <?php
                    $q_today_appn = $db->query('SELECT * FROM appointments_processed WHERE DATEDIFF(CURRENT_TIMESTAMP, date) = 0');
                    echo $q_today_appn->rowCount();
                ?> new appointments</p>
            </div>

            <div class="dash_customers">
                <div class="dash_top_bar">
                    <p class="dash_customer_txt">Appointments Today</p>
                </div>
                <div class="dast_table_container">
                    <?php
                        if ($q_today_appn->rowCount())
                        {
                            echo '
                            <table class="dash_table">
                                <tr><td style="width: 8%;"></td><td><p style="font-weight: bold;">Name</p></td><td><p style="font-weight: bold;">Type</p></td></tr>
                            ';

                            foreach ($q_today_appn as $row)
                            {
                                echo '
                                    <tr>
                                        <td><img class="dash_cstm_img" src="res/user.png" alt=""></td>
                                        <td><p>' . $row['name'] . '</p></td>
                                        <td><p>' . $row['service_type_name'] . '</p></td>
                                    </tr>
                                ';
                            }

                            echo '
                                </table>
                            ';
                        }
                        else
                        {
                            echo '<p style="text-align: center;">No appointments today!</p>';
                        }
                    ?>
                </div>
            </div>

        </div>

        <div id="view_services" class="panel_view">
            <div class="srv_panel">
                <ul>
                    <?php
                        foreach ($db->query('SELECT * FROM service_types') as $row)
                            echo '<li>' . $row['name'] . '</li>';
                    ?>
                </ul>
            </div>
        </div>

        <div id="view_history" class="panel_view">
            <div class="hist_panel">
                <div class="hist_cont">
                    <?php
                        $q_history = "";
                        
                        if ($_SESSION['type_name'] == 'Administrator')
                            $q_history = $db->query('SELECT appointments_processed.*, users_processed.full_name AS "user_name" FROM appointments_processed INNER JOIN users_processed ON users_processed.id = appointments_processed.user_id ORDER BY submitted_on DESC');
                        else 
                            $q_history = $db->query('SELECT appointments_processed.*, users_processed.full_name AS "user_name" FROM appointments_processed INNER JOIN users_processed ON users_processed.id = appointments_processed.user_id WHERE appointments_processed.user_id=? ORDER BY submitted_on DESC', $_SESSION['id']);

                        if ($q_history->rowCount())
                        {
                            echo '
                                <table>
                                    <tr>
                                        <td>Submitted on</td>
                                        <td>Appointment on</td>
                                        <td>Submitted by</td>
                                        <td>Name</td>
                                        <td>Payment Method</td>
                                        <td>Service Type</td>
                                    </tr>
                            ';

                            foreach ($q_history as $row)
                            {
                                echo '
                                    <tr>
                                        <td>' . $row['submitted_on'] . '</td>
                                        <td>' . $row['date'] . '</td>
                                        <td>' . $row['user_name'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['payment_method_name'] . '</td>
                                        <td>' . $row['service_type_name'] . '</td>
                                    </tr>
                                ';
                            }

                            echo '
                                </table>
                            ';
                        }
                        else
                        {
                            echo '<p style="text-align: center;">No history on record.</p>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div id="view_profile" class="panel_view">
            <form action="submit.php" method="post" class="prof_cont">
                <input type="hidden" name="update_profile">
                <img class="prof_img" src="res/user.png" alt="">

                <div class="prof_fl_group">
                    <label class="prof_lbl" for="prof_firstname">Firstname: </label><input class="prof_inptxt" type="text" name="prof_firstname" id="prof_firstname" value="<?php echo $_SESSION['firstname'] ?>">
                    <label class="prof_lbl" for="prof_lastname">Lastname: </label><input class="prof_inptxt" type="text" name="prof_lastname" id="prof_lastname" value="<?php echo $_SESSION['lastname'] ?>">
                </div>

                <div class="prof_fl_group">
                    <label class="prof_lbl" for="prof_email">Email: </label><input class="prof_inptxt" type="text" name="prof_email" id="prof_email" value="<?php echo $_SESSION['email'] ?>">
                </div>

                <div class="prof_fl_group">
                    <label class="prof_lbl" for="prof_address">Address: </label><input class="prof_inptxt" type="text" name="prof_address" id="prof_address" value="<?php echo $_SESSION['address'] ?>">
                </div>

                <div class="prof_fl_group">
                    <label class="prof_lbl" for="prof_contactno">Contact No: </label><input class="prof_inptxt" type="text" name="prof_contactno" id="prof_contactno" value="<?php echo $_SESSION['contactno'] ?>">
                </div>

                <button class="prof_submit" type="submit">Update</button>
            </form>
        </div>

        <div id="view_appointment" class="panel_view">
            <form action="submit.php" method="post"  class="appn_panel">
                <input type="hidden" name="appointment">
                <div class="appn_panel_cont appn_left">
                    <p class="appn_txt">Personal Details</p>
                    <input class="appn_item appn_inp_box" type="text" name="name" placeholder="Enter your Name:">
                    <input class="appn_item appn_inp_box" type="text" name="email" placeholder="Email Address:">
                    <input class="appn_item appn_inp_box" type="date" name="date">
                    <input class="appn_item appn_inp_box" type="time" name="time">
                </div>
                
                <div class="appn_panel_cont appn_right">
                    <p class="appn_txt">Type of service</p>
                    <select class="appn_item appn_inp_box appn_drop" name="service_type" id="service_type">
                        <?php
                            $q_repair_mode = $db->query('SELECT * FROM service_types');
                            foreach ($q_repair_mode as $row)
                            {
                                echo '
                                    <option value="' . $row['id'] . '">' . $row['name'] . '</option>
                                ';
                            }
                        ?>
                    </select>

                    <p class="appn_txt">Mode of Payment</p>

                    <?php
                        $q_payment_mode = $db->query('SELECT * FROM payment_modes');
                        foreach ($q_payment_mode as $row)
                        {
                            echo '
                                <div class="appn_item">
                                    <input type="radio" name="payment_method" value="' . $row['id'] . '" id="mode' . $row['id'] . '" checked><label for="mode' . $row['id'] . '">' . $row['name'] . '</label><br>
                                </div>
                            ';
                        }
                    ?>

                    <button class="appn_submit" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="panel_sidebar">
        <div class="sb_profile">
            <p class="sb_profile_txt"><?php echo $_SESSION['full_name']; ?></p>
            <img class="sb_profile_img" src="res/user.png" alt="">
        </div>

        <div class="calendar_container sidebar_container">
            <div class="calen_g1">
                <p class="calen_text">Calendar</p>
                <p id="calen_display" class="calen_display">Some Month 0000</p>
            </div>

            <table id="calen_table" class="calen_table">
                <tr>
                    <td>Mo</td>
                    <td>Tu</td>
                    <td>We</td>
                    <td>Th</td>
                    <td>Fr</td>
                    <td>Sa</td>
                    <td>Su</td>
                </tr>
            </table>

        </div>

        <div class="info_container sidebar_container">
            <div class="info_g1">
                <img class="info_img" src="res/user.png" alt="">
                <div class="info_sub">
                    <p class="info_name"><?php echo $_SESSION['full_name']; ?></p>
                    <p class="info_type"><?php echo $_SESSION['type_name']; ?></p>
                </div>
            </div>

            <div class="info_contact_group">
                <button class="ic_btn icb_tele" type="button"></button>
                <button class="ic_btn icb_mail" type="button"></button>
                <button class="ic_btn icb_mesg" type="button"></button>
            </div>

            <hr width="80%">

        </div>

    </div>

</body>

<script>
    on_load();
</script>

</html>