
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="../css/uikit.min.css" />
          <script src="js/jquery-3.1.1.min.js"></script>
        <script src="../js/uikit.min.js"></script>
      
     </head>
    <body class="uk-height-1-1">

        <div class="uk-vertical-align uk-text-center uk-height-1-1">
            <div class="uk-vertical-align-middle" style="width: 250px;">
                <h1>เข้าสู่ระบบ</h1>
            
                <form class="uk-panel uk-panel-box uk-form" action="login.php" method="post">
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" name="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-button uk-button-primary uk-button-large"type="submit" value="Login"
                       
                    </div>
                    
                </form>
                <br>    <br>
                <a href="../index.php">กลับหน้าหลัก</a>

            </div>
        </div>

    </body>
</html>
