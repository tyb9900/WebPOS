<?php
session_start();
require ("Classes/User.php");

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | User Gallery</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body>
<div id="wrapper">
    <?php
    include("sidebar.php");
    ?>

    <div id="page-wrapper" class="gray-bg">

        <?php
        require ("navbar.php");
        ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Users</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Users Gallery</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>User Gallery</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">


                        <?php
                        $user = new User();
                        $res = $user->getUsers();
                        if($res->rowCount()>0)
                        {echo " <div class=\"lightBoxGallery\">";
                            $res = $res->fetchAll();
                            foreach ($res as $r)
                            {
                                echo "
                            <a href=\"".$r["img"]."\" title=\"".$r["username"]."\" data-gallery=\"\"><img height='200' width='200' src=\"".$r["img"]."\"></a>
                            ";
                            }
                            echo "<div id=\"blueimp-gallery\" class=\"blueimp-gallery\">
                                <div class=\"slides\"></div>
                                <h3 class=\"title\"></h3>
                                <a class=\"prev\">‹</a>
                                <a class=\"next\">›</a>
                                <a class=\"close\">×</a>
                                <a class=\"play-pause\"></a>
                                <ol class=\"indicator\"></ol>
                            </div>

                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
//        echo "<div>
//                                <div>
//                                    <a href=\"#\">
//                                        <span class=\"corner\"></span><div class=\"image\">
//                                            <img alt=\"image\" width='400' height='400' class=\"img-responsive\" src=\"".$r["img"]."\">
//                                        </div>
//                                    </a>
//
//                                </div>
//                            </div>
//";
        include ("footer.php");
        ?>



    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>


    <!-- blueimp gallery -->
    <script src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>



    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>


</body>
</html>