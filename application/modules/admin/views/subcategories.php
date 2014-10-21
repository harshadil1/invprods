<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sub Categories</h1>

    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <p class="text-success"><?php echo $this->session->flashdata('sxmsg'); ?></p>
                <p class="text-danger"><?php echo $this->session->flashdata('errmsg'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="pull-right"><div class="text-right col-md-2"><button id="subcat-add" class="btn btn-primary">Add Sub Category</button></div></div>
            <div class="clearfix visible-xs"></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                All Sub Categories
            </div>            
            <!-- /.panel-heading -->
            <div class="panel-body">                                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Sub Category Name</th>
                                <th>Category</th>
                                <th>Products Count</th>
                                <th>Priority</th>
                                <th>Last Updated</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($subcategories as $key => $scat) {
                                echo '<tr class="odd">
                                <td>' . $scat->scname . '</td>
                                <td>' . (isset($categorynames[$scat->cid]) ? $categorynames[$scat->cid] : '') . '</td>
                                <td>' . number_format($scat->pcount) . '</td>
                                <td>' . $scat->priority . '</td>
                                <td class="center">' . $scat->scupdated . '</td>
                                <td class="center">' . $statusdesc[$scat->scstatus] . '</td>
                                <td>
                                <button class="subcedit-btn" id="subcedit' . $scat->scid . '"><i class="fa fa-pencil fa-fw"></i></botton>
                                </td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Note</h4>
                    <p>Above list includes both active and inactive Sub Categories.</p>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<div id="divsubcatadd" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Add Sub Category
                </h4>
            </div>
            <div class="modal-body">
                <form role="form" name="add-subcat" id="add-subcat" action="<?php echo base_url(); ?>admin/subcategories/add" method="post">
                    <div class="form-group">
                        <label>Category:</label>
                        <select id="catselect" name="catselect" class="form-control required">
                            <?php
                            foreach ($categorynames as $key => $cat) {
                                echo '<option value="' . $key . '">' . $categorynames[$key] . '</option>';
                            }
                            ?>
                        </select>
                        <label>Sub Category Name:</label>
                        <input class="form-control required" id="subcatname" name="subcatname"  />
                        <label>Priority:</label>
                        <input class="form-control required" id="subpriority" name="subpriority" value="0" />
                        <label>Active/Inactive:</label>
                        <select id="sactive" name="sactive" class="form-control required">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select><br/>
                        <div class="text-right">
                            <button type="submit" id="addscat" class="btn btn-primary">Add Sub Category</button>
                            <button id="addcancl" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="divsubcatedit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">
                    Edit Sub Category
                </h4>
            </div>
            <div class="modal-body">
                <form role="form" name="edit-subcat" id="edit-subcat" action="<?php echo base_url(); ?>admin/subcategories/edit" method="post">
                    <div class="form-group">
                        <label>Category:</label>
                        <select id="ecatselect" name="catselect" class="form-control">
                            <option>Select</option>
                            <?php
                            foreach ($categorynames as $key => $cat) {
                                echo '<option value="' . $key . '">' . $categorynames[$key] . '</option>';
                            }
                            ?>
                        </select>
                        <label>Sub Category Name:</label>
                        <input class="form-control" id="esubcatname" name="subcatname" />
                        <label>Priority:</label>
                        <input class="form-control" id="esubpriority" name="subpriority" value="0" />
                        <label>Active/Inactive:</label>
                        <select id="esactive" name="sactive" class="form-control">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select><br/>
                        <div class="text-right">
                            <button type="submit" id="editscat" class="btn btn-primary">Edit Sub Category</button>
                            <button id="editcancl" class="btn btn-danger">Cancel</button>
                        </div>
                        <input type="hidden" id="scid" name="scid" value=""/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var baseURL = '<?php echo base_url(); ?>';
    $('#subcat-add').click(function (){
        $('#divsubcatadd').modal({
            keyboard: true
        });
    });
    $('#editcancl').click(function (e){
        e.preventDefault();
        $('#divsubcatedit').modal('hide');
    });
    $('#addcancl').click(function (e){
        e.preventDefault();
        $('#divsubcatadd').modal('hide');
    });
    $('.subcedit-btn').click(function (){
        var subcid = $(this).attr('id').replace('subcedit','');
        if(subcid!=''){
            $.ajax({
                cache: false,
                type: 'POST',
                dataType: 'json',
                data:{
                    scid: subcid
                },
                url: baseURL+'admin/subcategories/subcateditAjax',
                success: function(data){
                    if(data!=''){
                        if(data.error){
                            alert(data.error);
                        }else{
                            $('#scid').val(data.scid);
                            $('#ecatselect').val(data.cid);
                            $('#esubcatname').val(data.scname);
                            $('#esubpriority').val(data.priority);
                            $('#esactive').val(data.scstatus);                            
                            $('#divsubcatedit').modal({
                                keyboard: true
                            });
                        }
                    }
                }
            });
        }
    });
    $(function () {
        $('#add-subcat').validate();
    });
</script>