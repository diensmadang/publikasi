<?php
  session_start();

  require_once dirname(__FILE__).'/models/SearchModel.php';
  require_once dirname(__FILE__).'/views/SearchView.php';
  require_once dirname(__FILE__).'/controllers/SearchController.php';

  $search = new SearchController(new SearchModel(), new SearchView());

  if (isset($_GET['action'])) {
      $action = $_GET['action'];
  } else {
      $action = 'list';
  }

  switch ($action) {
    case 'tahun':
      $search->paperTahun();
      break;
    case 'pembimbing':
      $search->paperPembimbing();
      break;
    case 'jurusan':
      $search->paperJurusan();
      break;
    case 'list':
      $search->paperList();
      break;

    default:
      # code...
      break;
  }
