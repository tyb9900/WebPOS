<?php

require ("Classes/Stock.php");
require ("Classes/Article.php");
session_start();
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS | Sale</title>

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
    include "sidebar.php";
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
                        <strong>Add Sale</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add Article</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <form role="form">

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <select class="select2_demo_3 form-control col-lg-12" name="article" id="article" required="">
                                        <option></option>
                                        <?php
                                        $stock = new Stock();

                                        $res = $stock->retriveAll();

                                        if($res->rowCount()>0)
                                        {
                                            $res = $res->fetchAll();

                                            foreach ($res as $r)
                                            {
                                                echo "<option value=\"".$r["Article"]."\">".$r["Article"]."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <input type="text" placeholder="Pairs" id="pairs" name="pairs"
                                           class="form-control"  required="">
                                </div>
                            </div>
                            <button class="btn btn-success center-block" name="AddArticle" id="AddArticle" type="button">Add Article</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Cart</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="cart">
                                <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Pairs</th>
                                    <th>Amount</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Article</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Pairs</th>
                                    <th>Amount</th>

                                </tr>
                                </tfoot>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                            <div class="form-group">
                                <label>Total Pairs</label>
                                <input type="text" placeholder="Total Pairs" id="totalPairs" name="totalpairs" value="0"
                                       class="form-control" readonly required="">
                            </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Total Amount</label>
                                    <input type="text" placeholder="Total Amount" id="totalAmount" name="totalAmount" value="0"
                                           class="form-control"  readonly required="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary col-lg-12" style="margin-top: 9%" id="checkout">Check Out</button>
                            </div>
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
    <script src="js/sale.js"></script>

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
                placeholder: "Select a Article",
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
