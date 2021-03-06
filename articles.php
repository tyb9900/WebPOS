<?php
session_start();
require ("Classes/Article.php");
require ("Classes/Category.php");

if(!isset($_SESSION["username"]))
{
    header("location:index.php");
}

if(isset($_GET["article"]))
{
    $article = $_GET["article"];
    isset($_GET["price"]) ? $price = $_GET["price"] : $price=null;
    isset($_GET["categoryid"]) ? $catid = $_GET["categoryid"] : $catid=null;

    $art = new Article();
    $art->setArticle($article);
    $art->setPrice($price);
    $art->setCategory($catid);
    if(isset($_GET["AddArticle"])  && isset($_GET["categoryid"]) && isset($_GET["price"]))
    {
        $art->insert();
        echo "<script>alert(\"INSERTED\");</script>";
        //<?php
    }
    else if(isset($_GET["UpdateArticle"])  && isset($_GET["categoryid"]) && isset($_GET["price"]))
    {
        $art->update();
        echo "<script>alert(\"UPDATED\");</script>";
    }
    else if(isset($_GET["DeleteArticle"]))
    {
        $art->delete();
        echo "<script>alert(\"DELETED\");</script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Article</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

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
                <h2>Article</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Manage Articles</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br>
        <?php
        if($_SESSION["type"]=="Admin")
            include ("AdminViews/articleview.php");
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Categories Table</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Price</th>
                                    <th>Category</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $art = new Article();
                                $res = $art->retriveAll();
                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();
                                    foreach ($res as $r)
                                    {
                                        echo "<tr class=\"gradeX\">";
                                        echo "<td>".$r["Article"]."</td>";
                                        echo "<td>".$r["Price"]."</td>";
                                        echo "<td>".$r["Category"]."</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Article</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        include ("footer.php");
        ?>



    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>


    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Typehead -->
    <script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>

    <!-- Select2 -->
    <script src="js/plugins/select2/select2.full.min.js"></script>

    <script src="js/pages.js"></script>

    <!-- Page-Level Scripts -->
    <script>

        $(document).ready(function () {
            $(".select2_demo_3").select2({
                placeholder: "Select",
                allowClear: true
            });


        $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>



</body>
</html>
