<?php
  session_start();

  require_once dirname(__FILE__).'/models/PapersModel.php';
  require_once dirname(__FILE__).'/views/PapersView.php';
  require_once dirname(__FILE__).'/controllers/PapersController.php';

  if (!isset($_SESSION['user'])) {
      header('Location: '.APP_URL.'login');
      exit;
  }

  $paper = new PapersController(new PapersModel(), new PapersView());

  if (isset($_POST['action'])) {
      $action = $_POST['action'];
  } elseif (isset($_GET['action'])) {
      $action = $_GET['action'];
  } else {
      $action = 'default';
  }

  switch ($action) {
    case 'list':
      $paper->paperList();
      break;
    case 'add':
      $paper->paperAdd();
      break;
    case 'addService':
      $paper->paperAddService();
      break;
    case 'updateJudul':
      $paper->updateJudul();
      break;
    case 'updateDeskripsi':
      $paper->updateDeskripsi();
      break;
    case 'updatePengarang':
      $paper->updatePengarang();
      break;
    case 'updateTahun' :
      $paper->updateTahun();
      break;
    case 'updatePembimbing' :
      $paper->updatePembimbing();
      break;
    case 'updateJurusan' :
      $paper->updateJurusan();
      break;
    case 'updateFile' :
      $paper->updateFile();
      break;
    case 'deletePaper' :
      $paper->deletePaper();
      break;
      
    default:
      $paper->paperList();
      break;
  }
