<?php
  class SignupController
  {
      private $model;
      private $view;

      public function __construct($model, $view)
      {
          $this->model = $model;
          $this->view = $view;
      }

      public function signup()
      {
          if (!empty($_POST)) {
              $this->model->setNamaDepan($_POST['nama_depan']);
              $this->model->setNamaBelakang($_POST['nama_belakang']);
              $this->model->setEmail($_POST['email']);
              $this->model->setPassword($_POST['password']);

              $error = $this->model->verify();
              if ($error) {
                  $this->view->render($error);
              } else {
                  $success = $this->model->signup();
                  if ($success) {
                      $_SESSION['user'] = $this->model->getDataUser();
                      echo "<script>alert('Selamat kamu berhasil terdaftar.')</script>";
                      echo "<script>document.location='".APP_URL."dashboard'</script>";
                  } else {
                      $error['email'] = 'Email sudah digunakan';
                      $this->view->render($error);
                  }
              }
          } else {
              $this->view->render();
          }
      }
  }
