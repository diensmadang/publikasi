<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karya Ilmiah</title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
    <link href="<?php echo APP_URL ?>assets/css/dropzone.min.css" rel="stylesheet" />
    <style>
      .popover-content {
        padding: 0px;
      }
      .list-group-item {
        border: none;
      }
      .list-group-item-text {
        min-width: 300px;
      }
      @media (min-width: 750px) {
          .dl-horizontal dt {
              width: auto;
          }
          .dl-horizontal dd {
              margin-left: 120px;
          }
      }
    </style>
</head>

<body>
    <?php require_once dirname(__FILE__).'/../navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="btn-group pager" role="group" aria-label="post-control">
                            <a href="<?php echo APP_URL ?>dashboard/paper/add">
                                <button type="button" class="btn btn-default">Upload</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                      <nav class="pull-right">
                        <ul class="pager">
                          <?php
                            if ($data['prev']) {
                                $prev = APP_URL.'dashboard/paper/list/'.$data['prev'];
                                echo "<li><a href='$prev'>Prev</a></li>";
                            } else {
                                echo "<li class='disabled'><a href='#'>Prev</a></li>";
                            }
                            if ($data['next']) {
                                $next = APP_URL.'dashboard/paper/list/'.$data['next'];
                                echo "<li><a href='$next'>Next</a></li>";
                            } else {
                                echo "<li class='disabled'><a href='#'>Next</a></li>";
                            }
                          ?>
                        </ul>
                      </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php
                  require_once dirname(__FILE__).'/paperError.php';
                  require_once dirname(__FILE__).'/paperSuccess.php';
                  require_once dirname(__FILE__).'/updateModalFile.php';
                  $papers = $data['papers'];
                  $banyakPaper = count($papers);
                  for ($i = 0; $i < $banyakPaper; ++$i) {
                      $paper = $papers[$i];
                      require dirname(__FILE__).'/updateModal.php';
                      require dirname(__FILE__).'/paperListDetail.php';
                  }
                ?>
            </div>
            <div class="col-md-12">

              <nav class="pull-right">
                <ul class="pager">
                  <?php
                    if ($data['prev']) {
                        $prev = APP_URL.'dashboard/paper/list/'.$data['prev'];
                        echo "<li><a href='$prev'>Prev</a></li>";
                    } else {
                        echo "<li class='disabled'><a href='#'>Prev</a></li>";
                    }
                    if ($data['next']) {
                        $next = APP_URL.'dashboard/paper/list/'.$data['next'];
                        echo "<li><a href='$next'>Next</a></li>";
                    } else {
                        echo "<li class='disabled'><a href='#'>Next</a></li>";
                    }
                  ?>
                </ul>
              </nav>

            </div>
        </div>
    </div>
    <?php require_once dirname(__FILE__).'/../footer.php'; ?>
    <?php require_once dirname(__FILE__).'/../includeJS.php'; ?>
    <script src="<?php echo APP_URL ?>assets/js/bootbox.min.js"></script>
    <script src="<?php echo APP_URL ?>assets/js/dropzone.min.js"></script>
    <script src="<?php echo APP_URL ?>assets/js/admin/paper.js"></script>
</body>

</html>
