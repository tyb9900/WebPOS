<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
               WELCOME
<!--                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />-->
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php
                                        echo $_SESSION["username"];?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION["type"] ?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">


                        <li><a href="login.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    POS
                </div>
            </li>
            <li class="active">
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>

            </li>
            <li>
                <a href="sale.php"><i class="fa fa-diamond"></i> <span class="nav-label">Sale</span></a>
            </li>
            <li>
                <a href="stock.php"><i class="fa fa-pie-chart"></i> <span class="nav-label">Stock</span>  </a>
            </li>
            <li>
                <a href="articles.php"><i class="fa fa-flask"></i> <span class="nav-label">Articles</span></a>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-laptop"></i> <span class="nav-label">Categories</span></a>
            </li>
            <?php
            if($_SESSION["type"]=="Admin")
               echo "            <li>
                <a href=\"users.php\"><i class=\"fa fa-user\"></i> <span class=\"nav-label\">Users</span></a>
            </li>";
            ?>
        </ul>

    </div>
</nav>
