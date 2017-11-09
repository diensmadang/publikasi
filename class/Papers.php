<?php
  class Papers
  {
      private $id;
      private $idUser;
      private $judul;
      private $deskripsi;
      private $pengarang;
      private $tahun;
      private $pembimbing;
      private $jurusan;
      private $file;

      public function getId()
      {
          return $this->id;
      }

      public function getIdUser()
      {
          return $this->idUser;
      }

      public function getJudul()
      {
          return $this->judul;
      }

      public function getDeskripsi()
      {
          return $this->deskripsi;
      }

      public function getPengarang()
      {
          return $this->pengarang;
      }

      public function getTahun()
      {
          return $this->tahun;
      }

      public function getPembimbing()
      {
          return $this->pembimbing;
      }

      public function getJurusan()
      {
          return $this->jurusan;
      }

      public function getFile()
      {
          return $this->file;
      }

      public function setId($id)
      {
          $this->id = $id;
      }

      public function setIdUser($idUser)
      {
          $this->idUser = $idUser;
      }

      public function setJudul($judul)
      {
          $this->judul = $judul;
      }

      public function setDeskripsi($deskripsi)
      {
          $this->deskripsi = $deskripsi;
      }

      public function setPengarang($pengarang)
      {
          $this->pengarang = $pengarang;
      }

      public function setTahun($tahun)
      {
          $this->tahun = $tahun;
      }

      public function setPembimbing($pembimbing)
      {
          $this->pembimbing = $pembimbing;
      }

      public function setJurusan($jurusan)
      {
          $this->jurusan = $jurusan;
      }

      public function setFile($file)
      {
          $this->file = $file;
      }
  }
