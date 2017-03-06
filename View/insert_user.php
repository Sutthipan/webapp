<?php //admin_home.php
    if ($_SESSION['type'] == "admin") {
?>

<!doctype>
<html>
<head></head>
<body>

<form action='../Controller/home.php' method="post">
    <?php
    echo "<input type='submit' name='back' value='back'>
          <input type='hidden' name='type' value='admin'>";
    ?>
</form>

<form action="../Controller/home.php" method="post">
    <table border="1">
        <tr align="center" >
                <tr><td>Username</td>
                          <td><input type='text' name='username'> </input></td></tr>
                          <tr><td>Password</td>
                          <td><input type='text' name='password' > </input></td></tr>
                          <tr><td>Type</td>
                          <td>
                               <input type='radio' name='type' value='admin'>admin<br>
                               <input type='radio' name='type' value='user' checked>user<br>
                          </td>
                          <tr><td>Name</td>
                          <td><input type='text' name='name'> </input></td></tr>
                          <tr><td>Surname</td>
                          <td><input type='text' name='surname'> </input></td></tr>
                          <input type='hidden' name='id'> </input>

            <td colspan="2" align="center" ><input width="500px" type="submit" name='insert' value="insert"></td>
        </tr>
    </table>

</form>
</body>
</html>
<?php
    }
exit();
?>