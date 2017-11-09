<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class PapersView
  {
      public function render($data)
      {
        require_once dirname(__FILE__).'/../templates/papers/paperDetail.php';
      }

      public function renderList($data)
      {
          require_once dirname(__FILE__).'/../templates/papers/paperList.php';
      }
  }
