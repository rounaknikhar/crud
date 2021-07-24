<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Address Book</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		html{
			font-family: 'Barlow', sans-serif;
		}
		.box-title{
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px gray;
			padding: 10px 0px;
		}
		.error-msg{
			color: #dc3545;
			font-weight: 600;
		}
		.success-msg{
			color: green;
			font-weight: 600;
		}
		
		.input {
		background-color: transparent;
		border: none;
		border-bottom: 1px solid #CCC;
		color: #555;
		box-sizing: border-box;
		height: 50px;
		left: 50%;
		margin: -25px 0 0 -100px;
		padding: 10px 0px;
		position: relative;
		top: 50%;
		width: 200px;

		
		}
		.input:focus {
			outline: none;    
		}

	</style>
</head>

<body>
<div class="jumbotron text-center">
  <h1>Address Book</h1>
  <p>A dynamic list of contacts using Ajax CRUD with PHP and MySQL database alongside search option</p> 
</div>
	<div class="container">
			<div  class="row justify-content-center">
				<div class="col-lg-6">
				<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" style="color:'black'; background-color:'white'"><i class="fa fa-2x fa-user-plus"></i></button>	
				</div>
				
				<div class="col-lg-6">	
					<input class="input" type="text" id="search" class="form-control" placeholder="Search contact" autocomplete="off">
				</div>
			</div>
	</div>
		<div class="container-fluid">	
			<div class="row mt-5" id="tbl_rec">
		
			</div>
		</div>
		
	
	
<!-- Insert Design Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="ins_rec">
	      <div class="modal-body">
			  	<div class="form-group">
					<label><b>First Name</b></label>
					<input type="text" name="firstName" class="form-control" placeholder="First Name">
					<span class="error-msg" id="msg_1"></span>
			  	</div>
			  	<div class="form-group">
					<label><b>Last Name</b></label>
					<input type="text" name="lastName" class="form-control" placeholder="Last Name">
					<span class="error-msg" id="msg_2"></span>
			  	</div>
				<div class="form-group">
					<label class="mr-3"><b>Gender</b></label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="Male" checked>
					  <label class="form-check-label" >Male</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="Female">
					  <label class="form-check-label" >Female</label>
					</div>
					<span class="error-msg"  id="msg_3"></span>
				</div>
				  <div class="form-group">
					<label><b>Email</b></label>
					<input type="text" name="email" class="form-control" placeholder="name@email.com">
					<span class="error-msg" id="msg_4"></span>
			  	</div> 
				<div class="form-group">
					<label><b>Street Address</b></label>
					<input type="text" name="streetAddress" class="form-control" placeholder="Street Address">
					<span class="error-msg" id="msg_5"></span>
			  	</div> 
				  <div class="form-group">
					<label><b>Post Code</b></label>
					<input type="text" name="postCode" class="form-control" placeholder="Post Code">
					<span class="error-msg" id="msg_6"></span>
			  	</div> 
				<div class="form-group"> 
					<label><b>Country</b></label>
					<select class="custom-select" name="country" id="country">
						<option value="" selected>Choose...</option>
						<option value="England">England</option>
						<option value="Scotland">Scotland</option>
						<option value="Wales">Wales</option>
						<option value="Northern Ireland">Northern Ireland</option>
					</select>
					<span class="error-msg" id="msg_7"></span>
			  	</div>
				
					
				<div class="form-group">
					<span class="success-msg" id="sc_msg"></span>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" id="close_click" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success" >Add Contact</button>
	      </div>
      </form>
    </div>
  </div>
</div>
	
<!-- End Insert Modal -->
		
<!-- Update Design Modal -->
	
