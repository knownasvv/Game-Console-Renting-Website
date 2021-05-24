<!DOCTYPE html >
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <?= $loginStyle; ?>
</head>

<body style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/loginAssets/images/img-01.png')?>" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php echo base_url("index.php/Login/validate") ?>" method="POST">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="form-group">
                        <label> <?= $image ?></label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="captcha" class="form Control" placeholder="Enter Captcha Here">
                    </div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>


                    <?php if (isset($_GET['login'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                           <p> Email atau Password salah.</p>
                           
                        </div>
                    <?php    } ?>

                    <?php if (isset($_GET['captcha'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> 
                           <p> Captcha salah</p>
                           
                        </div>
                    <?php    } ?>


					<div class="text-center p-t-136">
                        <p class="txt3">Don't have an account yet? <br></p>
						<a class="txt2" href="<?php echo base_url("index.php/signup")?>">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
    <?= $loginScript;?>

</body>

</html>
