<?php
  require_once dirname(__FILE__).'/../../class/User.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class DashboardModel extends User
  {
      public function getDataUser()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM users WHERE id = ?');
          $req->bindParam(1, $this->getId());
          $req->execute();
          $data = $req->fetch();

          return $data;
      }

      public function updateNama()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET nama_depan = ?, nama_belakang = ? WHERE id = ?');
          $req->bindParam(1, $this->getNamaDepan());
          $req->bindParam(2, $this->getNamaBelakang());
          $req->bindParam(3, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function verifyNama()
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

          return $error;
      }

      public function updateFoto()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET gambar = ? WHERE id = ?');
          $req->bindParam(1, $this->getGambar());
          $req->bindParam(2, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateBiografi()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET biografi = ? WHERE id = ?');
          $req->bindParam(1, $this->getBiografi());
          $req->bindParam(2, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateKontak()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET telepon = ?, alamat = ? WHERE id = ?');
          $req->bindParam(1, $this->getTelepon());
          $req->bindParam(2, $this->getAlamat());
          $req->bindParam(3, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function verifyKontak()
      {
          $error = false;
          $verify_telepon = '/^[0-9]+$/i';
          if (!preg_match($verify_telepon, $this->getTelepon())) {
              $error = true;
          }

          return $error;
      }

      public function updateEmail()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET email = ? WHERE id = ?');
          $req->bindParam(1, $this->getEmail());
          $req->bindParam(2, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function verifyEmail()
      {
          $error = false;
          if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
              $error = true;
          }

          return $error;
      }

      public function updatePassword()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE users SET password = ? WHERE id = ?');
          $req->bindParam(1, password_hash($this->getPassword(), PASSWORD_DEFAULT));
          $req->bindParam(2, $this->getId());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function verifyPassword($passwordBaru)
      {
          $error = false;
          $verify_password = '/^[a-z0-9_]+$/i';
          if (!preg_match($verify_password, $passwordBaru)) {
              $error = true;
          }

          return $error;
      }
  }
