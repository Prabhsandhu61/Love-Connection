<!DOCTYPE html>
<html>

<head>
    <title>Love Connection</title>
    <link rel="icon" type="image/png" href="images/icon.png" type="text/css" />
    <link rel="stylesheet" href="css/login-style.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css" />

<body>
    <?php
    include 'config.php';

    // die();


    if (isset($_POST['submit'])) {

        $result = $mysqli->query("select * from user where email='" . $_POST['email'] . "' && password='" . $_POST['password'] . "'");
        $row = $result->fetch_array(MYSQLI_BOTH);

        if ($row && sizeof($row) > 0) {
            $_SESSION['name'] = $row['firstName'] . ' ' . $row['lastName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uid'] = $row['uid'];
            unset($_POST['submit']);
            header("Location: " . $pathSite . 'index.php');
        } else { }


        //die();
    } else {
        if (isset($_SESSION['uid']) && isset($_SESSION['email'])) {
            header("Location: " . $pathSite . 'index.php');
        }
    }

    ?>
    <?php include 'views/header.php'; ?>

    <div class="aa">
        <h2>Login</h2>
        <form action="login.php" method="post">

            <input type="text" name="email" required placeholder="Please enter email..."><br><br>
            <input type="password" name="password" required placeholder="Please enter Password..."><br><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>


    <?php include 'views/footer.php'; ?>
</body>

</html>