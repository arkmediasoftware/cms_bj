<?php
$id = $_GET['id'];
$category = $_GET['category'];

$query = $this->db->query("select * from apartment where id = '$id'");
$query2 = $this->db->query("select * from apartment_category where id = '$category'");
?>
<div class="col-lg-12">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	<?php echo $query->row('name'). ' - ' .$query2->row('name'); ?>
	  	<div class="pull-right">
	  		<a href="<?php echo site_url('apartment') ?>" class="btn btn-warning btn-sm">Back</a>
	  	</div>
	  </div>
	</div>
	<div class="col-lg-12" style="margin-bottom:20px;">
		<img src="<?php echo site_url('asset/upload/apartment/'.$query->row('images')) ?>" style="width:100%; height:320px;" class="img-thumbnail">
	</div>
	
	<div class="col-lg-12">	
		<table class="dataTable table-bordered">
			<thead>
				<tr>
					<th width="200px">Name</th>
					<th width="200px">Description</th>
					<th width="200px">Type</th>
					<th width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$level = (isset($_GET['level'])) ? $_GET['level'] : 0;
					$query3 = $this->db->query("select * from apartment_category_items where apartment_id = '".$query->row('id')."' and category_id = '".$query2->row('id')."' and level = '$level'");
					foreach($query3->result() as $row) {
						echo "
							<tr>
								<td><a href='".site_url('apartment?p=category&id='.$query->row('id').'&category='.$query2->row('id').'&level='.$row->id)."' title='Click to details'>".$row->name."</a></td>
								<td>".$row->description."</td>
								<td>".$row->menu_type."</td>
								<td>
									<a href=\"javascript:;\" title=\"Edit\" class='btn btn-xs btn-warning'>Edit</a>
									<a href=\"javascript:;\" title=\"Delete\" class='btn btn-xs btn-danger'>Delete</a>
								</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>

		<a href="<?php echo site_url('apartment/add?p=category&id='.$query->row('id').'&category='.$query2->row('id').'&level='.$level) ?>" class="btn btn-primary btn-sm">Add new item</a>
	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('table').dataTable();
})
</script>