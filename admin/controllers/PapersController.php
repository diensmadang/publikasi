<?php
  class PapersController
  {
      private $model;
      private $view;

      public function __construct($model, $view)
      {
          $this->model = $model;
          $this->view = $view;
      }

      public function paperList()
      {
          $userId = $_SESSION['user']['id'];
          if (isset($_GET['page'])) {
              $paging = $_GET['page'];
          } else {
              $paging = 1;
          }
          $data = $this->model->getPaperList($userId, $paging);
          $this->view->renderList($data);
      }

      public function paperAdd()
      {
          $this->view->renderAdd();
      }

      public function paperAddService()
      {
          $sukses = array('sukses' => false);

          $this->model->setIdUser($_SESSION['user']['id']);
          if (!empty($_POST['judul'])) {
              $this->model->setJudul($_POST['judul']);
          } else {
              $sukses['error'] = array('judul' => true);
              header('HTTP/1.1 400 Bad Request');
              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }
          if (isset($_POST['deskripsi'])) {
              $this->model->setDeskripsi($_POST['deskripsi']);
          }
          if (isset($_POST['pengarang'])) {
              $this->model->setPengarang($_POST['pengarang']);
          }
          $this->model->setTahun($_POST['tahun']);
          $this->model->setPembimbing($_POST['pembimbing']);
          $this->model->setJurusan($_POST['jurusan']);

          $file_ext = substr($_FILES['file']['name'], strripos($_FILES['file']['name'], '.'));
          $file_name = date('dmYHis');
          $this->model->setFile($file_name.strtolower($file_ext));
          $tempFile = $_FILES['file']['tmp_name'];
          $document = UPLOAD_DOCUMENT_FOLDER.$this->model->getFile();
          if (move_uploaded_file($tempFile, $document) && $this->model->addPaper()) {
              try {
                  $gambar = new Imagick(UPLOAD_DOCUMENT_FOLDER.$this->model->getFile().'[0]');
                  $gambar->resizeImage(250, 250, imagick::FILTER_LANCZOS, 1, true);
                  $gambar->setImageFormat('png');

                  $gambar->writeImage(UPLOAD_DOCUMENT_FOLDER.$file_name.'.png');
              } catch (Exception $e) {
              }

              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          } else {
              unlink(UPLOAD_DOCUMENT_FOLDER.$this->model->getFile());
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updateJudul()
      {
          $sukses = array('sukses' => true);
          if (!empty($_POST['judul'])) {
              $this->model->setJudul($_POST['judul']);
          } else {
              $sukses['error'] = array('judul' => true);
              header('HTTP/1.1 400 Bad Request');
              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updateJudul()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updateDeskripsi()
      {
          $sukses = array('sukses' => true);
          $this->model->setDeskripsi($_POST['deskripsi']);
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updateDeskripsi()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updatePengarang()
      {
          $sukses = array('sukses' => true);
          $this->model->setPengarang($_POST['pengarang']);
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updatePengarang()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updateTahun()
      {
          $sukses = array('sukses' => true);
          if (is_numeric($_POST['tahun'])) {
              $this->model->setTahun($_POST['tahun']);
          } else {
              $sukses['error'] = array('tahun' => true);
              header('HTTP/1.1 400 Bad Request');
              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updateTahun()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updatePembimbing()
      {
          $sukses = array('sukses' => true);
          $this->model->setPembimbing($_POST['pembimbing']);
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updatePembimbing()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updateJurusan()
      {
          $sukses = array('sukses' => true);
          $this->model->setJurusan($_POST['jurusan']);
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          if ($this->model->updateJurusan()) {
              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function updateFile()
      {
          $sukses = array('sukses' => false);

          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          $paper = $this->model->getPaper();

          try {
              unlink(UPLOAD_DOCUMENT_FOLDER.$paper['file']);
              unlink(UPLOAD_DOCUMENT_FOLDER.str_replace('.pdf', '.png', $paper['file']));
          } catch (Exception $e) {
          }

          $file_ext = substr($_FILES['file']['name'], strripos($_FILES['file']['name'], '.'));
          $file_name = date('dmYHis');
          $this->model->setFile($file_name.$file_ext);
          $tempFile = $_FILES['file']['tmp_name'];
          $document = UPLOAD_DOCUMENT_FOLDER.$this->model->getFile();
          if (move_uploaded_file($tempFile, $document) && $this->model->updateFile()) {
              try {
                  $gambar = new Imagick(UPLOAD_DOCUMENT_FOLDER.$this->model->getFile().'[0]');
                  $gambar->resizeImage(250, 250, imagick::FILTER_LANCZOS, 1, true);
                  $gambar->setImageFormat('png');

                  $gambar->writeImage(UPLOAD_DOCUMENT_FOLDER.$file_name.'.png');
              } catch (Exception $e) {
              }

              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          } else {
              unlink(UPLOAD_DOCUMENT_FOLDER.$this->model->getFile());
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }

      public function deletePaper()
      {
          $sukses = array('sukses' => true);
          $this->model->setId($_POST['id']);
          $this->model->setIdUser($_SESSION['user']['id']);

          $paper = $this->model->getPaper();

          if ($this->model->deletePaper()) {
              try {
                  unlink(UPLOAD_DOCUMENT_FOLDER.$paper['file']);
                  unlink(UPLOAD_DOCUMENT_FOLDER.str_replace('.pdf', '.png', $paper['file']));
              } catch (Exception $e) {
              }

              $sukses['sukses'] = true;

              header('Content-Type: application/json; charset=UTF-8');
              die(json_encode($sukses));
          }

          header('HTTP/1.1 400 Bad Request');
          header('Content-Type: application/json; charset=UTF-8');
          die(json_encode($sukses));
      }
  }
