<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class SignupView
  {
      public function render($error = null)
      {
          require_once dirname(__FILE__).'/../templates/signup/signup.php';
      }
  }
