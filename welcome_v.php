<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Sistem Aplikasi - Improvement Planning</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <link rel='stylesheet prefetch' href='css/opensans.css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.css">

        <style>
            .cont {
                position: relative;
                height: 100%;
                background-image: url("<?php echo base_url(); ?>dist/img/background2.jpg");
                background-size: cover;
                overflow: auto;
                font-family: "Open Sans", Helvetica, Arial, sans-serif;
            }

            .login__submit {
                position: relative;
                width: 100%;
                height: 4rem;
                margin: 5rem 0 2.2rem;
                color: rgba(255, 255, 255, 0.8);
                background: #3597E0;
                font-size: 1.5rem;
                border-radius: 3rem;
                cursor: pointer;
                overflow: hidden;
                -webkit-transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
                transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
            }
        </style>

    </head>

    <body>
        <div class="cont">
            <div class="demo">
                <div class="login">
                    <div class="col-md-12">
                        <div class="row u-margin-bottom-20px" >
                            <div class="col-xs-12 text-center" style="margin-top: 5%;">
                                <img style="margin: 0 auto;" class="img-responsive" src="<?php echo base_url(); ?>dist/img/logoLogin.png"><br>
<!--                                <h2><span style="font-weight: bold; color: white;">SISTEM APLIKASI</span></h2>
                                <h4><span style="color: white;">IMPROVEMENT </span><span style="color: #3597E0;">PLANNING</span></h4>-->
                            </div>
                        </div>
                    </div>
                    <form method="post" action="<?php echo base_url(); ?>index.php/Welcome/pengecekan">
                        <div class="login__form">
                            <div class="login__row">
                                <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                                </svg>
                                <input name="username" type="text" class="login__input name" placeholder="Username"/>
                            </div>
                            <div class="login__row">
                                <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                                </svg>
                                <input name="password" type="password" class="login__input pass" placeholder="Password"/>
                            </div>
                            <button type="submit" class="login__submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src='<?php echo base_url(); ?>dist/js/jquery.min.js'></script>
        <script src="<?php echo base_url(); ?>dist/js/index.js"></script>
    </body>
</html>