<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalCenterTitle">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" id="updata">
      <div class="modal-body">
			  <div class="form-group">
					<label><b>First Name</b></label>
					<input type="text" name="firstName" class="form-control" placeholder="First Name" id="upd_1">
					<span class="error-msg" id="umsg_1"></span>
			  	</div>
			  	<div class="form-group">
					<label><b>Last Name</b></label>
					<input type="text" name="lastName" class="form-control" placeholder="Last Name" id="upd_2">
					<span class="error-msg" id="umsg_2"></span>
			  	</div>
				<div class="form-group">
					<label class="mr-3"><b>Gender</b></label>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="Male" id="upd_5" checked>
					  <label class="form-check-label" >Male</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="gender" value="Female" id="upd_6">
					  <label class="form-check-label" >Female</label>
					</div>
					<span class="error-msg"  id="umsg_3"></span>
				</div>
				  <div class="form-group">
					<label><b>Email</b></label>
					<input type="text" name="email" class="form-control" placeholder="name@email.com" id="upd_3">
					<span class="error-msg" id="umsg_4"></span>
			  	</div> 
				<div class="form-group">
					<label><b>Street Address</b></label>
					<input type="text" name="streetAddress" class="form-control" placeholder="Street Address" id="upd_4">
					<span class="error-msg" id="umsg_5"></span>
			  	</div> 
				  <div class="form-group">
					<label><b>Post Code</b></label>
					<input type="text" name="postCode" class="form-control" placeholder="Post Code" id="upd_7">
					<span class="error-msg" id="umsg_6"></span>
			  	</div> 
				<div class="form-group"> 
					<label><b>Country</b></label>
					<input type="text" class="form-control" name="country" id="upd_8">
					<span class="error-msg" id="umsg_7"></span>
			  	</div>
			<div class="form-group">
				<input type="hidden" name="dataval" id="upd_9">
				<span class="success-msg" id="umsg_8"></span>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancel">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form>	
    </div>
  </div>
</div>	
	
<!-- End Update Design Modal -->
	
<!-- Delete Design Modal -->
	
<div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalCenterTitle">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p>If you delete this contact, you won't be able to retrieve it.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="de_cancel" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="deleterec">Confirm Delete</button>
      </div>
    </div>
  </div>
</div>	
	
<!-- End Delete Design Modal -->
	
<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
	
$(document).ready(function (){
	$('#tbl_rec').load('record.php');

	$('#search').keyup(function (){
		var search_data = $(this).val();
		$('#tbl_rec').load('record.php', {keyword:search_data});
	});

	//insert Record

	$('#ins_rec').on("submit", function(e){
		e.preventDefault();
		$.ajax({

			type:'POST',
			url:'insprocess.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#close_click').trigger('click');
				}
				else if(json.status == 102){
					$('#sc_msg').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#msg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#msg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#msg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#msg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#msg_5').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 108){
					$('#msg_6').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 109){
					$('#msg_7').text(json.msg);
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}

			}

		});

	});

	//select data

	$(document).on("click", "button.editdata", function(){
		$('#umsg_1').text("");
		$('#umsg_2').text("");
		$('#umsg_3').text("");
		$('#umsg_4').text("");
		$('#umsg_5').text("");
		$('#umsg_6').text("");
		$('#umsg_7').text("");
		$('#umsg_8').text("");
		var check_id = $(this).data('dataid');
		$.getJSON("updateprocess.php", {checkid : check_id}, function(json){
			if(json.status == 0){
				$('#upd_1').val(json.firstName);
				$('#upd_2').val(json.lastName);
				$('#upd_3').val(json.email);
				$('#upd_4').val(json.streetAddress);
				$('#upd_7').val(json.postCode);
				$('#upd_8').val(json.country);
				$('#upd_9').val(check_id);
				if(json.gender == 'Male'){
					$('#upd_5').prop("checked", true);
				}
				else{
					$('#upd_6').prop("checked", true);
				}
			}
			else{
				console.log(json.msg);
			}
		});
	});

	//Update Record

	$('#updata').on("submit", function(e){
		e.preventDefault();

		$.ajax({

			type:'POST',
			url:'updateprocess2.php',
			data:$(this).serialize(),
			success:function(vardata){

				var json = JSON.parse(vardata);

				if(json.status == 101){
					console.log(json.msg);
					$('#tbl_rec').load('record.php');
					$('#ins_rec').trigger('reset');
					$('#up_cancel').trigger('click');
				}
				else if(json.status == 102){
					$('#umsg_6').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 103){
					$('#umsg_1').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 104){
					$('#umsg_2').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 105){
					$('#umsg_3').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 107){
					$('#umsg_4').text(json.msg);
					console.log(json.msg);
				}
				else if(json.status == 106){
					$('#umsg_5').text(json.msg);
					console.log(json.msg);
				}

				else{
					console.log(json.msg);
				}

			}

		});

	});

	//delete record

	var deleteid;

	$(document).on("click", "button.deletedata", function(){
		deleteid = $(this).data("dataid");
	});

	$('#deleterec').click(function (){
		$.ajax({
			type:'POST',
			url:'deleteprocess.php',
			data:{delete_id : deleteid},
			success:function(data){
				var json = JSON.parse(data);
				if(json.status == 0){
					$('#tbl_rec').load('record.php');
					$('#de_cancel').trigger("click");
					console.log(json.msg);
				}
				else{
					console.log(json.msg);
				}
			}
		});
	});


});

</script>

</body>
</html>
