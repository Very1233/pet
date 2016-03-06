<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>注册</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
         <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            <h1>注册</h1>
            <form action="reg.php" method="post">
                <input type="email" name="user_mail" class="mail" placeholder="用户名（注册邮箱）">
                <input type="password" name="user_password" class="password" placeholder="密码">  
                <input type="text" name="user_name" class="name" placeholder="昵称">  
                <input type="text" name="user_realname" class="realname" placeholder="真实姓名"> 
                <input type="text" name="user_gender" class="gender" placeholder="性别(填写男/女）">    
                <input type="tel" name="user_phone" class="phone" placeholder="手机号"> 
                <input type="text" name="user_qq" class="qq" placeholder="QQ号">   
               <input type="text" name="address" class="location" placeholder="地址">
             
              <button type="submit">提交</button>
                <div class="error"><span>+</span></div>
            </form>
          
		
        <!-- Javascript -->
         <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>

</html>


