<?php
      session_start();

      // Flash message helper
      function flash($name = '', $message = '', $class = 'msg-flash'){
            if(!empty($name)){
                  if(!empty($message) && empty($_SESSION[$name])){
                        //unsetting the session
                        if(!empty($_SESSION[$name])){
                              unset($_SESSION[$name]);
                        }

                        if(!empty($_SESSION[$name . '_class'])){
                              unset($_SESSION[$name . '_class']);
                        }

                        //setting the session
                        $_SESSION[$name] = $message;
                        $_SESSION[$name . '_class'] = $class;
                  }
                  else if(empty($message) && !empty($_SESSION[$name])){
                        $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
                        echo '<div class="'.$class.'"id="'.$class.'">' . $_SESSION[$name] . '</div>';
                        unset($_SESSION[$name]);
                        unset($_SESSION[$name . '_class']);
                  }
                        
            }
      }
?>