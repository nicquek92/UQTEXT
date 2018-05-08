<?php include "includes/functions.php"; ?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">UQ Text</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload.php">Upload</a>
            </li>
        </ul>
        <div class="col-sm-3 col-md-3">
            <form action="searchresult.php" method="get" class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" name="search_btn" type="submit"><i
                                    class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
<div class="nav navbar-login">
    <?php if (is_Login()): ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    <?php else: ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Log In</a></li>
        </ul>
    <?php endif; ?>
</div>

    </div>
    <!-- /.navbar-collapse -->
</nav>

