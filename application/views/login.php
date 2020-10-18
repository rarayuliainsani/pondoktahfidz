<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Manajemen-TAZKIYAH</title>
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>/assets/images/logo.jpg" type="image/jpg" />

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background: url("<?php echo base_url('assets/images/mesjid3.jpg') ;?>");
            background-size: 50%;
            font-family: sans-serif;
        }

        .loginBox {
            position: absolute;
            top: 55%;
            left: 50%;
            width: 320px;
            height: 450px;
            transform: translate(-50%, -50%);
            width: 350px;
            padding: 80px 40px;
            /* height: 420px; */
            box-sizing: border-box;
            background: #FFE4C4;
            border-radius: 0.5em;
        }

        .user {
            width: 60px;
            height: 60px;
            /* border-radius: 50%; */
            overflow: hidden;
            position: absolute;
            top: calc(10px);
            left: calc(57% - 60px);
        }

        h2 {
            margin: 0;
            padding: 0 0 20px;
            color: #000000;
            text-align: center;
        }

        .loginBox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #000000;
        }

        .loginBox input {
            width: 100%;
            margin-bottom: 20px;
        }

        .loginBox input[type="text"],
        .loginBox input[type="password"] {
            border: none;
            border-bottom: 1px solid #000000;
            background: transparent;
            outline: none;
            height: 40px;
            color: #000000;
            font-size: 16px;
        }

        ::placeholder {
            color: rgb(0, 0, 0);
        }

        .loginBox input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            color: #944906;
            font-size: 16px;
            background: #C0C0C0;
            cursor: pointer;
            border-radius: 20px;
        }

        .loginBox input[type="submit"]:hover {
            background: #efed40;
            color: #262626;
        }
        .alertErr {
            opacity: 0.85;
        }
    </style>
</head>
<br><br><br>

<h2><font size ="5px" color='white'>Sistem Informasi Manajemen</font></h2>
<h2><font size ="5px" color='white'>Pondok Majelis Tazkiyah</font></h2>

 <br>
<body>

    <div class="loginBox">
        <img src="<?php echo base_url('assets/images/logo.jpg');?>"
            class="user">
        <h2>LOGIN</h2>
        <div class ="row">
        <?php echo $this->session->flashdata('sukses');?>
        <?php echo $this->session->flashdata('warning');?>
        </div>
        
        
        <?php  echo form_open('login')?>
        <p>Username</p><input type="text" name="username" placeholder="Your Username" autocomplete="False">
        <p>Password</p><input type="password" name="password" placeholder="Your Password">
        <input type="submit" name="login" value="Sign In">
        <?php echo form_close() ?>
        <!-- <span style="color: #ffffff">Don't have account?</span>
        <a
            href="<?php echo site_url('signup');?>">
            <span style="color: #efed40">&nbsp;<b>Sign Up</b></span>
        </a> -->

    </div>

    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>