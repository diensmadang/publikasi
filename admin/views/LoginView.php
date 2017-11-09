<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class LoginView
  {
      public function render($error = null)
      {
          require_once dirname(__FILE__).'/../templates/login/login.php';
      }
  }
