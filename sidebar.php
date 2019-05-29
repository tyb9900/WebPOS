
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>

                            <img alt="image" width="40" height="40" class="img-circle" src="<?php
                            echo $_SESSION["userimg"];
                            ?>" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php
                                        echo $_SESSION["username"];?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo $_SESSION["type"] ?>
                                    <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#" data-toggle="modal" data-target="#myModal5">Upload Picture</a></li>
                        <li><a href="login.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    POS
                </div>
            </li>
            <li id="index">
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>

            </li>
            <li id="sale">
                <a href="sale.php" ><i class="fa fa-diamond"></i> <span class="nav-label">Sale</span></a>
            </li>
            <li id="stock">
                <a href="stock.php" ><i class="fa fa-pie-chart"></i> <span class="nav-label">Stock</span>  </a>
            </li>
            <li id="articles">
                <a href="articles.php" ><i class="fa fa-flask"></i> <span class="nav-label">Articles</span></a>
            </li>
            <li id="categories">
                <a href="categories.php"><i class="fa fa-laptop"></i> <span class="nav-label">Categories</span></a>
            </li>
            <?php
            if($_SESSION["type"]=="Admin")

                echo "<li id='users'>
                <a href=\"users.php\"><i class=\"fa fa-user\"></i> <span class=\"nav-label\">Users</span><span class=\"fa arrow\"></span></a>
                <ul class=\"nav nav-second-level collapse\">
                        <li><a href=\"users.php\">Manage Users</a></li>
                        <li><a href=\"usergellery.php\">Users Gallery</a></li>
                    </ul>

            </li>";
            ?>
        </ul>

    </div>
</nav>
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Upload Profile Picture</h4>
                <small class="font-bold">Update profile picture here</small>
            </div>
            <form action="profile.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input id="profilePicture" type="file" name="profilePicture" class="form-control" placeholder="Profile Picture" required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <input type="submit" id="updateProfile" class="btn btn-primary" name="updateProfile" value="Upload">

            </div>
            </form>
        </div>
    </div>
</div>