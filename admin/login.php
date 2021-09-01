<?php 
include '../db_connection.php';
session_start();
if(!empty($_SESSION["userID"])){
  echo "<script>window.location = '".$siteURL."lobby.php';</script>";  
}
if(isset($_POST['sign_in__button']))
{
    $sign_in_password = $_POST['sign_in_password'];
    $encript_password = md5($sign_in_password);
    $get_sql = "SELECT * FROM user where Password ='".$encript_password ."'  ";
    $result = $conn->query($get_sql);
    $row = $result->fetch_assoc();    
    if(!empty($row)){
        $_SESSION["userID"] = $row['userID'];
        $_SESSION["userName"] = $row['userName'];
        $_SESSION["userType"] = $row['userType'];
        if($row['userType'] == "customer")
        {
            echo "<script>window.location = '".$siteURL."admin';</script>";
	    }
	    else
	    {
	         echo "<script>window.location = '".$siteURL."lobby.php';</script>";
	    }
    }else{
        $sign_in_error = "Error: Incorrect Password PLease try again!";
    }
}?>

<?php
$site_sql = "SELECT site_logo,help_link,site_title FROM lobby  ";
$get_site_logo = $conn->query($site_sql);
$row_site_logo = $get_site_logo->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?php echo $row_site_logo['site_title']; ?></title>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link href="../assets/css/style.css" rel="stylesheet">
  	<link href="../assets/css/responsive.css" rel="stylesheet">

   	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>

</head>
<body>
<style>
.slick-track {
    width: 1026px !important;
}
.slick-slide.slick-current.slick-active {
    width: 1026px !important;
}	
</style>

<div class="login">
	<div class="login_left_content">
		<div class="login_header">
			<a href="<?php echo $siteURL;?>"><img src="<?php echo $row_site_logo['site_logo']; ?>"></a>
		</div>
		<div class="form_body">
			<form class="login_form <?php if(empty($sign_up_error)){echo 'active';} ?> " action="" method="POST">
				<h1>Enter Password</h1>
                <span style="color: red;"><?php if(!empty($sign_in_error)){echo $sign_in_error;} ?></span>
                <span style="color: #4be84b;"><?php if(!empty($sign_up_sucess)){echo $sign_up_sucess;} ?></span>
				<div class="form-group sign_in_email">
				  <label></label>
				  <div class="input_field">
					  <span class="input-group-icon"><img src="../assets/images/icone_mail.png"></span>
					<input type="email" name="sign_in_email" placeholder="Enter your email" class="form-control">
				  </div>
				</div>
				<div class="form-group mb_0">
					<label></label>
					<div class="input_field">
						<span class="input-group-icon"><img src="../assets/images/Icone_padlock.png"></span>
						<input type="password" name="sign_in_password" placeholder="Enter your Password" class="form-control">
					</div>
				</div>
				<div class="form-group">
                    <input type="submit" name="sign_in__button" value="Sign In" class="custom_btn form-control">
				    <!--<a href="lobby.html" class="custom_btn form-control">Sign in</a>-->
				</div> 
			</form>

			
		</div> 
	</div>

	<div class="login_slider">
		<div>
			<img src="../assets/images/Slideshow_image_1.jpg">
		</div>
		<!--<div>
			<img src="../assets/images/Slideshow_image_2.jpg">
		</div>-->
	</div>

	<!-- <div class="chat_box_icon">
		<img src="assets/images/icone_chatbot.png">
	</div> -->

	<div class="icon-help">
        <a href="<?php if(isset($row_site_logo['help_link'])){echo $row_site_logo['help_link']; } ?>" target="_blank"><img src="../assets/images/icone_chatbot.png"></a>
    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script type="text/javascript">
 $(document).ready(function(){
  	$('.login_slider').slick({
	    dots: true,
	    infinite: true,
	    speed: 1000,
	    autoplay: true,
	    autoplaySpeed: 5000,
	    arrows: true
  	});
});	
</script>

</body>
</html>