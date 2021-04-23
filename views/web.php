<!DOCTYPE html>
<html>
    <head>
        <title>Snapdash</title>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English&display=swap" rel="stylesheet"> 
        <?php require_once "./css/web.php"; ?> 
    </head>
    <body>
        <?php
        class Web{
            public function web(){
                $login = new Login();
                echo $login->login();
                $login = new Register();
                echo $login->register();
            }
        } 
        ?>
    </body>
</html>