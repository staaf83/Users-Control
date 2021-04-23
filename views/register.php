<?php
class Register extends User{
    function register() {
if(isset($_POST['btnRegister'])){
    /* Sprawdzanie poprawnosci emaila #################################################################################################*/
    $registerEmail = trim($_POST["registerEmail"]);                                                                                  /**/
    if(empty($registerEmail)){                                                                                                       /**/
        self::$emailErr_R = '<div class="iconPasswordErr" style="top: 38.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz E-mail</span></div>';                                                                        /**/
    }elseif(!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)){                                                                     /**/  
        self::$emailErr_R = '<div class="iconPasswordErr" style="top: 38.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Nieprawidłowy E-mail</span></div>';                                                                        /**/
    }else{     
        if(!empty($this->getUser('useremail','useremail', $registerEmail))){
            self::$nameErr_L = $this->getUser('useremail','useremail', $registerEmail);
            self::$emailErr_R = '<div class="iconPasswordErr" style="top: 38.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">E-mail już zajęty</span></div>';
        }                                                                                                                      /**/
                                                                                            /**/
                                                                               /**/
                                                                                                                                  /**/
    }                                                                                                                                /**/
    /* Sprawdzanie poprawnosci nazwy ##################################################################################################*/
    $registerName = trim($_POST["registerName"]);
    if(empty($registerName)){
        self::$nameErr_R = '<div class="iconPasswordErr" style="top: 44.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';
    }elseif(strlen($registerName) < 5){
        self::$nameErr_R = '<div class="iconPasswordErr" style="top: 44.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';
    }else{
        if(!empty($this->getUser('username','username', $registerName))){
            self::$nameErr_L = $this->getUser('useremail','useremail', $registerEmail);
            self::$nameErr_R = '<div class="iconPasswordErr" style="top: 44.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';
        }
      
      
           
      
    }
    /* Sprawdzanie poprawnosci hasla ##################################################################################################*/
    $registerPassword = trim($_POST["registerPassword"]);
    if(empty($registerPassword)){
        self::$passwordErr_R = '<div class="iconPasswordErr" style="top: 50.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';    
    }elseif(strlen($registerPassword) < 6){
        self::$passwordErr_R = '<div class="iconPasswordErr" style="top: 50.6vh"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';
    }
    /* Sprawdzanie poprawnosci potwierdzenia hasla ####################################################################################*/
    $registerConfirmPassword = trim($_POST["registerConfirmPassword"]);
    if(empty($registerConfirmPassword)){
        self::$confirmPasswordErr_R = '<div class="iconPasswordErr" style="top: 56.6vh;"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';    
    }elseif($registerConfirmPassword != $registerPassword){
        self::$confirmPasswordErr_R = '<div class="iconPasswordErr" style="top: 56.6vh;"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Wpisz hasło</span></div>';
    }
    /* Sprawdzanie potwierdzenia OWU ##################################################################################################*/
    if(empty($_POST["registerOwu"])){ 
        self::$owuErr_R = '<div class="iconPasswordErr" style="top: 62.4vh; left: 4.5vw;"><img src="../img/icons/icon_err.png"/><span style="left: -13vw;" class="tooltippassword">Zaakceptuj regulamin</span></div>';
    }
   
    /* Dodawanie do bazy users ########################################################################################################*/
    if(empty($emailErr_R) && empty($nameErr_R) && empty($passwordErr_R) && empty($confirmPasswordErr_R) && empty($owuErr_R)){
        
        $password = password_hash($registerPassword, PASSWORD_DEFAULT);
        $registerToken ='R' . bin2hex(random_bytes(50));
        $registerStatus = "P";
        $this->setUser('userstatus', $registerStatus);
        $this->setUser('useremail', $registerEmail);
        $this->setUser('username', $registerName);
        $this->setUser('password', $password);
        $this->setUser('token', $registerToken);
        

        
        //if($results == 1){
          //  sendVerificationEmail($registerEmail, $registerToken);
         //   $htmlLogin = '';
           // $html = '
      //      <div class="register">
      //        <p>Rejestracja przebiegła pomyślnie! <br> Link aktywacyjny został wysłany na E-mail podany podczas rejestracji</p>
      //        <a href="http://176.139.95.57/"><input class="btnRegister" type="button" value="Strona Główna"></a>
         //   </div>
       //     ';
        //}
    }
   
}

return $html = '
<form class="register" action="" method="post">
    <p>ZAŁÓŻ KONTO</p>
    <input class="input_R" autocomplete="off" style="top: 40vh;" type="text" name="registerEmail" placeholder="E-mail">
    ' . self::$emailErr_R . '
    <input class="input_R" autocomplete="off" style="top: 46vh;" type="text" name="registerName" placeholder="Nazwa użytkownika">
    ' . self::$nameErr_R . '
    <input class="input_R" type="password" style="top: 52vh;" name="registerPassword" placeholder="Hasło">
    ' . self::$passwordErr_R . '
    <input class="input_R" type="password" style="top: 58vh;" name="registerConfirmPassword" placeholder="Potwierdź hasło">
    ' . self::$confirmPasswordErr_R . '
    <input class="checkbox" type="checkbox" name="registerOwu">
    <label name="registerOwuLabel">Przeczytałem i akceptuję OWU oraz Oświadczenie o ochronie danych osobowych</label>
    ' . self::$owuErr_R .'
    <input class="btnRegister" type="submit" name="btnRegister" value="rejestracja">
</form>
';

    }
}