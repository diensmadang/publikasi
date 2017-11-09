<?php
  session_start();

  require_once dirname(__FILE__).'/models/LoginModel.php';
  require_once dirname(__FILE__).'/views/LoginView.php';
  require_once dirname(__FILE__).'/controllers/LoginController.php';

  if (isset($_SESSION['user'])) {
      header('Location: '.APP_URL.'dashboard');
      exit;
  }

  $login = new LoginController(new LoginModel(), new LoginView());
  
  $login->login();
