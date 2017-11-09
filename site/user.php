<?php
  session_start();

  require_once dirname(__FILE__).'/models/UsersModel.php';
  require_once dirname(__FILE__).'/views/UsersView.php';
  require_once dirname(__FILE__).'/controllers/UsersController.php';


  $user = new UsersController(new UsersModel(), new UsersView());
  $user->showUser();
