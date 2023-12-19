<!DOCTYPE html>
<html lang="">
<body>
    <form action="logincontroller.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Login">
    </form>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>