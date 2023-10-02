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
.tab {
  display: none;
}
</style>
<div class="shop-main-wrapper section-padding page ">
  <div class="row">
    <div class="col-md-6">
      <img src="{{ asset('assets/img/appointment_page.jpg') }}" alt="Albert" class="appointment-img" style="max-width: 75%;"></div>
    <div class="col-md-6">
      <div id="terms-and-conditions">
    <form id='create' action="{{ URL::to('book-appointment-save') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
      @csrf
      <div class="tab">
        <h3 class="my-3">APPOINTMENT DETAILS</h3>
        <div class="form-group mt-4">
          <div class="col-md-4">
            <strong><label for="staticEmail" class="col-form-label">Date</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <div class="input-icon">
              <i class="fa fa-calendar" aria-hidden="true"></i>            
            </div>
            <input type="text" class="input-round-style" name="appointment_date" id="datepicker"  required="true" />
          </div>
          <span id="error_appointment_date" class="has-error"></span>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <strong><label for="staticEmail" class="col-form-label">Availabel time</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <div class="input-icon">
             <i class="fa fa-clock-o" aria-hidden="true"></i>            
            </div>
            <input type="text" class="input-round-style timepicker" name="appointment_time" id="appintment_time" required="false"/>
          </div>
          <span id="error_appointment_time" class="has-error"></span>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <strong><label for="staticEmail" class="col-form-label">Purpose Of Your Visit</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="radio" class="mr-1" id="discover" name="purpose" value="0" required="false" checked/>
            <label class="form-check-label" for="face_to_face">Discover Lebar Collections</label>
            <input type="radio" class="ml-2 mr-1" name="purpose" value="1" required="false" />
            <label class="form-check-label" id="care" for="face_to_face">Care Services</label>
            <span id="error_appointment_time" class="has-error"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-5">
            <strong><label for="staticEmail" class="col-form-label">Complementary Comments</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <textarea type="text" class="form-control" id="notes" name="notes" value="" placeholder="Please tell us more about the reason for your visit:" rows="5" required="false"></textarea>
            <span id="error_notes" class="has-error"></span>
          </div>
        </div>
      </div>
      <div class="tab">
        <div class="form-group">
          <div class="col-md-5">
            <strong><label for="staticEmail" class="col-form-label">Title</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="radio" class="mr-1" name="title" value="0" checked/>
            <label class="form-check-label" for="face_to_face">Mr.</label>
            <input type="radio" class="ml-2 mr-1" name="title" value="1" />
            <label class="form-check-label" for="face_to_face">Ms.</label>
            <span id="error_appointment_time" class="has-error"></span>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-5">
            <strong><label for="staticEmail" class="col-form-label">First Name</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="text" name="first_name" class="input-all-round-style" id="first_name" value="" required="true">
          </div>
          <span id="error_first_name" class="has-error"></span>
        </div>

        <div class="form-group">
          <div class="col-md-5">
            <strong><label for="staticEmail" class="col-form-label">Last Name</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="text" name="last_name" class="input-all-round-style" id="last_name" value="" required="true">
          </div>
          <span id="error_last_name" class="has-error"></span>
        </div>

        <div class="form-group">
          <div class="col-md-4">
            <strong><label for="staticEmail" class="col-form-label">Phone Number</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="number" name="phone_number" class="input-all-round-style" id="phone_number" value="" required="true">
          </div>
          <span id="error_phone_number" class="has-error"></span>
        </div>

        <div class="form-group">
          <div class="col-md-4">
            <strong><label for="staticEmail" class="col-form-label">Email Address</label></strong>
          </div>
          <div class="col-md-12 d-flex">
            <input type="text" name="email" class=" input-all-round-style" id="email" value="" required="true">
          </div>
          <span id="error_email" class="has-error"></span>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
          <label class="form-check-label" for="rememberPasswordCheck">
            I would also like to receive marketing information about Lebar Pvt. products or services. We may send you this infromation using e-mail, text, telephone, post, social media or through online advertising. You can ask us to stop marketing at any time.
          </label>
        </div>
      </div>
      <div class="tab">
        <h3 style="margin-bottom: 10px;">APPOINTMENT CONFIRMATION</h3>
        <p>Your appointment has been confirmed. Please find the details below:</p>
        <div class="text-center">
          <div>
            <p style="color: #f195ab">Boutique</p>
            <h6>The London Diamond Bourse,</h6>
            <h6>100 Hatton Garden,</h6>
            <h6>London, EC1N 8NX</h6>
          </div>

          <hr>
          <div class="mt-3">
            <p style="color: #f195ab">Date</p>
            <h6 id="appointment_confirm_date">30/08/2023</h6>
            <h6 id="appointment_confirm_time">5:00 PM</h6>
          </div>
          <hr>

          <div class="mt-3">
            <p style="color: #f195ab">Purpose of your visit</p>
            <h6 id="appointment_confirm_purpose">Discover Lebar collections</h6>
            <h6 id="appointment_confirm_note">fdskfh</h6>
          </div>
          <hr>
        </div>
      </div>
      <div style="overflow:auto;">
        <div style="text-align: center;">
          <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
          <button type="button" style="background: #f195ab !important; color: black !important;" class="btn btn-cart" id="nextBtn" onclick="nextPrev(1)">Continue</button>
        </div>
      </div>
     <!--  <div class="text-center">
        <button type="submit" style="background: #f195ab !important; color: black !important;" class="btn btn-cart" onclick="nextPrev(1)">Submit</button>
      </div> -->
    </form>
  </div><!--  end #terms-and-conditions  -->
    </div>
  </div>
