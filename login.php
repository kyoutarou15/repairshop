<?php
    include 'php/dbsql.php';
    include 'php/popout.php';

    function popup($msg)
    {
        popout_set($msg);
        header('Location: index.php');
        exit();
    }

    $db = new dbcon();
    $db->werr_connect('index.php');

    if (array_key_exists('login', $_POST))
    {
        $q_login = $db->query('SELECT * FROM users_processed WHERE username=? AND password=?', $_POST['username'], $_POST['password']);
        if (!$q_login || $q_login->rowCount() == 0)
            popup('Invalid username or password!');

        $q_login = $q_login->fetch();
        
        $_SESSION['id']         = $q_login['id'];
        $_SESSION['username']   = $q_login['username'];
        $_SESSION['full_name']  = $q_login['full_name'];
        $_SESSION['firstname']  = $q_login['firstname'];
        $_SESSION['type_name']  = $q_login['type_name'];
        $_SESSION['lastname']   = $q_login['lastname'];
        $_SESSION['email']      = $q_login['email'];
        $_SESSION['address']    = $q_login['address'];
        $_SESSION['contactno']  = $q_login['contactno'];

        header('Location: panel.php');
    }
    else if (array_key_exists('register', $_POST))
    {
        try {
            $q_type_user = $db->query('SELECT id FROM user_type WHERE name="Customer"')->fetch()['id'];
            $q_register = $db->query('INSERT INTO users (username, password, firstname, lastname, type, register_date) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)', $_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $q_type_user);
            popup('Successfuly registered!');
        } catch (\Throwable $th) {
            popup('Failed to register account!');
        }
    }
?>