<!DOCTYPE html >
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php echo $style; ?>
    <?php echo $script; ?>
</head>

<body style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <?php echo $navbar; ?>
    <div class="container" >
        <div class="row align-items-center" style="height: 350px;">
            <div class="col-sm-6" style="background:rgba(254, 37, 37, 0.86) ;">
                <form action="<?php echo base_url("index.php/Login/validate") ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" required placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button> <br> <br>
                    <?php if (isset($_GET['login'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Email atau Password salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php    } ?>
                </form>
            </div>
            <div class="col-sm-6" style="background-color:rgba(154, 253, 73, 0.83)">
            <br> <br>
                you dont have account?
                Register now. <br><br><br><br><br><br><br><br><br><br><br>
                <a href="<?php echo base_url("index.php/signup")?>"><button class="btn btn-primary">Register</button></a>
            </div>
        </div>
    </div>

    <?php echo $footer; ?>
</body>

</html>
