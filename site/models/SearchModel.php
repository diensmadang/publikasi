<?php
  require_once dirname(__FILE__).'/PapersModel.php';
  require_once dirname(__FILE__).'/../../class/Connection.php';

  class SearchModel extends PapersModel
  {
      public function getPaperTahun($paging)
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT count(*) as paper from papers WHERE tahun = ?');
          $req->bindParam(1, $this->getTahun());
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
                          WHERE tahun = ?
                          ORDER BY p.id DESC
                          LIMIT ? OFFSET ?');
          $req->bindParam(1, $this->getTahun());
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

      public function getPaperPembimbing($paging)
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT count(*) as paper from papers WHERE pembimbing = ?');
          $req->bindParam(1, $this->getPembimbing());
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
                          WHERE pembimbing = ?
                          ORDER BY p.id DESC
                          LIMIT ? OFFSET ?');
          $req->bindParam(1, $this->getPembimbing());
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

      public function getPaperJurusan($paging)
      {
          $con = Connection::getInstance();
          $req = $con->prepare('SELECT count(*) as paper from papers WHERE jurusan = ?');
          $req->bindParam(1, $this->getJurusan());
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
                          WHERE jurusan = ?
                          ORDER BY p.id DESC
                          LIMIT ? OFFSET ?');
          $req->bindParam(1, $this->getJurusan());
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
  }
