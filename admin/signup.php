<?php
 session_start();

  require_once dirname(__FILE__).'/models/SignupModel.php';
  require_once dirname(__FILE__).'/views/SignupView.php';
  require_once dirname(__FILE__).'/controllers/SignupController.php';

  if (isset($_SESSION['user'])) {
      header('Location: '.APP_URL.'dashboard');
      exit;
  }

  $signup = new SignupController(new SignupModel(), new SignupView());
  $signup->signup();
