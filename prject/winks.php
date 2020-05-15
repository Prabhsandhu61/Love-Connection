

<!DOCTYPE html>
<html>
<head>
<title>Love Connection</title>
    <link rel="icon" type="image/png" href="images/icon.png" type="text/css"/>
<link rel="stylesheet" href="css/login-style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css"/>

<link rel="stylesheet" href="css/search.css" type="text/css"/>
<body>
<?php
include 'config.php';
   
   // die();
    

if(isset($_SESSION['uid'])){
   



//die();
}
else{
    
        header( "Location: ".$pathSite.'login.php' );
    
}




?>

<?php include 'views/header.php';?>

<div class="container">

<div class="aa">
<p>Winks Received</p>
</div>
<?php 

$result=$mysqli->query("update winks set isSeen=1 where touid=".$_SESSION['uid']);
$result=$mysqli->query("select receivedat, (select firstName from user where uid=fromid) fromuser from winks where touid=".$_SESSION['uid']." order by receivedat desc");
$row = $result->fetch_all();

echo(sizeof($row));
$count = 1;
foreach( $row as $r ) {

 
 echo(' 
 <div class="aa">
<h2><strong>'.$r['1'].' sent you Wink at '.$r['0'].' </strong></h2>
 
    
</div>
    '
    );
    $count++;
}
    ?>
        
</div>

<?php include 'views/footer.php';?>

    
</body>
</html>

