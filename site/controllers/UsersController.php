<?php
  class UsersController
  {
      private $model;
      private $view;

      public function __construct($model, $view)
      {
          $this->model = $model;
          $this->view = $view;
      }

      public function showUser()
      {
          $this->model->setUrl($_GET['url']);
          $data = $this->model->getDataUser();
          $this->view->render($data);
      }
  }
