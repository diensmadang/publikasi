<?php
  require_once dirname(__FILE__).'/../configs/environment.php';

  session_start();
  session_destroy();

  header('Location: '.APP_URL);
  exit;
