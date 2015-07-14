<?php
$id = $_GET['id'];
$query = $this->db->query("select * from apartment where id = '$id'");
$row = $query->row();
?>
<div class="col-lg-12">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	<?php echo $row->name; ?>
	  	<div class="pull-right">
	  		<a href="<?php echo site_url('apartment') ?>" class="btn btn-warning btn-sm">Back</a>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-12" style="margin-bottom:20px;">
		<img src="<?php echo site_url('asset/upload/apartment/'.$row->images) ?>" style="width:100%; height:320px;" class="img-thumbnail">
	</div>

	<?php
	$category = $this->db->query("select * from apartment_category");
	foreach($category->result() as $row) {
		echo '
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">'.$row->name.'
						<div class="pull-right">
							<a href="'.site_url('apartment?p=category&id='.$id.'&category='.$row->id).'" class="btn btn-info btn-sm">Details</a>
						</div>
					</div>
				</div>
			</div>
		';
	}
	?>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('table').dataTable();
})
</script>