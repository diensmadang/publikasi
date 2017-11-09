<?php
  require_once dirname(__FILE__).'/../../configs/environment.php';

  class DashboardView
  {
      public function render($data)
      {
          require_once dirname(__FILE__).'/../templates/dashboard/dashboard.php';
      }
  }
