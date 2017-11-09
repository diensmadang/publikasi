<?php
  session_start();

  require_once dirname(__FILE__).'/models/DashboardModel.php';
  require_once dirname(__FILE__).'/views/DashboardView.php';
  require_once dirname(__FILE__).'/controllers/DashboardController.php';

  if (!isset($_SESSION['user'])) {
      header('Location: '.APP_URL.'login');
      exit;
  }

  $dashboard = new DashboardController(new DashboardModel(), new DashboardView());

  if (isset($_POST['action'])) {
      $action = $_POST['action'];
  } else {
      $action = 'default';
  }

  switch ($action) {
    case 'updateNama':
      $dashboard->updateNama();
      break;
    case 'updateFoto':
      $dashboard->updateFoto();
      break;
    case 'updateBiografi':
      $dashboard->updateBiografi();
      break;
    case 'updateKontak':
      $dashboard->updateKontak();
      break;
    case 'updateEmail':
      $dashboard->updateEmail();
      break;
    case 'updatePassword':
      $dashboard->updatePassword();
      break;

    default:
      $dashboard->dashboard();
      break;
  }
