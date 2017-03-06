<?php //admin_home.php
    if ($_SESSION['type'] == "admin" || $_SESSION['type'] == "user" ) {
        $type = $_SESSION['type'];
?>

<!doctype>
<html>
<head></head>
<body>

<form action='../Controller/home.php' method="post">
    <?php
        echo "<input type='submit' name='back' value='back'>
             <input type='hidden' name='type' value='".$type."'>"
    ?>
</form>

    <form action="../Controller/home.php" method="post">
        <table border="1">
            <tr align="center" >

            <?php
                $res =  get_user($_POST['username']);
                while($user = $res->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>Username</td>
                          <td><input type='text' name='username' value='".$user['username']."'> </input></td></tr>
                          <tr><td>Password</td>
                          <td><input type='text' name='password' value='".$user['password']."'> </input></td></tr>";

                           if($_SESSION['type'] == 'admin'){
                              echo "<tr><td>Type</td>";
                              if($user['type'] == 'user'){
                                 echo "<td><input type='radio' name='type' value='user' checked>user<br>
                                  <input type='radio' name='type' value='admin'>admin<br></td>";
                              }
                              else{
                                  echo "<td><input type='radio' name='type' value='user' >user<br>
                                  <input type='radio' name='type' value='admin' checked>admin<br></td>";
                              }
                           }else{
                              echo  "<input type='hidden' name='type' value='user'>";
                           }

                    echo "<tr><td>Name</td>
                          <td><input type='text' name='name' value='".$user['name']."'> </input></td></tr>
                          <tr><td>Surname</td>
                          <td><input type='text' name='surname'  value='".$user['surname']."'> </input></td></tr>
                          <input type='hidden' name='id'  value='".$user['id']."'> </input>
                          <input type='hidden' name='typeAU'  value='".$type."'> </input>";
                }
            ?>
                <td colspan="2" align="center" ><input width="500px" type="submit" name='save' value="save"></td>
            </tr>
        </table>

    </form>
</body>
</html>
<?php
    }
exit();
?>