<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo APP_URL; ?>">
        <img src="<?php echo APP_URL; ?>/assets/images/brand.png">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo APP_URL; ?>">HOME</a></li>
        <?php if (isset($_SESSION['user'])) { ?>
          <li><a href="<?php echo APP_URL.'dashboard/paper/list'; ?>">KARYAKU</a></li>
          <li class="hidden-xs"><a href="<?php echo APP_URL.'dashboard/paper/add'; ?>" class="btn btn-success navbar-btn navbar-btn-upload"><span class="glyphicon glyphicon-plus"></span> UPLOAD</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo APP_URL; ?>dashboard">Dashboard</a></li>
              <li><a href="<?php echo APP_URL; ?>logout">Logout</a></li>
            </ul>
          </li>
        <?php } else { ?>
          <li><a href="<?php echo APP_URL.'/signup'; ?>">Daftar</a></li>
          <li><a href="<?php echo APP_URL.'/login'; ?>">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
