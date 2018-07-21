<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RMP / Login</title>
        
        <!-- Vendor CSS -->
        <link href="/assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="/assets//vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="/assets/css/app.min.1.css" rel="stylesheet">
        <link href="/assets/css/app.min.2.css" rel="stylesheet">
    </head>
    
    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
            <div class="row text-center">
                <img src="/assets/img/logo.png"/>
            </div>
            <form id='login' action='<?php echo base_url("welcome/login") ?>' method='post' accept-charset='UTF-8' class="m-t-20">
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" class="form-control"  placeholder="Username" name='username' id='username'  maxlength="50" required>
                </div>
            </div>
            
            <div class="input-group m-b-20">
                <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
                <div class="fg-line">
                    <input type="password" class="form-control" name='password' id='password' maxlength="50" placeholder="Password" required>
                </div>
            </div>
                <div class="clearfix"></div>
            <div class="row m-l-0 m-r-0 text-center m-t-30 login-btn">
                <button  class="btn btn-login btn-primary btn-lg btn-block"> Login &nbsp;&nbsp;<i class="zmdi zmdi-arrow-forward"></i></button>
            </div>
             </form>
        </div>
        
        <!-- Javascript Libraries -->
        <script src="/assets/vendors/bower_components/jquery/dist/jquery.js"></script>
        <script src="/assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <script src="/assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
        
        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]>
            <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
        <![endif]-->
        
        <script src="/assets/js/functions.js"></script>
        
    </body>
</html>