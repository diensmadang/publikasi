<?php
  class LoginController
  {
      private $model;
      private $view;

      public function __construct($model, $view)
      {
          $this->model = $model;
          $this->view = $view;
      }

      public function login()
      {
          if (!empty($_POST)) {
              $this->model->setEmail($_POST['email']);
              $this->model->setPassword($_POST['password']);

              $user = $this->model->login();
              if ($user) {
                  $_SESSION['user'] = $user;
                  echo "<script>document.location='".APP_URL."dashboard'</script>";
              } else {
                  $this->view->render($error = true);
              }
          } else {
              $this->view->render();
          }
      }
  }
