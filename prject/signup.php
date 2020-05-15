<!DOCTYPE html>
<html>
<head>
<title>Love Connection</title>
    <link rel="icon" type="image/png" href="images/icon.png" type="text/css"/>
<link rel="stylesheet" href="css/register-style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css"/>
<body>
<?php
include 'config.php';
$err=[];

if(isset( $_POST['submit'])){



    
    $result=$mysqli->query("select * from user where email='".$_POST['email']."'");
    $row = $result->fetch_array(MYSQLI_BOTH);
    $row_cnt = $result->num_rows;
    
  

    if($row_cnt==0){
        $uploadPath=getcwd(); 
        $num0 = (rand(10,100));
            $num1 = date("Ymd");
            $num2 = (rand(100,1000));
            $num3 = time();
            $randnum = $num0 . $num1 . $num2 . $num3;
        
            $file = $_FILES['photo']['tmp_name'];
            $fname=$_FILES['photo']['name'];
            $fname=$randnum.'.'.pathinfo($fname, PATHINFO_EXTENSION);
            rename($file, $uploadPath.'\images\\'.$fname);
        
        $q="insert into   user ( firstName, lastName, mobile, email, dob, password,gender,country,photo) values  ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['dob']."','".$_POST['password']."','".$_POST['gender']."','".$_POST['country']."','".$fname."')";
        $d=$mysqli->query($q);
        $result=$mysqli->query("select * from user where email='".$_POST['email']."'");
        $row = $result->fetch_array(MYSQLI_BOTH);
        $_SESSION['name']=$_POST['fname'].' '.$_POST['lname'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['uid']=$row['uid'];
        header( "Location: ".$pathSite.'index.php' );

      
    }else{
       array_push($err,'Email already Exist');
       // windon.location.href=""
    }

    //die();
}
?>


<?php include 'views/header.php';?>
    <head>
        <title>Registration Form</title>
    </head>

    <body>
        <div class="register">
            <h1>REGISTRATION FORM</h1>
        </div>
        <div class="table_container">
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <table align="center" cellpadding="10" class="bordered">

                <tr>
                    <form >
                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>First Name
                            </label>
                            <td>
                                <input type="text" required class="form-control" id="firstname" name="fname" placeholder="First Name">
                        </div>
                </tr>
                <tr>
                    <div class="col-sm-10">
                        <label for="Last Name">
                            <td>Last Name&nbsp
                        </label>
                        <td>
                            <input type="text" required class="form-control" id="lastname" name="lname" placeholder="Last Name">
                    </div>
                </tr>
                <tr>
                    <div class="col-sm-10">
                        <label for="Last Name">
                            <td>Profile Photo
                        </label>
                        <td>
                            <input type="file" required class="form-control" id="" name="photo" placeholder="">
                    </div>
                </tr>
                <tr>

                    <div class="col-sm-10">
                        <label for="Last Name">
                            <td>Date Of Birth
                        </label>
                        <td>
                            <input type="date" required class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                    </div>
                </tr>
                <tr>
                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Email ID
                            </label>
                            <td>
                                <input type="text" required class="form-control" id="email" name="email" placeholder="Enter you e-mail">
                        </div>
                </tr>
                <tr>
                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Password
                            </label>
                            <td>
                                <input type="password" required class="form-control" id="password" name="password" minlength="6" placeholder="password">
                        </div>
                </tr>
                <tr>
                    
                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Contact
                            </label>
                            <td>
                                <input type="text" required class="form-control" id="phone" name="phone" placeholder="10-Digit number">
                        </div>
                </tr>
                <tr>
                    <label for="Gender">
                        <td>Gender
                    </label>
                    <td>
                        <input type="radio" name="gender" checked id="male" value="male">
                        <label for="female">Male</label>
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="male">Female</label><br></td>
                </tr>





                <tr>
                   
                        <div class="col-sm-10">
                            <label for="First Name">
                                <td>Country<label>
                                <td>
                                    <input type="text" required class="form-control" id="country" name="country" placeholder="India">
                        </div>
                </tr>
                <tr>
                    <div class="col-sm-10">
                        <td>

                            <input type="checkbox" required>
                        </td>
                        <td>
                            <label for="terms">I agree <a href="#">Terms & Conditions</a> to proceed</label>
                        </td>
                    </div>

                </tr>

            </table>
        </div>
        <div class="proceed_container">
            <input type="submit" name="submit" value="Submit">
        </div>
      
<?php include 'views/footer.php';?>
</body>
</html>