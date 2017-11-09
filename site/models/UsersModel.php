<?php
  require_once dirname(__FILE__).'/../../class/User.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class UsersModel extends User
  {
      public function getDataUser()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE url = ?');
          $req->bindParam(1, $this->getUrl());
          $req->execute();
          $data = $req->fetch();

          return $data;
      }
  }
