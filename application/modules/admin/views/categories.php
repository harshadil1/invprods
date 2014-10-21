<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Categories</h1>

    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Categories
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Sub Categories</th>
                                <th>Priority</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories as $key => $cat) {
                                echo '<tr class="odd">
                                <td>' . $cat->cname . '</td>
                                <td>' . $cat->subcatcount . '</td>
                                <td>' . $cat->priority . '</td>
                                <td class="center">' . $cat->cupdated . '</td>
                                <td class="center">' . $statusdesc[$cat->status] . '</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Note</h4>
                    <p>Above list includes both active and inactive categories.</p>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>