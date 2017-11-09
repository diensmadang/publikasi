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
        if (!empty($_GET['page'])) {
            $paging = $_GET['page'];
        } else {
            $paging = 1;
        }
        $data = $this->model->getPaperList($paging);
        $data['tahun'] = $this->model->getDaftarTahun();
        $data['pembimbing'] = $this->model->getDaftarPembimbing();
        $data['jurusan'] = $this->model->getDaftarJurusan();
        $this->view->renderList($data);
    }

    public function paper()
    {
      $this->model->setId($_GET['id']);

      $data = $this->model->getPaper();
      $this->view->render($data);
    }
  }
