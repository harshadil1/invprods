<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Products</h1>
        
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="pull-right"><div class="text-right col-md-2"><a href="<?php echo base_url();?>admin/products/add" id="prod-add" class="btn btn-primary">Add Product</a></div></div>
            <div class="clearfix visible-xs"></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Products From All Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Priority</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($products as $key=>$product){
                                echo '<tr class="odd">
                                <td>'.$product->pname.'</td>
                                <td>'.$categorynames[$product->catid].'</td>
                                <td>'.$product->priority.'</td>
                                <td class="center">'.$product->pupdated.'</td>
                                <td class="center">'.$statusdesc[$product->pstatus].'</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Note</h4>
                    <p>Above list includes both active and inactive products.</p>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>