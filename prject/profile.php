<!DOCTYPE html>
<html>

<head>
    <title>Love Connection</title>
    <link rel="icon" type="image/png" href="images/icon.png" type="text/css" />
    <link rel="stylesheet" href="css/login-style.css" type="text/css" />
    <link rel="stylesheet" href="css/profile.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css" />

<body>
    <?php
    include 'config.php';

    // die();


    if (isset($_SESSION['uid'])) {

        $result = $mysqli->query("select * from user where uid='" . $_SESSION['uid'] . "'");
        $row = $result->fetch_array(MYSQLI_BOTH);

        $viewType = "view";
        if (isset($_POST['openedit'])) {

            //echo("<script>alert('here 1')</script>");
            $viewType = "edit";
            unset($_POST['openedit']);
        } else if (isset($_POST['update'])) {
            //echo("<script>alert('here 2')</script>");
            $q = "update   user set firstName ='" . $_POST['fname'] . "', lastName='" . $_POST['lname'] . "', mobile='" . $_POST['phone'] . "', dob ='" . $_POST['dob'] . "', country='" . $_POST['country'] . "' where uid='" . $_SESSION['uid'] . "'";
            // print_r($q);
            $d = $mysqli->query($q);
            //  die();
            $result = $mysqli->query("select * from user where uid='" . $_SESSION['uid'] . "'");
            $row = $result->fetch_array(MYSQLI_BOTH);
            $_SESSION['name'] = $row['firstName'] . ' ' . $row['lastName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uid'] = $row['uid'];
            $viewType = "view";
            unset($_POST['update']);
        } else if (isset($_POST['updatephoto'])) {
            $uploadPath = getcwd();
            $num0 = (rand(10, 100));
            $num1 = date("Ymd");
            $num2 = (rand(100, 1000));
            $num3 = time();
            $randnum = $num0 . $num1 . $num2 . $num3;

            $file = $_FILES['photo']['tmp_name'];
            $fname = $_FILES['photo']['name'];
            $fname = $randnum . '.' . pathinfo($fname, PATHINFO_EXTENSION);
            rename($file, $uploadPath . '\images\\' . $fname);

            $q = "update   user set photo='" . $fname . "' where uid='" . $_SESSION['uid'] . "'";
            // print_r($q);
            $d = $mysqli->query($q);
            //  die();
            $result = $mysqli->query("select * from user where uid='" . $_SESSION['uid'] . "'");
            unset($_POST['updatephoto']);
        } else {
            // echo("<script>alert('here 3')</script>");
        }

        //die();
    } else {

        header("Location: " . $pathSite . 'login.php');
    }




    ?>
    <?php include 'views/header.php'; ?>
    <?php if ($viewType == 'view') : ?>

        <div class="aa">
            <h2>Profile</h2>
            <table>
                <tbody>
                    <tr>
                        <th>Profile Photo</th>
                        <td><img width="100" height="140" src="./images/<?php echo ($row['photo']); ?>">
                            <form action="profile.php" method="POST" enctype="multipart/form-data">

                                <input type="file" required class="form-control" id="" name="photo" placeholder="">
                                <input type="submit" name="updatephoto" value="Upload">
                            </form>
                        </td>

                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><?php echo ($row['firstName']); ?></td>
                    </tr>
                    <tr>
                        <th>Last Name</th>
                        <td><?php echo ($row['lastName']); ?></td>
                    </tr>
                    <tr>
                        <th>Date Of Birth</th>
                        <td><?php echo ($row['dob']); ?></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td><?php echo ($row['mobile']); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo ($row['email']); ?></td>
                    </tr>



                </tbody>
            </table>

            <form action="profile.php" method="post">
                <input type="submit" name="openedit" value="Edit">
            </form>



        </div>

    <?php elseif ($viewType == 'edit') : ?>


        <div class="aa">
            <h2>Profile</h2>
            <form action="profile.php" method="post">
                <table align="center" cellpadding="10" class="bordered">

                    <tr>
                        <form>
                            <div class="col-sm-10">
                                <label for="First Name">
                                    <td>First Name
                                </label>
                                <td>
                                    <input type="text" class="form-control" id="firstname" name="fname" value="<?php echo ($row['firstName']); ?>" placeholder="First Name">
                            </div>
                    </tr>
                    <tr>
                        <div class="col-sm-10">
                            <label for="Last Name">
                                <td>Last Name&nbsp
                            </label>
                            <td>
                                <input type="text" class="form-control" id="lastname" name="lname" value="<?php echo ($row['lastName']); ?>" placeholder="Last Name">
                        </div>
                    </tr>
                    <tr>

                        <div class="col-sm-10">
                            <label for="Last Name">
                                <td>Date Of Birth
                            </label>
                            <td>
                                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo ($row['dob']); ?>" placeholder="Date of Birth">
                        </div>
                    </tr>


                    <tr>

                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Contact
                            </label>
                            <td>
                                <input type="text" class="form-control" id="phone" value="<?php echo ($row['mobile']); ?>" name="phone" placeholder="10-Digit number">
                        </div>
                    </tr>

                    <tr>

                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Country<label>
                                <td>
                                    <input type="text" class="form-control" id="country" value="<?php echo ($row['country']); ?>" name="country" placeholder="India">
                        </div>
                    </tr>
                </table>

                <input type="submit" name="update" value="Update">
            </form>




        </div>
    <?php endif; ?>


    <?php include 'views/footer.php'; ?>

</body>

</html>