

<!DOCTYPE html>
<html>
<head>
<title>Love Connection</title>

<link rel="icon" type="image/png" href="images/icon.png" type="text/css"/>
<link rel="stylesheet" href="css/login-style.css" type="text/css"/>
<link rel="stylesheet" href="css/search.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" type="text/css"/>

<body>
<?php
include 'config.php';
   
   // die();
    

if(isset($_SESSION['uid'])){
   
print_r($_POST);
    if(isset($_POST['keyword'])){
        $result=$mysqli->query("select  *,(select count(*) from winks where fromid=".$_SESSION['uid']." and touid=uid) as isWink from user where uid !='".$_SESSION['uid']."' && (email like '%".$_POST['keyword']."%' or  firstName like '%".$_POST['keyword']."%' or lastName like '%".$_POST['keyword']."%') limit 20");
        $row = $result->fetch_all();
        unset($_POST['keyword']);
    }else if(isset($_POST['sendwink'])){
        print_r("insert into winks (touid,fromid) values(".$_POST['touid'].",".$_POST['fromid'].")");
        $result=$mysqli->query("insert into winks (touid,fromid) values(".$_POST['touid'].",".$_POST['fromid'].")");
       
        $result=$mysqli->query("select  * ,(select count(*) from winks where fromid=".$_SESSION['uid']." and touid=uid) as isWink from user where uid !='".$_SESSION['uid']."' limit 20");
        $row = $result->fetch_all();
        unset($_POST['sendwink']);
        unset($_POST['touid']);
        unset($_POST['fromid']);
    }
    else{
       // print_r("select  *,(select count(*) from wink where fromid=".$_SESSION['uid']." and touid=uid) as isWink from user  where uid !='".$_SESSION['uid']."' limit 20");
       
        $result=$mysqli->query("select  *,(select count(*) from winks where fromid=".$_SESSION['uid']." and touid=uid) as isWink from user  where uid !='".$_SESSION['uid']."' limit 20");
        $row = $result->fetch_all();
       // print_r($row);
       // die();
    }
   


//die();
}
else{
    
        header( "Location: ".$pathSite.'login.php' );
    
}




?>

<?php include 'views/header.php';?>

<div class="container">

<div class="aa">
<p>Search:
<form action="search.php" method="POST" >
            
            <input type="text" required class="form-control" id="" name="keyword" placeholder="enter name or email">
            <input type="submit" name="search" value="Search">
</form></p>
</div>
<?php 
echo(sizeof($row));
$count = 1;
foreach( $row as $r ) {

    $sendWink=' <form action="search.php" method="POST"> 
    <input type="hidden" name="touid" value="'.$r[0].'">
    <input type="hidden" name="fromid" value="'.$_SESSION['uid'].'">
    <input type="submit" name="sendwink" value="Send Wink"></form>';

$sentWink="<a class=\"btn\"  >Wink Sent </a>";
if($r['11']==0){
    $winkbtn=$sendWink;
}else{
    $winkbtn=$sentWink;
}
 echo(' 
 <div class="aa">
<h2></h2>
 <table >
<tbody>
       <tr>
            <td width="40" rowspan="5" colspan="2"><img width="100" height="140" src="./images/'.$r['4'].'"></td>
            <td> Name: </td>
            <td> '.$r['1'].' '.$r['2'].' </td>
        </tr>
        <tr>
        <td> Email: </td>
            <td> '.$r['6'].'  </td>
        </tr>
        <tr>
        <td> Date Of Birth: </td>
            <td> '.$r['7'].'  </td>
        </tr>
        <tr>
        <td> Mobile: </td>
            <td> '.$r['5'].' </td>
        </tr>
        <tr>
        <td>  </td>
        <td>'.$winkbtn.'  </td>
        </tr>
         
    </tbody>
    </table>

    
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

