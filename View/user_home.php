<?php // user_home.php
    if ($_SESSION['type'] == "user") {
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head
    <p>Welcome <?= $_SESSION['username']?></p>
</head>
<body>

    <form action="../Controller/home.php" method="post">
        <input type="submit" name="logout" id="logout" value="logout">
    </form>
    <br>


    <form action="../Controller/home.php" method="post">
        <table border="1">
            <tr align="center" >
                <td>Username</td>
                <td>Password</td>
                <td>Name</td>
                <td>Surname</td>
                <td>Edit</td>
            </tr>
            <?php
            $res = get_user($_SESSION['username']);
            while ($user = $res->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>".$user['username']."</td>
                          <td>".$user['password']."</td>
                          <td>".$user['name']."</td>
                          <td>".$user['surname']."</td>
                          <td><input type='submit' name = 'edit' value = 'edit' />
                               <input type='hidden' name = 'username' value = '".$user['username']."'>
                          </td></tr>";
            }
            ?>
        </table>
    </form>

</body>
</html>
<?php
}
exit();
?>