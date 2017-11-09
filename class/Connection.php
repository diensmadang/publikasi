<?php
  class Connection
  {
      private static $instance = null;

      public static function getInstance()
      {
          if (self::$instance == null) {
              $db = require_once dirname(__FILE__).'/../configs/databases.php';

              self::$instance = new PDO("mysql:host=$db[HOST];dbname=$db[NAME]", $db['USERNAME'], $db['PASSWORD']);
          }

          return self::$instance;
      }
  }
