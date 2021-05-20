<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php echo $style?>
    <?php echo $script?>
</head>

<body>
    <?= $navbar?>
    <?= $footer?>
    <div class="container">
        <?php echo form_open('Signup/validate') ?>
            <div class="form-group">    
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter email" value="<?= set_value('email')?>">
                <?= form_error('email',"<div style='color: red;'>","</div>") ?>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" required name="password" class="form-control" placeholder="Password" value="<?= set_value('password')?>">
                <?= form_error('password',"<div style='color: red;'>","</div>") ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" required name="nama" class="form-control" placeholder="Nama Anda ..." value="<?= set_value('nama')?>">
                <?= form_error('nama',"<div style='color: red;'>","</div>") ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" required name="alamat" class="form-control" placeholder="Jl. semerbak raya ...." value="<?= set_value('alamat')?>">
                <?= form_error('alamat',"<div style='color: red;'>","</div>") ?>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telepon</label>
                <input type="text" required name="notelp" class="form-control" placeholder="0838721..." value="<?= set_value('notelp')?>">
                <?= form_error('notelp',"<div style='color: red;'>","</div>") ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
        <?php echo form_close() ?>
    </div>  
</body>

</html>