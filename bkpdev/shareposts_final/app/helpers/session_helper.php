<?php
  session_start();

  // Flash message helper
  // Chama 2 vezes a função
  // 1 no Controller EXAMPLE - flash('register_succes', 'You are now registered', alert alert-danger);
  // 2 no formulário DISPLAY IN VIEW - <?php echo flash('register_success');
  function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }

            if(!empty($_SESSION[$name. '_class'])){
                unset($_SESSION[$name. '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name. '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }//elseif
    }
  }

  function isLoggedIn(){
     if(isset($_SESSION['user_id'])){
         return true;
     } else {
         return false;
     }
    }
    