<?php

require ("Classes/Category.php");

if(isset($_GET["categoryid"]))
{
    $id = $_GET["categoryid"];
    isset($_GET["categoryname"]) ? $name = $_GET["categoryname"] : $name="";
    $cat = new Category();
    $cat->setid($id);
    $cat->setName($name);
    if(isset($_GET["AddCategory"]))
    {
        $cat->insert();
        echo "<script>alert(\"INSERTED\");</script>";
        //<?php
    }
    else if(isset($_GET["UpdateCategory"]))
    {
        $cat->update();
        echo "<script>alert(\"UPDATED\");</script>";
    }
    else if(isset($_GET["DeleteCategory"]))
    {
        $cat->delete();
        echo "<script>alert(\"DELETED\");</script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Category</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div id="wrapper">
    <?php
    include ("adminsidebar.php");
    ?>

    <div id="page-wrapper" class="gray-bg">

        <?php
        require ("navbar.php");
        ?>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Category</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <strong>Add Category</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New Category</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="categories.php" method="get">
                            <div class="row">
                            <div class="form-group">
                                <input type="text" placeholder="Category Id" id="categoryid" name="categoryid"
                                       class="form-control"  required="">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group">
                                <input type="text" placeholder="Category Name" id="categoryname" name="categoryname"
                                       class="form-control" required="">
                            </div>
                            </div>
                            <input class="btn btn-success center-block" type="submit" value="Add Category" name="AddCategory">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>UpdateCategory</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="categories.php" method="get">
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" placeholder="Category Id" id="categoryid" name="categoryid"
                                           class="form-control"  required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" placeholder="Category Name" id="categoryname" name="categoryname"
                                           class="form-control" required="">
                                </div>
                            </div>
                            <input class="btn btn-success center-block" type="submit" value="Update Category" name="UpdateCategory">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Delete Category</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form" action="categories.php" method="get">
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" placeholder="Category Id" id="categoryid" name="categoryid"
                                           class="form-control"  required="">
                                </div>
                            </div>
                            <input class="btn btn-success center-block" type="submit" value="Delete Category" name="DeleteCategory">
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                                    <th>ID</th>
                                    <th>Name</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $cat = new Category();
                                $res = $cat->retriveAll();
                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();
                                    foreach ($res as $r)
                                    {
                                        echo "<tr class=\"gradeX\">";
                                        echo "<td>".$r["id"]."</td>";
                                        echo "<td>".$r["Name"]."</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

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


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
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
