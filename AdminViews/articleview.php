

<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add New Article</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                </div>
            </div>
            <div class="ibox-content">
                <form role="form" action="" method="get">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <input type="text" placeholder="Article" id="article" name="article"
                                   class="form-control"  required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <input type="text" placeholder="Price" id="price" name="price"
                                   class="form-control"  required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <select class="select2_demo_3 form-group col-lg-12" name="categoryid" required="">
                                <option></option>
                                <?php


                                $cat = new Category();

                                $res = $cat->retriveAll();

                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();

                                    foreach ($res as $r)
                                    {
                                        echo "<option value=\"".$r["id"]."\">".$r["Name"]."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <input class="btn btn-success center-block" type="submit" value="Add Article" name="AddArticle">
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Update Article</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                </div>
            </div>
            <div class="ibox-content">
                <form role="form" action="" method="get">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <select class="select2_demo_3 form-control col-lg-12" name="article" required="">
                                <option></option>
                                <?php
                                $stock = new Article();

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
                            <input type="text" placeholder="Price" id="price" name="price"
                                   class="form-control"  required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12">
                            <select class="select2_demo_3 form-group col-lg-12" name="categoryid" required="">
                                <option></option>
                                <?php


                                $cat = new Category();

                                $res = $cat->retriveAll();

                                if($res->rowCount()>0)
                                {
                                    $res = $res->fetchAll();

                                    foreach ($res as $r)
                                    {
                                        echo "<option value=\"".$r["id"]."\">".$r["Name"]."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <input class="btn btn-success center-block" type="submit" value="Update Article" name="UpdateArticle">
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add New Article</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>

                </div>
            </div>
            <div class="ibox-content">
                <form role="form" action="" method="get">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <select class="select2_demo_3 form-control col-lg-12" name="article" required="">
                                <option></option>
                                <?php
                                $stock = new Article();

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

                    <input class="btn btn-success center-block" type="submit" value="Delete Article" name="DeleteArticle">
                </form>
            </div>
        </div>
    </div>
</div>