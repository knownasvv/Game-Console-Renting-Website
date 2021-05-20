<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php echo $style; ?>
    <?php echo $script; ?>
</head>

<body>
    <?php echo $navbar; ?>
    <div class="container" style="display: flex; align-items:center;">
        <div class="col-sm-6">
            <div class="row align-items-center">
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
        </div>
        <div class="col-sm-6">
            you dont have account?
            Register now. <br>
            <button class="btn btn-primary">Register</button>
        </div>
    </div>

    <?php echo $footer; ?>
</body>

</html>