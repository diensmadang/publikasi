<?php
  class User
  {
      private $id;
      private $email;
      private $password;
      private $nama_depan;
      private $nama_belakang;
      private $gambar;
      private $biografi;
      private $alamat;
      private $telepon;
      private $url;

      public function getId()
      {
          return $this->id;
      }

      public function getEmail()
      {
          return $this->email;
      }

      public function getPassword()
      {
          return $this->password;
      }

      public function getNamaDepan()
      {
          return $this->nama_depan;
      }

      public function getNamaBelakang()
      {
          return $this->nama_belakang;
      }

      public function getGambar()
      {
          return $this->gambar;
      }

      public function getBiografi()
      {
          return $this->biografi;
      }

      public function getAlamat()
      {
          return $this->alamat;
      }

      public function getTelepon()
      {
          return $this->telepon;
      }

      public function getUrl()
      {
          return $this->url;
      }

      public function setId($id)
      {
          $this->id = $id;
      }

      public function setEmail($email)
      {
          $this->email = $email;
      }

      public function setPassword($password)
      {
          $this->password = $password;
      }

      public function setNamaDepan($namaDepan)
      {
          $this->nama_depan = $namaDepan;
      }

      public function setNamaBelakang($namaBelakang)
      {
          $this->nama_belakang = $namaBelakang;
      }

      public function setGambar($gambar)
      {
          $this->gambar = $gambar;
      }

      public function setBiografi($biografi)
      {
          $this->biografi = $biografi;
      }

      public function setAlamat($alamat)
      {
          $this->alamat = $alamat;
      }

      public function setTelepon($telepon)
      {
          $this->telepon = $telepon;
      }

      public function setUrl($url)
      {
          $this->url = $url;
      }

      public function checkPassword($password)
      {
          if (password_verify($this->getPassword(), $password)) {
              return true;
          } else {
              return false;
          }
      }
  }
