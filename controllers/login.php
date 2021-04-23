<?php
require_once "autoloader.php";
class Login extends User{
    
    function login(){
        if(isset($_POST['btnLogin'])){
            $loginName = trim($_POST["loginName"]);
            if(empty($loginName)){
                $nameErr_L = '<div class="iconLoginErr"><img src="../img/icons/icon_err.png"/><span class="tooltiplogin">Wpisz login</span></div>';
            }elseif(strlen($loginName) < 5){
                $nameErr_L = '<div class="iconLoginErr"><img src="../img/icons/icon_err.png"/><span class="tooltiplogin">za krotki login</span></div>';
            }elseif(!empty($this->getUser('username','username', $loginName))){
                $nameErr_L = $this->getUser('username','username', $loginName);
            }
            $loginPassword = trim($_POST["loginPassword"]);
            if(empty($loginPassword)){
                $passwordErr_L = '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">Wpisz hasło</span></div>';
            }elseif(strlen($loginPassword) < 6){
                $passwordErr_L = '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">za krotkie hasło</span></div>';
            }
   
  /*  if(empty($nameErr_L) && empty($passwordErr_L)){
        $sqll = "SELECT * FROM users WHERE username = '$loginName'";
        $results = mysqli_query($link, $sqll);
        if(mysqli_num_rows($results) > 0){                 
            $row = mysqli_fetch_assoc($results);
            if(password_verify($loginPassword, $row["password"])){
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["userstatus"] = $row["userstatus"];
                $_SESSION["useremail"] = $row["useremail"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["usercharacter"] = $row["usercharacter"];
                $_SESSION['userlocation'] = $row["userlocation"];
                header("location: /");
            }else{
                self::$passwordErr_L = '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">Nieprawidłowe hasło</span></div>';
            }      
        }
    } */
   
}
$log =new LoginViews();
return $log->login(@$nameErr_L, @$passwordErr_L);
    }
}