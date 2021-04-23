<?php
require_once "autoloader.php";
class LoginViews {
    function login($nameErr_L, $passwordErr_L){

       return '<form method="post">
<input class="btn_L" type="submit" name="btnLogin" value="ZALOGUJ">
<input class="input_L" type="text" autocomplete="off" name="loginName" placeholder="Nazwa użytkownika">
<input class="input_H" type="password" name="loginPassword" placeholder="Hasło">
' . $nameErr_L . '
' . $passwordErr_L . '
<input class="btn_F" type="submit" name="btnForget" value="PRZYPOMNIJ HASŁO">    
</form>
';
    }
}