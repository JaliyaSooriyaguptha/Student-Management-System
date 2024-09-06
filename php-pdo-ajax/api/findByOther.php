<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pdo ajax</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div class="container">
	<h1 class="text-center"><a href="index.php" class="text-white"> Student Management System</a></h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

      <a href="index.php"><i class="fa fa-arrow-left"></i> Back </a>
			<form action="findByOther.php">
				<label>Filter</label>
				<select name="type">
					<?php 
						if($_GET['type']){
							echo '<option value="'.$_GET['type'].'">Filter By '.$_GET['type'].'</option>';
						}


					?>
					<option value="byFirstName">Filter By First Name</option>
					<option value="byLastName">Filter By Last Name</option>
					<option value="byCenter">Filter By Center</option>
					<option value="bySemester">Filter By Semester</option>
					<option value="byCgpa">Filter By CGPA</option>
				</select>
				<input type="text" name="search" placeholder="<?php echo $_GET['search'] ?>" value="<?php echo $_GET['search'] ?>">
				<input type="submit" name="submit">
				
			</form><hr>

			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>SID</th>
					<th>Email</th>
					<th>firstName</th>
					<th>lastName</th>
					<th>date of birth</th>
					<th>center</th>
					<th>semester</th>
					<th>gpa</th>
				</thead>
				<tbody id="tbodyFilter">
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
	$(document).ready(function () {
  fetch();

function fetch() {
  $.ajax({

          type:"GET",
          dataType: "json",
          url:"single_read_by_other.php?search=<?php echo $_GET['search'] ?>&type=<?php echo $_GET['type'] ?>",
          success: function (response) {
          console.log(response)

          let tblData="";

          response.body.forEach(function (std) {
          tblData+=  `<tr>

          <td>${std.id}</td>
          <td>${std.email}</td>
          <td>${std.firstName}</td>
          <td>${std.lastName}</td>
          <td>${std.dateOfBirth}</td>
          <td>${std.center}</td>
          <td>${std.semester}</td>
          <td>${std.cgpa}</td>

          <td>
            <button class="btn btn-success btn-sm edit" data-id="${std.id}"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button class="btn btn-danger btn-sm delete" data-id="${std.id}"><span class="glyphicon glyphicon-trash"></span> Delete</button>
          </td>

          
        </tr>`
            })
    
      $('#tbodyFilter').html(tblData);
    },

  });
}
})
</script>
</body>
</html>