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
<button id="delByEmailBtn" class="btn btn-danger float-right" style="float: right;">Delete </button>
            <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
              <button class="close"><span aria-hidden="true">&times;</span></button>
                <span id="alert_message"></span>
            </div>  
      <form action="findByEmail.php">
        <label>Find by email</label>
        <input type="email" name="search" placeholder="email">
        <input type="submit" name="submit">
        
      </form><hr>


<div class="panel panel-default">
  <div class="panel-heading">Email : <span id="em"></span></div>
  <div class="panel-body"> 
  	<div id="content-main"></div>
  </div>
</div>

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
	getDetailsByEmail()


function getDetailsByEmail() {
	

  $.ajax({
    method: 'GET',
    url: "single_read_by_email.php?id=<?php echo $_GET['search'] ?>",
     data: { search: "<?php echo $_GET['search'] ?>" },
    dataType: 'json',
    success: function (response) {
      console.log(response)
 $('#em').text(response.id)
 $('.page-header').text(response.firstName+' '+response.lastName)
 $('#content-main').html("<table class='table'>     <tr><td>First Name</td><td>"+response.firstName+"</td></tr>       <tr><td>Last Name</td><td>"+response.lastName+"</td></tr>       <tr><td>Email </td><td>"+response.id+"</td></tr>       <tr><td>Center </td><td>"+response.center+"</td></tr>       <tr><td>Semester </td><td>"+response.semester+"</td></tr>        <tr><td>CGPA </td><td>"+response.cgpa+"</td></tr>    </table>")

      if (response.error) {
        $('#edit').modal('hide');
        $('#delete').modal('hide');
        $('#alert').show();
        $('#alert_message').html(response.message);
      } else {

        $('.id').val(response.id);
        $('#edit_id').val(response.id);
        $('#edit_firstName').val(response.firstName);
        $('#edit_lastName').val(response.lastName);
        $('#edit_dateOfBirth').val(response.dateOfBirth);
        $('#edit_center').val(response.center);
        $('#edit_semester').val(response.semester);

      }
    },
  });
}



  $(document).on('click', '#delByEmailBtn', function(){
    var id = $(this).data('id');
    getDetails(id);
    $('#deleteEmail').modal('show');
  });


  $('#delByEmail').click(function(){
    var id = $(this).val();
    console.log(id)

    $.ajax({
      method: 'POST', 
      url: 'deleteByEmail.php',
      data: JSON.stringify({id:"<?php echo $_GET['search'] ?>"}),
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else{
          $('#alert').show();
          $('#alert_message').html("<a href='index.php'>back</a> "+response);
          fetch();
        }
        
        $('#deleteEmail').modal('hide');


 $('#content-main').html("<table class='table'> <tr><td>Deleted</td></tr>  </table>")

      }
    });
  });
  //



});


</script>
</body>
</html>