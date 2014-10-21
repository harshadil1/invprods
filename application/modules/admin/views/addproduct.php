<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Product</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Product
        </div>            
        <!-- /.panel-heading -->
        <div class="panel-body">  
            <form role="form" name="add-prod" id="add-prod" action="<?php echo base_url(); ?>admin/products/addproduct" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Select (sub)Category:</label>
                    <select id="catselect" name="catselect" class="form-control required">
                        <?php
                        foreach ($catnsubcats as $key => $cats) {
                                echo '<optgroup label="'.$categorynames[$key].'">';
                            foreach($cats as $kk=>$cat){
                                echo '<option value="' . $key.'-'.$cat->scid . '">' . $cat->scname . '</option>';
                            }
                                echo '</optgroup>';
                        }
                        ?>
                    </select>
                    <label>Product Name:</label>
                    <input class="form-control required" id="prodname" name="prodname"  />
                    <label>Product Image:</label>
                    <input type="file" id="pimage" name="pimage" class="required">
                    <label>Short Description:</label>
                    <textarea name="shortdesc" id="shortdesc" class="form-control required">

                    </textarea>
                    <label>Description:</label>
                    <textarea name="description" id="description" class="form-control required">
            
                    </textarea>
                    <label>Priority:</label>
                    <input class="form-control required" id="prodpriority" name="prodpriority" value="0" />
                    <label>Active/Inactive:</label>
                    <select id="pactive" name="pactive" class="form-control required">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select><br/>
                    <div class="text-right">
                        <button type="submit" id="addprod" class="btn btn-primary">Add Product</button>
                        <button id="addcancl" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'shortdesc' );
    CKEDITOR.replace( 'description' );
    $(function(){
        $('#add-prod').validate();
    });
</script>