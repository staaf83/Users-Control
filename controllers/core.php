<?php
require_once "autoloader.php";
class Core{
    public function checkStatus(){
        session_start();
        switch (isset($_SESSION['userstatus'])){
            case "A":
                break;
            case "P":
                $frame = '<p class="window">Musisz aktywowac konto!<br>
                Link aktywacyjny został wysłany na E-mail podany podczas rejestracji.</p>';
                $_SESSION = array();
                session_destroy();
                break;
            case "B":
                $frame = '<p class="window">Zostales zbanowany!<br>
                Jesli masz jakies pytania skontaktuj sie z administracja.</p>';
                break;
            case "R":
                header("location: /");
                break;
            default:
                $_SESSION = array();
                session_destroy();
                $web = new Web();
                $web->web();
        }
    }
}