<?php
if(!isset($_SESSION)){
    session_start();
}
  require_once "functions.php"
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
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
                <a class="nav-link" href="/index.php">Home</a>
            </li>
<li><a  class="btn" href="/signup.php">Sign Up</a>
            <?php if(isset($_SESSION['admin_uqtext'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index.php">ADMIN PANEL</a>
                </li>
            <?php } ?>
        </ul>

        <div class="col-sm-3 col-md-3">
            <form action="/index.php" method="get"
                  class="navbar-form"
                  role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search"
                           name="searchq">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i
                                class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="nav navbar-login">
            <ul class="nav navbar-nav navbar-right">
                <li>

                    <div id="navbar-cart" class="nav">
                        <ul class="nav navbar-nav">
                            <li>
                                <a id="peek_btn" class="btn"
                                                                     title="Peek">
                                    <span class="glyphicon
                                    glyphicon-eye-open"></span><span>Peek Cart</span>
                                </a>
                            </li>
                            <li>
                                <a id="btn_checkout" class="checkout_btn btn"
                                   href="#"
                                   title="Check Out">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                    <span class="badge"></span>
                                    <span class="total_price">$ 0.00</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div id="navbar-login_logout" class="nav">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php if (isset($_SESSION['email'])): ?>
                            <li><a class="btn" href="/logout.php">Log Out</a>
                                <?php else: ?>
                          
                            <li><a class="btn" href="/login.php">Log In</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
            </ul>
        </div>

    </div>

    <!-- /.navbar-collapse -->
</nav>

<div class="container">
    <div id="mySidenav" class="sidenav">
        <h2 style="margin-left: 20%">Your Cart
        <a href="#" class="checkout_btn button"><span class="glyphicon
        glyphicon-shopping-cart"></span></a>
        </h2>
        <hr/>

                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Book</th>
                        <th>Title</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody id="peek_cart">

                    </tbody>
                </table>

    </div>
</div>