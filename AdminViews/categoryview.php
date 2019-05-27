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