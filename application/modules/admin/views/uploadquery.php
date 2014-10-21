<div class="row">
    <div class="col-md-8">
        <div class="alert alert-success"><?php echo $this->session->flashdata('mes');?></div>
        <form name="submitquery" id="submitquery" method="post" action="<?php echo base_url();?>admin/admin/queryDB">
        <textarea name="query" id="query" cols="50" rows="10" class="required"></textarea><br>
        <button type="submit" class="btn-primary">Send</button>
        </form>
    </div>
</div>
<script type="text/javascript">
$('#submitquery').validate();
</script>