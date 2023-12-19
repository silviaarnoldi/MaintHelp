<!DOCTYPE html>
<html lang="">
<body>
    <center><h1>Login</h1>
    <form action="logincontroller.php" method="post">
        <input type="text" name="username" placeholder="username"><br> <br>
        <input type="password" name="password" placeholder="password"><br> <br>
        <input type="submit" value="Login">
    </form></center>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>