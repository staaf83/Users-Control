<?php
require_once "autoloader.php";
class User{
    public static $emailErr_R='';
    public static $nameErr_R='';
    public static $passwordErr_R='';
    public static $confirmPasswordErr_R='';
    public static $owuErr_R='';
    
    public function setUser($row, $value){
        $config = new Config();
        
        $sql = "INSERT INTO users ($row) VALUES (?)";
        if($stmt = $config->conn->prepare($sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_user);
            $param_user = $value;
            mysqli_stmt_execute($stmt);
            echo $param_user;
        }else{
            echo "Error: " . $sql . "<br>" . $config->conn->prepare($sql)->error;
        }
    }
    
    
    public function getUser($row, $condition, $value){
        $config = new Config();
        $sql = "SELECT $row FROM users WHERE $condition=?";
        if($stmt = $config->conn->prepare($sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_user);
            $param_user = $value;
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $username);
                    if(mysqli_stmt_fetch($stmt)){
                        
                        $_SESSION["username"] = $username;                            
                    }else{
                        $nameErr_L= '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">rrrrr</span></div>';
                    }
                }else{
                    $nameErr_L= '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">No account found with that username</span></div>';
                }
            }else{
                $nameErr_L = '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">Oops! Something went wrong. Please try again later</span></div>';
            }
            mysqli_stmt_close($stmt);
        }else{
            $nameErr_L = '<div class="iconPasswordErr"><img src="../img/icons/icon_err.png"/><span class="tooltippassword">Oops! Something went wrong. Please try again laterr</span></div>';
        }
        return @$nameErr_L;
    }
}