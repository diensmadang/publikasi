<?php
  session_start();

  require_once dirname(__FILE__).'/models/PapersModel.php';
  require_once dirname(__FILE__).'/views/PapersView.php';
  require_once dirname(__FILE__).'/controllers/PapersController.php';

  $paper = new PapersController(new PapersModel(), new PapersView());

  if (isset($_GET['id'])) {
      $action = 'detail';
  } else {
      $action = 'list';
  }
  
  switch ($action) {
    case 'detail':
      $paper->paper();
      break;
    case 'list':
      $paper->paperList();
      break;

    default:
      # code...
      break;
  }
