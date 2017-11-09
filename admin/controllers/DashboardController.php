<?php
  class DashboardController
  {
      private $model;
      private $view;

      public function __construct($model, $view)
      {
          $this->model = $model;
          $this->view = $view;
      }

      public function dashboard()
      {
          $this->model->setId($_SESSION['user']['id']);
          $data = $this->model->getDataUser();
          $this->view->render($data);
      }

      public function updateNama()
      {
          $this->model->setNamaDepan($_POST['nama_depan']);
          $this->model->setNamaBelakang($_POST['nama_belakang']);
          $this->model->setId($_SESSION['user']['id']);

          $error = $this->model->verifyNama();
          if ($error) {
              echo json_encode($error);
          } else {
              if ($this->model->updateNama()) {
                  $sukses = array('sukses' => true);
                  echo json_encode($sukses);
              } else {
                  $sukses = array('sukses' => false);
                  echo json_encode($sukses);
              }
          }
      }

      public function updateFoto()
      {
          $this->model->setId($_SESSION['user']['id']);
          $data = $this->model->getDataUser();
          if (!empty($data['gambar'])) {
              unlink(UPLOAD_IMAGE_FOLDER.$data['gambar']);
          }

          $file_ext = substr($_FILES['foto']['name'], strripos($_FILES['foto']['name'], '.'));
          $tempFile = $_FILES['foto']['tmp_name'];
          $foto = UPLOAD_IMAGE_FOLDER.$_SESSION['user']['url'].$file_ext;
          if (move_uploaded_file($tempFile, $foto)) {
              $this->model->setGambar($_SESSION['user']['url'].$file_ext);
              $this->model->setId($_SESSION['user']['id']);
              if ($this->model->updateFoto()) {
                  $sukses = array('sukses' => true);
                  echo json_encode($sukses);
              }
          } else {
              $sukses = array('sukses' => false);
              echo json_encode($sukses);
          }
      }

      public function updateBiografi()
      {
          $this->model->setBiografi($_POST['biografi']);
          $this->model->setId($_SESSION['user']['id']);
          if ($this->model->updateBiografi()) {
              $sukses = array('sukses' => true);
              echo json_encode($sukses);
          } else {
              $sukses = array('sukses' => false);
              echo json_encode($sukses);
          }
      }

      public function updateKontak()
      {
          $this->model->setAlamat($_POST['alamat']);
          $this->model->setTelepon($_POST['telepon']);
          $this->model->setId($_SESSION['user']['id']);

          $error = $this->model->verifyKontak();
          if ($error) {
              $sukses = array('sukses' => false);
              echo json_encode($sukses);
          } else {
              if ($this->model->updateKontak()) {
                  $sukses = array('sukses' => true);
                  echo json_encode($sukses);
              } else {
                  $sukses = array('sukses' => false);
                  echo json_encode($sukses);
              }
          }
      }

      public function updateEmail()
      {
          $this->model->setEmail($_POST['email']);
          $this->model->setPassword($_POST['password']);
          $this->model->setId($_SESSION['user']['id']);

          $error = $this->model->verifyEmail();
          if ($error) {
              $sukses = array('sukses' => false);
              echo json_encode($sukses);
          } else {
              $data = $this->model->getDataUser();
              if ($this->model->checkPassword($data['password'])) {
                  if ($this->model->updateEmail()) {
                      $sukses = array('sukses' => true);
                      echo json_encode($sukses);
                  } else {
                      $sukses = array('sukses' => false);
                      echo json_encode($sukses);
                  }
              } else {
                  $sukses = array('sukses' => false);
                  echo json_encode($sukses);
              }
          }
      }

      public function updatePassword()
      {
          $passwordLama = $_POST['passwordLama'];
          $passwordBaru = $_POST['passwordBaru'];
          $this->model->setId($_SESSION['user']['id']);

          $this->model->setPassword($_POST['passwordLama']);
          $error = $this->model->verifyPassword($passwordBaru);
          if ($error) {
              $sukses = array('sukses' => false);
              echo json_encode($sukses);
          } else {
              $data = $this->model->getDataUser();
              if ($this->model->checkPassword($data['password'])) {
                  $this->model->setPassword($passwordBaru);
                  if ($this->model->updatePassword()) {
                      $sukses = array('sukses' => true);
                      echo json_encode($sukses);
                  } else {
                      $sukses = array('sukses' => false);
                      echo json_encode($sukses);
                  }
              } else {
                  $sukses = array('sukses' => false);
                  echo json_encode($sukses);
              }
          }
      }
  }