</div><!--  end .page  -->
@endsection
@push('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script src="
https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.css
" rel="stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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
  $('.timepicker').timepicker({
     timeFormat: 'h:mm p',
    interval: 30,
    minTime: '10',
    maxTime: '5:00pm',
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
   //  var options = {
   //      now: "12:35", //hh:mm 24 hour format only, defaults to current time
   //      twentyFour: false,  //Display 24 hour format, defaults to false
   //      upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
   //      downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
   //      close: 'wickedpicker__close', //The close class selector to use, for custom CSS
   //      hoverState: 'hover-state', //The hover state class to use, for custom CSS
   //      title: 'Timepicker', //The Wickedpicker's title,
   //      showSeconds: false, //Whether or not to show seconds,
   //      timeSeparator: ' : ', // The string to put in between hours and minutes (and seconds)
   //      secondsInterval: 1, //Change interval for seconds, defaults to 1,
   //      minutesInterval: 1, //Change interval for minutes, defaults to 1
   //      beforeShow: null, //A function to be called before the Wickedpicker is shown
   //      afterShow: null, //A function to be called after the Wickedpicker is closed/hidden
   //      show: null, //A function to be called when the Wickedpicker is shown
   //      clearable: false, //Make the picker's input clearable (has clickable "x")
   //      minTime: '10',
   //      maxTime: '6:00pm',
   //  };
   // $('.timepicker').wickedpicker(options);

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
        });                 // <- end '.validate()'


  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  // if (n == 0) {
  //   document.getElementById("prevBtn").style.display = "none";
  // } else {
  //   document.getElementById("prevBtn").style.display = "inline";
  // }
  if (n == (x.length - 1)) {
    document.getElementById("appointment_confirm_date").innerHTML = $('#datepicker').val();
    document.getElementById("appointment_confirm_time").innerHTML = $('#appintment_time').val();
    if ($('#discover').is(":checked"))
    {
      document.getElementById("appointment_confirm_purpose").innerHTML = "Discover Lebar Collections";
    }else{
      document.getElementById("appointment_confirm_purpose").innerHTML = "Care Services";
    }
    document.getElementById("appointment_confirm_note").innerHTML = $('#notes').val();
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Countinue";
  }
  //... and run a function that will display the correct step indicator:
  // fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("create").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // console.log(y[0].required);
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" && y[i].required) {
      // add an "invalid" class to the field:
      $('#error_' + y[i].name).html("This filed is required");
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  // if (valid) {
  //   document.getElementsByClassName("step")[currentTab].className += " finish";
  // }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
@endpush