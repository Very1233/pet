<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">

        <title>登录</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
         <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
         <!-- Javascript -->
         <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
    </head>

    <body>

        <div class="page-container">
            <h1>登录</h1>
            <form action="log.php" method="post">
                  <input type="email" name="user_mail" class="mail" placeholder="用户名（注册邮箱）">
                <input type="password" name="user_password" class="password" placeholder="密码"> 
                <button type="submit">提交</button>
                <div class="error"><span>+</span></div>
              
            </form>
		
       
    </body>

</html>


