<?php
  require_once dirname(__FILE__).'/../../class/User.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class LoginModel extends User
  {
      public function login()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE email = ?');
          $req->bindParam(1, $this->getEmail());
          $req->execute();

          $data = $req->fetch();

          if ($data) {
              if ($this->checkPassword($data['password'])) {
                  return $data;
              }
          } else {
              return false;
          }
      }
  }
