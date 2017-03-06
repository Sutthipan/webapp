<?php

    require_once ('db_connect.inc.php');


    function login($user,$pass) {
        global $con;
        $q = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
        if ($res = $con->query($q)) {
            $u = $res->fetch(PDO::FETCH_ASSOC);
        }
        return $u;
    }

    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location:../index.php");
    }

    function get_users(){
        global $con;
        $sql = "SELECT * FROM user";
        $res = $con->query($sql);
        return $res;
    }

    function get_user($username){
        global $con;
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $res = $con->query($sql);
        return $res;
    }

    function update_user($usernameT,$password,$type,$name,$surname,$id){
        global $con;
        $ch = get_user($usernameT)->fetch(PDO::FETCH_ASSOC);
        if($ch && $ch['id'] != $id)
        {
            echo "<script>alert('Username repeat ! ')</script>";
        }
        else{
             $sql = "UPDATE user SET username  = '$usernameT', password = '$password',
                             type = '$type', name = '$name', surname = '$surname'
                         WHERE id = '$id'";
             $res = $con->exec($sql);
             return $res;
        }
    }

    function delete_user($username){
        global $con;
        $sql = "DELETE FROM user WHERE username = '$username'";
        $res=$con->exec($sql);
        return $res;
    }

    function add_user($username, $password, $type='user',$name,$surname){
        global $con;
        $sql = "INSERT INTO user( username, password , type , name , surname ) VALUES ('$username','$password','$type','$name','$surname')";
        $res = $con->exec($sql);
        return $res;
    }

?>