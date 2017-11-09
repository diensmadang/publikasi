<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class SearchView
  {
      public function renderTahun($data)
      {
          require_once dirname(__FILE__).'/../templates/search/tahun.php';
      }

      public function renderPembimbing($data)
      {
          require_once dirname(__FILE__).'/../templates/search/pembimbing.php';
      }

      public function renderJurusan($data)
      {
          require_once dirname(__FILE__).'/../templates/search/jurusan.php';
      }
  }
