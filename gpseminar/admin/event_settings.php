<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}
include_once 'header.php';
?>

<style>
a.more {
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#event_start" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#event_end" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script> 
  <script>
    $( function() {
        $( ".datepicker" ).datepicker();
    } );
    $( document ).ready(function() {
        $("#event_start").change(function () {
        startdate = $(this).val();
        // alert(startdate)
        document.getElementsByName('cutoff1')[0].placeholder = startdate;
        })
        $("#cutoff2").change(function () {
            cutoff2 = $(this).val();
            var cutoff2Date = new Date(cutoff2)
            let end = document.getElementById("event_end").value;
            var enddate = new Date(end);
            if(cutoff2Date > enddate ){
                alert("Enter Valid Date");
                document.getElementsByName('cutoff2')[0].value ="";
            }
        })
        
    });
  </script>
<div class="container-fluid">
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Event Control</h6>
	  </div>
	  <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="event_settingsback.php" method="POST">
                <div class="py-3">
                    <h8 class="font-weight-bold text-primary">Event Details</h8>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="event_name" class="col-sm-3 col-form-label">Event Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="event_name" class="form-control" id="event_name" placeholder="Event Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="event_date" class="col-sm-3 col-form-label">Event Date</label>
                                <div class="col-sm-9">
                                    <input type="text" name="event_date" class="form-control datepicker" id="event_date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="contribution_towards" class="col-sm-3 col-form-label">Contribution towards</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contribution_towards" class="form-control" id="contribution_towards" placeholder="Contribution towards" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="event_start" class="col-sm-3 col-form-label">Event Start</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="event_start" id="event_start" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="venue" class="col-sm-3 col-form-label">Venue</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="venue" id="venue" placeholder="Venue" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="event_end" class="col-sm-3 col-form-label">Event End</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control event_end" name="event_end" id="event_end" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="py-3">
                        <h8 class="font-weight-bold text-primary">Event Settings For Frist Cutoff</h8>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="adult1" class="col-sm-3 col-form-label">Adults</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="adult1" id="adult1" placeholder="Price for Adults" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="cutoff1" class="col-sm-3 col-form-label">Cutoff Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" name="cutoff1" id="cutoff1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="yuva1" class="col-sm-3 col-form-label">Yuva</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="yuva1" id="yuva1" placeholder="Price for Yuva" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="child1" class="col-sm-3 col-form-label" name="child1">Child</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="child1" id="child1" placeholder="Price for Child" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="py-3">
                        <h8 class="font-weight-bold text-primary">Event Settings For Second Cutoff</h8>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="adult2" class="col-sm-3 col-form-label">Adults</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="adult2" id="adult2" placeholder="Price for Adults" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label for="cutoff2" readonly class="col-sm-3 col-form-label">Cutoff Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" name="cutoff2" id="cutoff2" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="yuva2" class="col-sm-3 col-form-label">Yuva</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="yuva2" id="yuva2" placeholder="Price for Yuva" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="child2" class="col-sm-3 col-form-label">Child</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="child2" id="child2" placeholder="Price for Child" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

