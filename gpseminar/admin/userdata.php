<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}


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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
                <table id="example" class="display border" style="width:100%">
                    <thead class="border">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>City</th>
                        </tr>
                    </tfoot>
                    <script>
                        function myedit(id){
                            alert(id);
                        };
                        function mydelete(id){
                            alert(id);
                        }
                    </script>
                </table>
            </div>
            <script>
                /* Formatting function for row details - modify as you need */
                function format(d) {
                    // `d` is the original data object for the row
                    // alert(d);
                    return (
                        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                        '<td>Full name:</td>' +
                        '<td>' +
                        d.name +
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Action</td>' +
                        '<td>' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick=myedit('+d.id+') class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>'+
                        '&nbsp&nbsp&nbsp&nbsp'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" onclick=mydelete('+d.id+') class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg>'+
                        '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>Change Password:</td>' +
                        '<td><a href="#">click here</a></td>' +
                        '</tr>' +
                        '</table>' 
                    );
                }
                $(document).ready(function () {
                    var table = $('#example').DataTable({
                        ajax: 'server_processing2.php',
                        columns: [
                            {
                                className: 'dt-control',
                                orderable: false,
                                data: null,
                                defaultContent: '',
                            },
                            { data: 'name' },
                            { data: 'email' },
                            { data: 'mobile' },
                            { data: 'city' },
                        ],
                        // order: [[1, 'asc']],
                    });
                
                    // Add event listener for opening and closing details
                    $('#example tbody').on('click', 'td.dt-control', function () {
                        var tr = $(this).closest('tr');
                        var row = table.row(tr);
                
                        if (row.child.isShown()) {
                            // This row is already open - close it
                            row.child.hide();
                            tr.removeClass('shown');
                        } else {
                            // Open this row
                            row.child(format(row.data())).show();
                            tr.addClass('shown');
                        }
                    });
                });
            </script>
        </div>
      </div>
    </div>
</div>

