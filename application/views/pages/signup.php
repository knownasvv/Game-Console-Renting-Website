<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?= $loginStyle ?>
</head>

<body style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <!-- <div class="form-group">    
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter email" value="<?= set_value('email') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" required name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" required name="nama" class="form-control" placeholder="Nama Anda ..." value="<?= set_value('nama') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" required name="alamat" class="form-control" placeholder="Jl. semerbak raya ...." value="<?= set_value('alamat') ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telepon</label>
                <input type="text" required name="notelp" class="form-control" placeholder="0838721..." value="<?= set_value('notelp') ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> -->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" >

                <div style="width:100%">
                    <span class="login100-form-title">
                        Register
                    </span>
                    <?php echo form_open('Signup/validate') ?>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" required placeholder="Email" value="<?= set_value('email') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                        <?= form_error('email', "<div style='color: red;'>", "</div>") ?>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" required name="password" placeholder="Password" value="<?= set_value('password') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                        <?= form_error('password', "<div style='color: red;'>", "</div>") ?>

                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" required name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-address-card-o" aria-hidden="true"></i>
                        </span>
                        <?= form_error('nama', "<div style='color: red;'>", "</div>") ?>

                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" required name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </span>
                        <?= form_error('alamat', "<div style='color: red;'>", "</div>") ?>

                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="number" required name="notelp" placeholder="Nomor Telepon" value="<?= set_value('notelp') ?>">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                        <?= form_error('notelp', "<div style='color: red;'>", "</div>") ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Submit
                        </button>
                    </div>


                    <div class="text-center p-t-136">
                        <p class="txt2">Have an account?
                        <a class="txt2" href="<?= base_url('index.php/login')?>">
                            Login.
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a> </p>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>
        </div>
    </div>


    <?= $loginScript ?>
</body>

</html>