<?php
session_start();

// Flash message helper
function flash($name = '', $message = '', $class = 'alert'){
    if(!empty($name)){
        //No message, create it
        if(!empty($message) && empty($_SESSION[$name])){
            // if(!empty( $_SESSION[$name])){
            //     unset( $_SESSION[$name]);
            // }
            if(!empty( $_SESSION[$name.'_class'])){
                unset( $_SESSION[$name.'_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
        elseif(!empty($_SESSION[$name]) && empty($message)){
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.' alert-dismissible fade show'.'" id="msg-flash" role="alert">'.$_SESSION[$name].
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

// Create User Session
function createUserSession($user)
{
    $_SESSION['curID'] = $user->ID;
    $_SESSION['curUsername'] = $user->username;
    $_SESSION['curFullname'] = $user->fullname;
    $_SESSION['curEmail'] = $user->email;
}

function isLoggedIn()
{
    if(isset($_SESSION['curID']) && isset($_SESSION['curUsername']) && isset($_SESSION['curFullname'])) {
        return true;
    } else {
        return false;
    }
}

function removeSession()
{
    session_unset();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}