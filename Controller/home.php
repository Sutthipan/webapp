<?php
    require_once('../Model/db_user.inc.php');
    session_start();


     if(isset($_POST['login'])){
        if (isset($_POST['textUsername']) && $_POST['textUsername'] != "" && isset($_POST['textPassword']) && $_POST['textPassword'] != "")
        {
            $username = $_POST['textUsername'];
            $pass = $_POST['textPassword'];
            $user = login($username,$pass); // เรียกฟังก์ชั่นใน db_users.inc.php

            if (isset($user) && !empty($user)) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['type'] = $user['type'];
                if ($_SESSION['type'] == 'admin') {
                    include('../View/admin_home.php');
                }
                else {
                    include('../View/user_home.php');
                }
            } else {
                echo "<script>alert('Username or Password Incorrect ! ')</script>;
                      <script>window.location.href='../index.php'</script>";
            }
        } else {
            echo "<script>alert('Username or Password Incorrect ! ')</script>;
                  <script>window.location.href='../index.php'</script>";
        }
    }
    else if(isset($_POST['logout'])){
        logout();
    }
    else if(isset($_POST['delete'])){
        delete_user($_POST['username']);
        include('../View/admin_home.php');
    }

    else if(isset($_POST['edit'])){
        include('../View/edit_user.php');
    }

    else if(isset($_POST['back'])){
       // echo $_POST['type'];
        if ($_POST['type']== 'admin'){
            include('../View/admin_home.php');
        }
        else{
            include('../View/user_home.php');
        }
    }

    else if(isset($_POST['save'])){
       $ch = update_user($_POST['username'],$_POST['password'],$_POST['type'],$_POST['name'],$_POST['surname'],$_POST['id']);
            if ($_POST['typeAU']== 'admin'){
                include('../View/admin_home.php');
            }
            else{
                include('../View/user_home.php');
            }

    }

    else  if(isset($_POST['Insert'])){
        include('../View/insert_user.php');
    }

    else  if(isset($_POST['insert'])){
        add_user($_POST['username'],$_POST['password'],$_POST['type'],$_POST['name'],$_POST['surname']);
        include('../View/admin_home.php');
    }

    else {
        if ($_SESSION['check'] == 'admin') {
            include('../View/admin_home.php');
        } else if ($_SESSION['check'] == 'user') {
            include('../View/user_home.php');
        }
    }


?>

