<?php

include_once('config.php');
$user_fun = new Userfunction();
$counter = 1;

if(isset($_POST['keyword']) && !empty(trim($_POST['keyword']))){

	$keyword = $user_fun->htmlvalidation($_POST['keyword']);

	$match_field['firstname'] = $keyword;
	$match_field['lastname'] = $keyword;
	$match_field['email'] = $keyword;
	$match_field['postCode'] = $keyword;
	$select = $user_fun->search("contact", $match_field, "OR");

}
else{

	$select = $user_fun->select("contact");

}


?>
				<table class="table table-dark table-hover" style="vertical-align: middle; text-align: center;">
				  <thead>
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Gender</th>
						<th scope="col">Email</th>
						<th scope="col">Street Address</th>
						<th scope="col">Post Code</th>
					  	<th scope="col">Country</th>
						<th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['firstName']; ?></td>
					  	<td><?php echo $se_data['lastName']; ?></td>
					  	<td><?php echo $se_data['gender']; ?></td>
						<td><?php echo $se_data['email']; ?></td>
						<td><?php echo $se_data['streetAddress']; ?></td>
						<td><?php echo $se_data['postCode']; ?></td>
						<td><?php echo $se_data['country']; ?></td>
						<td>
							<button type="button" class="btn btn-light editdata" data-dataid="<?php echo $se_data['id']; ?>" data-toggle="modal" data-target="#updateModalCenter"><i class="fa fa-1x fa-edit"></i></button>
							<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['id']; ?>" data-toggle="modal" data-target="#deleteModalCenter"><i class="fa fa-1x fa-times"></i></button>
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Result Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	