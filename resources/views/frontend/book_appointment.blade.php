@extends('frontend.layouts.master')
@section('title', 'Book Appointment') 
@section('content')
  <style type="text/css">
    .page {
  padding: 50px 80px;
  /*margin: auto;*/
  background: white;
  box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.6);
  /*max-width: 800px;
  min-width: 500px;*/
}

#terms-and-conditions {
  font-size: 15px; // default  
}
</style>
<div class="shop-main-wrapper section-padding page">
  <div class="row">
    <div class="col-md-6">
      <img src="{{ asset('assets/img/appointment_page.jpg') }}" alt="Albert" style="max-width: 75%;"></div>
    <div class="col-md-6">
      <div id="terms-and-conditions">
    <h1 style="margin-bottom: 10px;">Book Appointment</h1>
    <form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
      <div class="form-group row mt-5">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">First Name :</label></strong>
        </div>
        <div class="col-md-8">
          <input type="text" name="first_name" class="form-control" id="first_name" value="">
          <span id="error_first_name" class="has-error"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Last Name :</label></strong>
        </div>
        <div class="col-md-8">
          <input type="text" name="last_name" class="form-control" id="last_name" value="">
          <span id="error_last_name" class="has-error"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Email :</label></strong>
        </div>
        <div class="col-md-8">
          <input type="text" name="email" class="form-control" id="email" value="">
          <span id="error_email" class="has-error"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Appointment Type :</label></strong>
        </div>
        <div class="col-md-8">
          <input class="form-check-input" type="radio" name="appointment_type" id="face_to_face" value="0" checked>
          <label class="form-check-label" for="face_to_face">Face to Face</label>
          <input class="form-check-input ml-2" type="radio" name="appointment_type" id="call" value="1">
          <label class="form-check-label ml-4" for="call">Call</label>
          <span id="error_appointment" class="has-error"></span> 
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Phone Number :</label></strong>
        </div>
        <div class="col-md-8">
          <input type="number" name="phone_number" class="form-control" id="phone_number" value="">
          <span id="error_phone_number" class="has-error"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Appointment Date :</label></strong>
        </div>
        <div class="col-md-8">
          <input type="text" name="appointment_date" id="datepicker" />
          <span id="error_appointment_date" class="has-error"></span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-4">
          <strong><label for="staticEmail" class="col-form-label">Notes :</label></strong>
        </div>
        <div class="col-md-8">
          <textarea type="text" class="form-control" id="notes" name="notes" value="" placeholder=""></textarea>
          <span id="error_notes" class="has-error"></span>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div><!--  end #terms-and-conditions  -->
    </div>
  </div>
</div><!--  end .page  -->
@endsection
@push('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript">
  var dateToday = new Date(); 
  $("#datepicker").datepicker({
 format: "dd/mm/yyyy",
 autoclose: true,
 todayHighlight: true,
 startDate: dateToday,
 beforeShowDay: function(date){
     var d = date;
     var curr_date = d.getDate();
     var curr_month = d.getMonth() + 1; //Months are zero based
     var curr_year = d.getFullYear();
     var formattedDate = curr_date + "/" + curr_month + "/" + curr_year

     // if ($.inArray(formattedDate, booked_date) != -1){
     //   return {
     //      classes: 'activeClass'
     //   };
     // }
  return;
 }
});

  $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                first_name: {
                    required: true
                },
                last_name : {
                    required: true
                },
            },
            // Messages for form validation
            
            submitHandler: function (form) {

                var list_id = [];
                
                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);
                myData.append('roles', list_id);

                $.ajax({
                        url: '/book-appointment-save',
                        type: 'POST',
                        data: myData,
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function (data) {

                            if (data.type === 'success') {
                                swal("Done!", "It was succesfully done!", "success");
                                reload_table();
                                notify_view(data.type, data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                $("html, body").animate({scrollTop: 0}, "slow");
                                $('#myModal').modal('hide'); // hide bootstrap modal

                            } else if (data.type === 'error') {
                                if (data.errors) {
                                    $.each(data.errors, function (key, val) {
                                        $('#error_' + key).html(val);
                                    });
                                }
                                $("#status").html(data.message);
                                $('#loader').hide();
                                $("#submit").prop('disabled', false); // disable button
                                swal("Error sending!", "Please try again", "error");

                            }

                        }
                    });
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'
</script>
@endpush