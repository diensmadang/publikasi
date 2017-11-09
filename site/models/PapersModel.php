<?php
  require_once dirname(__FILE__).'/../../class/Papers.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class PapersModel extends Papers
  {
      public function getPaperList($paging)
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT count(*) as paper from papers');
          $req->execute();
          $total = $req->fetch();
          $total = $total['paper'];
          $limit = 6;
          if ($total % $limit != 0) {
              $total = floor($total / $limit) + 1;
          } else {
              $total = $total / $limit;
          }
          $offset = $paging * $limit - $limit;

          $req = $con->prepare('SELECT p.id, p.id_user, p.judul, p.deskripsi, p.pengarang, p.tahun, p.pembimbing, p.jurusan, p.file, u.nama_depan, u.nama_belakang, u.url
                            FROM papers as p
                            INNER JOIN users as u ON u.id = p.id_user
                            ORDER BY p.id DESC
                            LIMIT ? OFFSET ?');
          $req->bindParam(1, $limit, PDO::PARAM_INT);
          $req->bindParam(2, $offset, PDO::PARAM_INT);
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
          $req = $con->prepare('SELECT p.id, p.id_user, p.judul, p.deskripsi, p.pengarang, p.tahun, p.pembimbing, p.jurusan, p.file, u.nama_depan, u.nama_belakang, u.gambar, u.url
                                FROM papers as p
                                INNER JOIN users as u ON u.id = p.id_user
                                WHERE p.id = ?');
          $req->bindParam(1, $this->getId());
          $req->execute();

          $data = $req->fetch();

          return $data;
      }

      public function getDaftarTahun()
      {
        $con = Connection::getInstance();
        $req = $con->prepare('SELECT tahun FROM papers GROUP BY tahun');
        $req->execute();
        $data = $req->fetchAll();

        return $data;
      }

      public function getDaftarPembimbing()
      {
        $con = Connection::getInstance();
        $req = $con->prepare('SELECT pembimbing FROM papers GROUP BY pembimbing');
        $req->execute();
        $data = $req->fetchAll();

        return $data;
      }

      public function getDaftarJurusan()
      {
        $con = Connection::getInstance();
        $req = $con->prepare('SELECT jurusan FROM papers GROUP BY jurusan');
        $req->execute();
        $data = $req->fetchAll();

        return $data;
      }
  }
