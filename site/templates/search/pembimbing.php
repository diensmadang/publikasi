<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pembimbing <?php echo $data['criteria']; ?></title>
    <?php require_once dirname(__FILE__).'/../includeCSS.php'; ?>
    <style>
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
              <nav class="pull-right">
                <ul class="pager">
                  <?php
                  if ($data['prev']) {
                      $prev = APP_URL.'search/pembimbing/'.$data['criteria'].'/'.$data['prev'];
                      echo "<li><a href='$prev'>Prev</a></li>";
                  } else {
                      echo "<li class='disabled'><a href='#'>Prev</a></li>";
                  }
                  if ($data['next']) {
                      $next = APP_URL.'search/pembimbing/'.$data['criteria'].'/'.$data['next'];
                      echo "<li><a href='$next'>Next</a></li>";
                  } else {
                      echo "<li class='disabled'><a href='#'>Next</a></li>";
                  }
                  ?>
                </ul>
              </nav>
            </div>
            <div class="clearfix visible-xs-block"></div>
            <div class="col-md-8">
                <?php
                  $papers = $data['papers'];
                  $banyakPaper = count($papers);
                  for ($i = 0; $i < $banyakPaper; ++$i) {
                      $paper = $papers[$i];
                      require dirname(__FILE__).'/searchDetail.php';
                  }
                ?>
            </div>
            <div class="col-md-4">
                <?php require_once dirname(__FILE__).'/../sidebar.php'; ?>
            </div>
            <div class="col-md-12">
                <nav class="pull-right">
                  <ul class="pager">
                    <?php
                      if ($data['prev']) {
                          $prev = APP_URL.'search/pembimbing/'.$data['criteria'].'/'.$data['prev'];
                          echo "<li><a href='$prev'>Prev</a></li>";
                      } else {
                          echo "<li class='disabled'><a href='#'>Prev</a></li>";
                      }
                      if ($data['next']) {
                          $next = APP_URL.'search/pembimbing/'.$data['criteria'].'/'.$data['next'];
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
</body>

</html>
