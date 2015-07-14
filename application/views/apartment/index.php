<div class="col-lg-12">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	Apartment List
	  	<div class="pull-right">
	  		<a href="<?php echo site_url('apartment/add') ?>" class="btn btn-primary btn-sm">Add</a>
	  	</div>
	  </div>
	</div>
	<table class="dataTable table-bordered">
		<thead>
			<tr>
				<th width="200px">Name</th>
				<th width="200px">Images</th>
				<th>Address</th>
				<th width="100px">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = $this->db->query("select * from apartment");
				foreach($query->result() as $row) {
					echo "
						<tr>
							<td><a href='".site_url('apartment?p=details&id='.$row->id)."' title='Click to details'>".$row->name."</a></td>
							<td><a href='javascript:;' title='Click to show images'>".$row->images."</a></td>
							<td>".$row->address."</td>
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
</div>


<script type="text/javascript">
$(document).ready(function(){
	$('table').dataTable();
})
</script>