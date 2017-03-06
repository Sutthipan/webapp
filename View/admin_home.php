<?php //admin_home.php
    if ($_SESSION['type'] == "admin") {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <p>Welcome <?= $_SESSION['username']?></p>
</head>
<body>

<table border="0">
    <tr>
        <form action="../Controller/home.php" method="post">
            <td><input type="submit" name="Insert" id="Insert" value="Insert"></td>
        </form>


        <form action="../Controller/home.php" method="post">
            <td><input type="submit" name="logout" id="logout" value="logout"></td>
        </form>
    </tr>
</table>
<br>

<table border="1">
    <tr align="center" >
        <td>Username</td>
        <td>Password</td>
        <td>Type</td>
        <td>Name</td>
        <td>Surname</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php

    $res = get_users();
    while($user = $res->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>".$user['username']."</td>
                      <td>".$user['password']."</td>
                      <td>".$user['type']."</td>
                      <td>".$user['name']."</td>
                      <td>".$user['surname']."</td>
                      <form action = '../Controller/home.php' method='post'> 
                        <td><input type='submit' name = 'edit' value = 'edit' />
                            <input type='hidden' name = 'username' value = '".$user['username']."'>
                      </form></td>
                      
                      <form action = '../Controller/home.php'  method= 'post'> 
                         <td> <input type='submit' name = 'delete' value = 'delete' />
                              <input type='hidden' name = 'username' value = '".$user['username']."'>
                      </form> </td>
                     </tr>";
    }

    ?>
</table>

</body>
</html>
<?php
}
exit();
?>