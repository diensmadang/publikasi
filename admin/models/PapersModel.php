<?php
  require_once dirname(__FILE__).'/../../class/Papers.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class PapersModel extends Papers
  {
      public function getPaperList($userId, $paging)
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT count(*) as paper from papers where id_user = ?');
          $req->bindParam(1, $userId);
          $req->execute();
          $total = $req->fetch();
          $total = $total['paper'];
          $limit = 8;
          if ($total % $limit != 0) {
              $total = floor($total / $limit) + 1;
          } else {
              $total = $total / $limit;
          }
          $offset = $paging * $limit - $limit;

          $req = $con->prepare('SELECT p.id, p.judul, p.deskripsi, p.pengarang, p.tahun, p.pembimbing, p.jurusan, p.file
                              FROM users
                              INNER JOIN papers AS p ON users.id = p.id_user
                              WHERE users.id = ?
                              ORDER BY p.id DESC
                              LIMIT ? OFFSET ?');
          $req->bindParam(1, $userId);
          $req->bindParam(2, $limit, PDO::PARAM_INT);
          $req->bindParam(3, $offset, PDO::PARAM_INT);
          $req->execute();
          $papers = $req->fetchAll();

          if ($paging != 1) {
              $prev = $paging - 1;
          } else {
              $prev = false;
          }

          if ($total >= $paging + 1) {
              $next = $paging + 1;
          } else {
              $next = false;
          }

          $data = array('papers' => $papers, 'prev' => $prev, 'next' => $next);

          return $data;
      }

      public function getPaper()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT * FROM papers WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getId());
          $req->bindParam(2, $this->getIdUser());
          $req->execute();

          $data = $req->fetch();

          return $data;
      }

      public function addPaper()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('INSERT into papers values(?,?,?,?,?,?,?,?,?)');
          $req->bindParam(1, $this->getId());
          $req->bindParam(2, $this->getIdUser());
          $req->bindParam(3, $this->getJudul());
          $req->bindParam(4, $this->getDeskripsi());
          $req->bindParam(5, $this->getPengarang());
          $req->bindParam(6, $this->getTahun());
          $req->bindParam(7, $this->getPembimbing());
          $req->bindParam(8, $this->getJurusan());
          $req->bindParam(9, $this->getFile());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateJudul()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET judul = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getJudul());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateDeskripsi()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET deskripsi = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getDeskripsi());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updatePengarang()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET pengarang = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getPengarang());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateTahun()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET tahun = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getTahun());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updatePembimbing()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET pembimbing = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getPembimbing());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateJurusan()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET jurusan = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getJurusan());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function updateFile()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('UPDATE papers SET file = ? WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getFile());
          $req->bindParam(2, $this->getId());
          $req->bindParam(3, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }

      public function deletePaper()
      {
          $con = Connection::getInstance();
          $req = $con->prepare('DELETE FROM papers WHERE id = ? AND id_user = ?');
          $req->bindParam(1, $this->getId());
          $req->bindParam(2, $this->getIdUser());

          if ($req->execute()) {
              return true;
          } else {
              return false;
          }
      }
  }
