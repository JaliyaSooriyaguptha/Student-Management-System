<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pdo ajax</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

			<form action="findByOther.php">
				<label>Filter</label>
				<select name="type" class="form-control" style="margin-bottom: 5px;">
					<option value="byFirstName">Filter By First Name</option>
					<option value="byLastName">Filter By Last Name</option>
					<option value="byCenter">Filter By Center</option>
					<option value="bySemester">Filter By Semester</option>
					<option value="byCgpa">Filter By CGPA</option>
				</select>
				<input type="text" name="search" placeholder="Search..." class="form-control">
				<input type="submit" name="submit" class="btn btn-primary">
				
			</form><hr>
			<form action="findByEmail.php">
				<label>Find by email</label>
				<input type="email" name="search" placeholder="email" class="form-control">
				<input type="submit" name="submit" class="btn btn-primary">
				
			</form><hr>

</div>
<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Open Filter</button>  
</div>


<div class="container">
	<h1 class="text-center"><a href="index.php" class="text-white"> Student Management System</a></h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

			<button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</button>
            <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
            	<button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div>  
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>SID</th>
					<th>email</th>
					<th>firstName</th>
					<th>lastName</th>
					<th>date of birth</th>
					<th>center</th>
					<th>semester</th>
					<th>gpa</th>
				</thead>
				<tbody id="tbody">
					<tr><td colspan="9" align="center">Not Found</td></tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modals -->
<?php include('modal.html'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="app.js"></script>
<script type="text/javascript">
	
</script>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>