<?php
  class SearchController
  {
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function paperTahun()
    {
        if (!empty($_GET['page'])) {
            $paging = $_GET['page'];
        } else {
            $paging = 1;
        }

        $this->model->setTahun($_GET['criteria']);
        $data = $this->model->getPaperTahun($paging);
        $data['tahun'] = $this->model->getDaftarTahun();
        $data['pembimbing'] = $this->model->getDaftarPembimbing();
        $data['jurusan'] = $this->model->getDaftarJurusan();
        $data['criteria'] = $_GET['criteria'];
        $this->view->renderTahun($data);
    }

    public function paperPembimbing()
    {
        if (!empty($_GET['page'])) {
            $paging = $_GET['page'];
        } else {
            $paging = 1;
        }

        $this->model->setPembimbing($_GET['criteria']);
        $data = $this->model->getPaperPembimbing($paging);
        $data['tahun'] = $this->model->getDaftarTahun();
        $data['pembimbing'] = $this->model->getDaftarPembimbing();
        $data['jurusan'] = $this->model->getDaftarJurusan();
        $data['criteria'] = $_GET['criteria'];
        $this->view->renderPembimbing($data);
    }

    public function paperJurusan()
    {
        if (!empty($_GET['page'])) {
            $paging = $_GET['page'];
        } else {
            $paging = 1;
        }

        $this->model->setJurusan($_GET['criteria']);
        $data = $this->model->getPaperJurusan($paging);
        $data['tahun'] = $this->model->getDaftarTahun();
        $data['pembimbing'] = $this->model->getDaftarPembimbing();
        $data['jurusan'] = $this->model->getDaftarJurusan();
        $data['criteria'] = $_GET['criteria'];
        $this->view->renderJurusan($data);
    }
  }
