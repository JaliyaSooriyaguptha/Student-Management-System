$(document).ready(function () {
  fetch();
  //add
  $('#addnew').click(function () {
    $('#add').modal('show');
  });
  $('#addForm').submit(function (e) {
    e.preventDefault();
    var addform2 =  {


        sid:$('#add_sid').val(),
        email:$('#add_email').val(),
        firstName:$('#add_firstName').val(),
        lastName:$('#add_lastName').val(),
        dateOfBirth:$('#add_dateOfBirth').val(),
        center:$('#add_center').val(),
        semester:$('#add_semester').val(),
        cgpa:$('#add_cgpa').val(),
      };
      var addform =  JSON.stringify(addform2)
    $.ajax({
      url: 'create.php',
      type: 'POST',
      data:addform,
      success: function (response) {
        $('#add').modal('hide');
        console.log(response)

          $('#alert').show();
          $('#alert_message').html(response);
          fetch();
      },
      error: function () {
        console.log('err')
      },
    });
  });

  //edit
  $(document).on('click', '.edit', function(){

        $('#edit_id').val('');


        $('#edit_sid').val('');
        $('#edit_email').val('');
        $('#edit_firstName').val('');
        $('#edit_lastName').val('');
        $('#edit_dateOfBirth').val('');
        $('#edit_center').val('');
        $('#edit_semester').val('');
        $('#edit_cgpa').val('');

    var id = $(this).data('id');
    console.log(id)
    getDetails(id);
    $('#edit').modal('show');
  });
  $('#editForm').submit(function(e){
    e.preventDefault();
    var editform2 =  {
        id:$('#edit_id').val(),

        sid:$('#edit_sid').val(),
        email:$('#edit_email').val(),
        firstName:$('#edit_firstName').val(),
        lastName:$('#edit_lastName').val(),
        dateOfBirth:$('#edit_dateOfBirth').val(),
        center:$('#edit_center').val(),
        semester:$('#edit_semester').val(),
        cgpa:$('#edit_cgpa').val(),

      };
      var editform =  JSON.stringify(editform2)
    $.ajax({
      url: 'update.php',
      type: 'PUT',
      data:editform,
      success: function (response) {
        $('#edit').modal('hide');
        console.log(response)

          $('#alert').show();
          $('#alert_message').html(response);
        fetch()
      },
      error: function () {
        console.log('err')
      },
    });
  });
  //

  //delete
  //delete
  $(document).on('click', '.delete', function(){
    var id = $(this).data('id');
    getDetails(id);
    $('#delete').modal('show');
  });

  $('.id').click(function(){
    var id = $(this).val();
    console.log(id)

    $.ajax({
      method: 'POST', 
      url: 'delete.php',
      data: JSON.stringify({id:id}),
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('#alert').show();
          $('#alert_message').html(response.message);
        }
        else{
          $('#alert').show();
          $('#alert_message').html(response);
          
        }
        fetch();
        $('#delete').modal('hide');
      }
    });
  });
  //


});



function fetch() {
  $.ajax({

          type:"GET",
          dataType: "json",
          url:"read.php",
          success: function (response) {
          console.log(response)

          let tblData="";

          response.body.forEach(function (std) {
          tblData+=  `<tr>

          <td>${std.sid}</td>
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
    
      $('#tbody').html(tblData);
    },

  });
}
//single_read.php?id=51



function getDetails(id) {

  $.ajax({
    method: 'GET',
    url: 'single_read.php?id='+id,
     data: { id: id },
    dataType: 'json',
    success: function (response) {
      console.log(response)

      if (response.error) {
        $('#edit').modal('hide');
        $('#delete').modal('hide');
        $('#alert').show();
        $('#alert_message').html(response.message);
      } else {

        $('.id').val(response.id);
        $('#edit_id').val(response.id);
        $('#edit_sid').val(response.sid);
        $('#edit_email').val(response.email);
        $('#edit_firstName').val(response.firstName);
        $('#edit_lastName').val(response.lastName);
        $('#edit_dateOfBirth').val(response.dateOfBirth);
        $('#edit_center').val(response.center);
        $('#edit_semester').val(response.semester);
        $('#edit_cgpa').val(response.cgpa);


      }
    },
  });
}

