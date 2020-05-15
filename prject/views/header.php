<?php 

if(isset($_SESSION['uid'])){
$result1=$mysqli->query("select count(*) c  from winks where touid=".$_SESSION['uid']." && isSeen=0 order by receivedat desc");
$row1 = $result1->fetch_array(MYSQLI_BOTH);
}
?>
<div id="nav" style="margin-bottom:2px;">
            <a href="#"><img src="images/logo1.png" id="logo"></img></a>
        
        
<ul class="main-nav">
  <li><a href="index.php">Home</a></li>
  <?php if(isset($_SESSION['uid']) && isset($_SESSION['email'])) :?>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="search.php">Search Partner</a></li>
  <?php endif?>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="aboutus.php">About Us</a></li>
  <?php if(isset($_SESSION['uid']) && isset($_SESSION['email'])) :?>
    
  <li><a href="winks.php" class="badge1" data-badge="<?php echo($row1['c']); ?>">Winks</a></li>
    <li style="float:right"><a class="active1" href="logout.php">Logout</a></li>
    <li style="float:right;text-transform: uppercase;"   ><a href="profile.php"><?php echo($_SESSION['name'])?></a></p>
  <?php else :?>
    <li style="float:right"><a class="active1" href="login.php">Login</a></li>
    <li style="float:right"><a class="active1" href="signup.php">SignUp</a></li>
  
  <?php endif?>
</ul>
</div>