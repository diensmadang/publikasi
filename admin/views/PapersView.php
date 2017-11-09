<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class PapersView
  {
      public function renderList($data)
      {
          require_once dirname(__FILE__).'/../templates/papers/paperList.php';
      }

      public function renderAdd()
      {
          require_once dirname(__FILE__).'/../templates/papers/paperUpload.php';
      }
  }
