<?php
  require_once dirname(__FILE__).'/../../class/User.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class SignupModel extends User
  {
      public function signup()
      {
          if ($this->checkEmail()) {
              $this->sanitizeUrl();

              $con = Connection::getInstance();
              $req = $con->prepare('INSERT INTO users(nama_depan, nama_belakang, email, password, url) VALUES(?,?,?,?,?)');
              $req->bindParam(1, $this->getNamaDepan());
              $req->bindParam(2, $this->getNamaBelakang());
              $req->bindParam(3, $this->getEmail());
              $req->bindParam(4, password_hash($this->getPassword(), PASSWORD_DEFAULT));
              $req->bindParam(5, $this->getUrl());
              $req->execute();

              return true;
          } else {
              return false;
          }
      }

      private function checkEmail()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE email = ?');
          $req->bindParam(1, $this->getEmail());
          $req->execute();

          $data = $req->fetch();

          if ($data) {
              return false;
          } else {
              return true;
          }
      }

      public function verify()
      {
          $error = array();
          $verify_name = '/^[a-z0-9 .\-]+$/i';
          $verify_password = '/^[a-z0-9_]+$/i';
          if (!preg_match($verify_name, $this->getNamaDepan())) {
              $error['nama_depan'] = true;
          }
          if (!preg_match($verify_name, $this->getNamaBelakang())) {
              $error['nama_belakang'] = true;
          }
          if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
              $error['email'] = true;
          }
          if (!preg_match($verify_password, $this->getPassword())) {
              $error['password'] = true;
          }

          return $error;
      }

      private function sanitizeUrl()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE url = ?');
          $req->bindParam(1, $this->getUrl());
          $req->execute();

          $data = $req->fetch();

          if ($data) {
              $this->setUrl($data['url'].uniqid());
          } else {
              $url = strtolower($this->getNamaDepan().$this->getNamaBelakang());
              $url = preg_replace("/[\s]/", '', $url);
              $this->setUrl($url);
          }
      }

      public function getDataUser()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE email = ?');
          $req->bindParam(1, $this->getEmail());
          $req->execute();
          $data = $req->fetch();

          return $data;
      }
  }
