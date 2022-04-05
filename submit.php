<?php
    include 'php/dbsql.php';
    include 'php/popout.php';

    function pop_ret($msg, $loc = 'panel.php')
    {
        popout_set($msg);
        header('Location: ' . $loc);
        exit();
    }

    if (!array_key_exists('id', $_SESSION))
        pop_ret('Invalid submission session!', 'index.php');

    $db = new dbcon();
    $db->werr_connect('index.php');

    if (array_key_exists('appointment', $_POST))
    {
        try
        {
            $q_add_appn = $db->query('INSERT INTO appointments (user_id, name, email, date, payment_method, service_type) VALUES (?, ?, ?, ?, ?, ?)',
                $_SESSION['id'],
                $_POST['name'],
                $_POST['email'],
                date('Y-m-d H:i:s', strtotime($_POST['date'] . ' ' . $_POST['time'])),
                $_POST['payment_method'],
                $_POST['service_type']
            );
            pop_ret('Your appointment has been booked!');
        }
        catch (\Throwable $th) {
            pop_ret('Failed to book for an appointment! -> ' . $th);
        }
    }
    else if (array_key_exists('update_profile', $_POST))
    {
        try {
            $db->query('UPDATE users SET firstname=?, lastname=?, email=?, address=?, contactno=? WHERE id = ?',
                $_POST['prof_firstname'],
                $_POST['prof_lastname'],
                $_POST['prof_email'],
                $_POST['prof_address'],
                $_POST['prof_contactno'],
                $_SESSION['id']
            );

            $_SESSION['firstname'] = $_POST['prof_firstname'];
            $_SESSION['lastname']  = $_POST['prof_lastname'];
            $_SESSION['email']     = $_POST['prof_email'];
            $_SESSION['address']   = $_POST['prof_address'];
            $_SESSION['contactno'] = $_POST['prof_contactno'];
            $_SESSION['full_name'] = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];

            pop_ret('Profile has been updated!');
        } catch (\Throwable $th) {
            pop_ret('Failed to update your profile! -> ' . $th);
        }
    }
    else if (array_key_exists('staff', $_POST))
    {
        try
        {
            $q_add_appn = $db->query('INSERT INTO staff (id, staff_name, contact, email, password) VALUES (?, ?, ?, ?, ?)',
                $_SESSION['id'],
                $_POST['staff_name'],
                $_POST['contact'],
                $_POST['email'],
                $_POST['password']
            );
            pop_ret('Successfully Added!');
        }
        catch (\Throwable $th) {
            pop_ret('Failed to book for an appointment! -> ' . $th);
        }
    }


    pop_ret('ERROR: Invalid submission request!');
?>