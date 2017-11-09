<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class UsersView
  {
      public function render($data)
      {
          require_once dirname(__FILE__).'/../templates/users/user.php';
      }
  }
