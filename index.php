<?php
    session_start();
    if(isset($_SESSION['type']) == 'admin' || isset($_SESSION['type']) == 'user'){
        if($_SESSION['type'] == 'admin') {
            $_SESSION['check'] = 'admin';
        }
        else if(isset($_SESSION['type']) == 'user') {
            $_SESSION['check'] = 'user';
        }
        header('location:../MVC/Controller/home.php');
    }
    else {
        ?>

        <!doctype html>
        <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="Decorate.css">
        </head>

        <body>

        <form name="form1" method="post" action="Controller/home.php">
            <table border="0" align="center">
                <tr height="250px" colspan="2">
                </tr>
                <tr>
                    <td> &nbsp;Username</td>
                    <td>
                        <input name="textUsername" type="text" id="txtUsername">
                    </td>
                </tr>
                <tr>
                    <td> &nbsp;Password</td>
                    <td><input name="textPassword" type="password" id="txtPassword"></td>
                </tr>
                <tr>
                    <td height="30px"></td>
                    <td><input type="submit" id="login" name="login" value="login" style="width: 100px"/></td>
                </tr>
            </table>
        </form>


        </body>
        </html>
        <?php
    }
exit();
?>
<?php show_source("index.php"); ?>
