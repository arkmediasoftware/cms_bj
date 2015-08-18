<div class="col-lg-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Add Apartment
    </div>
  </div>
  <form class="form-horizontal" id="add_apartment" method="post" action="<?php echo site_url('apartment/ajax/add') ?>">
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name" placeholder="Apartment Name" required>
      </div>
    </div>
    <div class="form-group">
      <label for="images" class="col-sm-2 control-label">Images</label>
      <div class="col-sm-10">
        <input type="file" id="images" name="imagefile" required>
      </div>
    </div>
    <div class="form-group">
      <label for="description" class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="description" id="description"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <a href="javascript:;" class="btn btn-info open-maps">Open Maps</a>
      </div>
    </div>
    <div class="form-group">
      <label for="address" class="col-sm-2 control-label">Address</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="address" id="address"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="address" class="col-sm-2 control-label">Maps Coordinate</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="maps_cordinate" id="maps_cordinate">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>  

<script type="text/javascript">
$(document).ready(function(){
  $("#add_apartment").validate();
  $("#add_apartment").ajaxForm({
    success:function(data){
      window.location = "<?php echo site_url('apartment') ?>";
      $('button[type=submit]').removeClass('disabled').html('Submit');
    },
    beforeSubmit:function(){
      $('button[type=submit]').addClass('disabled').html('Submitting...');
    },
    error:function(){
      alert('Error Submitting')
    }
  });

  $(".open-maps").colorbox({
    iframe:true,
    width:900,
    height:600,
    href:'<?php echo site_url('maps') ?>'
  })
})
</script>