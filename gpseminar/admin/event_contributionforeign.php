<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}

include_once 'header.php';

if(isset($_GET['eid']))
{
    $et=$_GET['eid'];
    if($et=="1")
    {
       $cpeventtype="&& Towards='International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule'";
       $head="for International Sahaja Yoga Seminar Nirmal Nagari, Ganapatipule";
    }
    else if($et=="2")
    {
        $cpeventtype="&& Towards='Only day Puja, Ganapatipule'";
        $head="for Only day Puja, Ganapatipule";
    }
}
else{
    $cpeventtype="";
    $head="";
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
<style>
	/* #example > table > td {
		white-space: nowrap;
	} */
	.hide {
  display: none;
}
</style>


<div class="col-md-12" style="padding-bottom: 10px;">
                <a href="event_contribution.php" class="btn-sm btn btn-info">Online Partcipants MIS Report</a>
                <a href="event_contributionoffline.php" class="btn-sm btn btn-info">Offline Digital Partcipants MIS Report</a>
                <a href="event_contributioncash.php" class="btn-sm btn btn-info">Offline Cash Partcipants MIS Report</a>
                <a href="event_contributionforeign.php" class="btn-sm btn btn-success">Foreign(NON-SAARC) Digital Partcipants MIS Report</a>
                <a href="event_contributionforeign_saarc.php" class="btn-sm btn btn-info ">Foreign(SAARC) Digital Partcipants MIS Report</a>
              </div>
              <br>


<div class="container-fluid">
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Transaction Information <?php echo $head;?></h6>
		<!-- <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" class="float-right" value="Export to Excel"> -->
	  </div>
				<?php
				   include_once '../dbConnection.php';
					$ToDate = "";
					$FromDate = "";
					$mobile = "";
					$email = "";
					$product = "";
					$queryCondition = "";
					$status = 'Success';
                    $part_type = 'All';
					$transaction_number = "";
					$payment_Mode = "";
					$pan_number= "";
					$adhar_number = "";
					$contributor_name = "";
					$participants_name = "";
					
					if(!empty($_POST["search"])) {
			
						 $ToDate = $_POST["post_to"];
						 $part_type = $_POST["part_type"];
						 $product = $_POST["product"];
						 
						if(!empty($_POST["post_at"])) {
							$FromDate = $_POST["post_at"];
						}
						else{
							$FromDate = date('Y-m-d');
						}
						
						$andParts = array();

						if(!empty($ToDate) && !empty($FromDate))
							 $andParts[] = "Transaction_start_time BETWEEN '". $FromDate ."' AND '" . $ToDate . "'  ";

						// if(!empty($part_type))
						// 	 $andParts[] = "participant_type = '$part_type'";

						
				// 		if (!empty($product))
				// 			$andParts[] = "Towards = '$product'";

						  $queryCondition .= " WHERE ".implode(" AND " , $andParts)." and paymenttype ='foreign_non_saarc'";

              $sql = "SELECT * from event_registration ".$queryCondition." and status='success' ORDER BY event_registration_id desc";
            //   echo $sql;
              $sql1 = "SELECT * from event_registration ".$queryCondition." and status='success' ORDER BY event_registration_id desc";
              
              $sql_count = "SELECT Count(participant_type) from event_registration as ereg, participants as part".$queryCondition." and status='success' and participant_type = '$part_type' and ereg.event_registration_id = part.event_registration_id";
              
             
              
					}
					else{
                        $status = "Success";
                        $sql = "SELECT * from event_registration WHERE Status = 'Success' and paymenttype ='foreign_non_saarc' $cpeventtype ORDER BY event_registration_id desc";
                        $sql1 = "SELECT * from event_registration WHERE Status = 'Success' and paymenttype ='foreign_non_saarc' $cpeventtype ORDER BY event_registration_id desc";
                        $sql_amount = "SELECT Sum(Amount) from event_registration WHERE Status = 'Success' and paymenttype ='foreign_non_saarc' $cpeventtype ORDER BY event_registration_id desc";
                        $sql_count = "SELECT Count(participant_type) FROM `participants` as part, event_registration as reg where reg.Status='success' and reg.paymenttype ='foreign_non_saarc' and reg.Payment_mode !='Cash' and reg.event_registration_id= part.event_registration_id";
                        $result_amount = $conn->query($sql_amount);
                        $row_amount = $result_amount->fetch_assoc();
                        $amount = 0;
                        $amount = $row_amount['Sum(Amount)'];
                    }

                    $result = $conn->query($sql);

                    $result1 = $conn->query($sql1);

					         
                    
                    $result_count = $conn->query($sql_count);
                    $row_count = $result_count->fetch_assoc();
                    $count = $row_count['Count(participant_type)'];



				?>
	  <div class="card-body">
	  
		<div class="card card-default">
		   
			<div class="card-header">
				Search  
			</div>
			<div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-6">


         <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Participants Count :</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                         Total Count :  <?php echo $count; ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Amount : </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                         Total Amount : <?php
                        
                      
                        $Date =  date("Y-m-d");
                        $sql = "SELECT count(*) as totalTransanction, sum(Amount) as totalAmount FROM event_registration where status = 'Success' and paymenttype ='foreign_non_saarc' ";
                        $resultr = $conn->query($sql);
                        if ($resultr->num_rows > 0) {
                          while($row = $resultr->fetch_assoc()) {
                         echo $totalAmountr = $row["totalAmount"];
                          } 
                        } 
                        else 
                        {
                          //echo "0 results";
                        }
                       
                        

                         ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                        </div>
                        <div class="col-md-6">
                        
                            <form name="frmSearch" method="post" action="#">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">From Date</label>
                                            <input type="date" class="form-control" value= "<?php echo $FromDate; ?>" placeholder="From Date" id="post_at" name="post_at"  />
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">To Date</label>
                                            <input type="date" class="form-control" value= "<?php echo $ToDate; ?>" placeholder="To Date" id="post_to" name="post_to"  />
                                        </div>
                                    </div>
    
                                    
                                </div>
                                <div class="row">
    
                                    <!--<div class="col-sm-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="exampleInputEmail1">Event Type</label>-->
                                    <!--        <select name="product"  class="form-control" id="product">-->
                                    <!--        <option value="Rahuri" <?php if($product == "Rahuri"){echo 'selected';}?> >Rahuri</option>-->
                                    <!--        </select>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-sm-6" style="display:none;">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Participant Type</label>
                                            <select name="part_type" value="" class="form-control" id="part_type">
                                            <option value="Adult" <?php if($part_type == 'Adult'){echo 'Adult';}?>>Adult</option>
                                            <option value="Yuva" <?php if($part_type == 'Yuva'){echo 'Yuva';}?>>Yuva</option>
                                            <option value="Child" <?php if($part_type == 'Child'){echo 'Child';}?>>Child</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="card-footer" style="background-color: #ecedf0;">

			<input type="submit" class="float-right" name="search" value="Search" > 
			</div>
		</div>
        </form>
		<br />
		<br />

    <input type="button" onclick="tableToExcel()" class="float-left mb-3 mx-2" value="Export Particpants MIS Report">
		
		<div class="table-responsive">
		 
		  <table class="table table-bordered table-sm" style="color:black;" border="1" id="example" width="100%" cellspacing="0">
			<thead>
			  <tr>
				<th>Date</th>
				<th>Participants</th>
				<th>Payer Details</th>
				<th style="width:40px">Transcation Details</th>
				<th>Amount</th>
				<th>Badges No</th>
			  </tr>
			</thead>
			<tbody>
			<?php
				
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId = $row['event_registration_id'];
			?>
				<tr>
					<td style='white-space: nowrap;'><?php echo $row["Transaction_start_time"]; ?></td>
					<td style='white-space: nowrap;'>
					<?PHP
					    $sql1 = "SELECT * FROM participants where event_registration_id = '$regId'";
						$result1 = $conn->query($sql1);
						//$countAdult =  $result1->fetch_assoc()['count(id)'];
						// if($result1->num_rows>0){
							$i = 1;
							while($row1 = $result1->fetch_assoc()) {
								?>
								<!-- echo $row1['name'].' (<b>'.$row1['participant_type'].'</b>)<br>'; -->
								<p><p style="color: red;"><b style="color: green;">Participants No.</b><?php echo $i; ?></p>
								<b>Name:</b><?php echo $row1["name"]; ?><br>
								
								<b>Type:</b><?php echo $row1["participant_type"]; ?><br>
								<b>Gender:</b><?php echo $row1["gender"]; ?><br>
                                    <?php if($row1["coupon_number"] != "") {?>
                                    <b>Badges No:</b><?php echo $row1["coupon_number"]; ?><br>
                                    <b>Badge Issuer Name:</b><?php echo $row1["badges_issuer"]; ?><br>
                                    <b>Badge Receiver Name:</b><?php echo $row1["badges_receiver"]; ?><br>
                                    <?php } ?>
								
								<?php
								$i++;
							}
					?>

					</td>
					<td style='white-space: nowrap;'>
						<b>Name: &nbsp&nbsp&nbsp</b><?php echo $row["Fname"]." ".$row["Lname"]; ?><br>
						<b>Mobile: &nbsp</b><?php echo $row["Mobile"]; ?><br>
						<b>Email: &nbsp&nbsp&nbsp&nbsp</b><?php echo $row["Email"]; ?><br>
						<b>Address: </b><?php echo $row["Address"]." ".$row["Pin"]; ?><br>
						<b>Passport No: </b><?php echo $row["Aadhar"]; ?><br>
						<b>PAN No: </b><?php echo $row["PAN"]; ?><br>
					</td>
					<td style='white-space: nowrap;'>
						<b>Transaction ID:</b> <?php echo $row["Transaction_id"]; ?><br>
						<b>Transaction No:</b><?php echo $row["Transaction_Number"]; ?> <br>
						<!-- <b>Transaction Amount:</b><?php echo $row["Amount"]; ?> <br> -->
						<b>Transaction Status:</b><p><?php echo $row["Status"]; ?> <br>
						<b>Transaction Towards:</b> <?php echo $row["Towards"]; ?><br>
						<b>Reciept No:</b> <?php echo $row["receiptNumber"]; ?><br>
						<b>Payment Mode:</b> <?php echo $row["Payment_mode"]; ?><br>
						
					</td>
					<td><?php echo $row["Amount"]; ?></td>
          <td>
          <?php
 if($foodstay == 'yes')
 {
          ?>
            <a href="addbadges.php?reg_id=<?php echo $row["event_registration_id"];?>" target = "blank" class="btn btn-primary" role="button">Add Badges No</a>
           <?php
 }
 ?>
          </td>
				</tr>
			<?php
			// $i++;
					}
				}
		
			?>
			</tbody>
		  </table>
		
		</div>



    
		<div class="table-responsive hide">
		<table class='table table-bordered hide' id="ex" width="100%" cellspacing="0">
			<thead>
      <tr>
				<th colspan="10" style="text-align: center"></th>
        <th colspan='8' style="text-align: center">Particpants Details</th>
				<!-- <th colspan='4' style="text-align: center">Yuva Particpants Details</th>
        <th colspan='4' style="text-align: center">Child Particpants Details</th> -->

			  </tr>
			  <tr>
				<th>Transection Date</th>
				<th>Transection no.</th>
				<th>Transection Status</th>
        <th>Payer Name</th>
				<th>Payer Mobile</th>
				<th>Payer Email</th>
        <th>Country</th>
        <th>City</th>
				<th>Reciept No</th>
        <th>Towards</th>


        <th>Particpants Name</th>
        <th>Gender</th>
        <th>Country</th>
        <th>City</th>
        <th>Type</th>
        <th>Badges No</th>
        <th>Badge Issuer Name</th>
        <th>Badge Receiver Name</th>

        <!-- <th>Yuva Particpants Name</th>
        <th>Gender</th>
        <th>City </th>
        <th>Centre</th>

        <th>Child Particpants Name</th>
        <th>Gender</th>
        <th>City </th>
        <th>Centre</th> -->
			  </tr>
			</thead>
			<tbody>
			<?php
				$result->data_seek(0);
				if ($result->num_rows > 0) {
					// $i = 1;
					while ($row = $result->fetch_assoc()) {

					$regId2 = $row['event_registration_id'];

          $sql2 = "SELECT * FROM participants where event_registration_id = '$regId2'";
          $result2 = $conn->query($sql2);
          while($row1 = $result2->fetch_assoc()) 
          {

            // $sql22 = "SELECT * FROM participants where event_registration_id = '$regId2' and participant_type ='Yuva'";
            // $result22 = $conn->query($sql22);
            // while($row12 = $result22->fetch_assoc()) 
            // {

            //   $sql222 = "SELECT * FROM participants where event_registration_id = '$regId2' and participant_type ='Child'";
            //   $result222 = $conn->query($sql222);
            //   while($row122 = $result222->fetch_assoc()) 
            //   {

            $RCount = "SELECT Count(*) FROM participants where event_registration_id = '$regId2'";
            $RCountresult = $conn->query($RCount)->fetch_assoc();			
            $countr=$RCountresult['Count(*)'];   
					
			?>

         <tr>
					<td><?php echo $row["Transaction_start_time"].' '.$row['time']; ?></td>
          <td><?php echo $row["Transaction_Number"]; ?></td>
					<td><?php echo $row["Status"]; ?></td>
          <td><?php echo $row["Fname"] ." ". $row["Lname"]; ?></td>
          <td><?php echo $row["Mobile"]; ?></td>
          <td><?php echo $row["Email"]; ?></td>
          <td><?php echo $row1["city"]; ?></td>
          <td><?php echo $row1["centre"]; ?></td>
          <td><?php echo $row["receiptNumber"]; ?></td>
          <td><?php echo $row["Towards"]; ?></td>
         
					

								<td><?php echo $row1["name"]; ?></td>
                <td><?php echo $row1["gender"]; ?></td>
								<td><?php echo $row1["city"]; ?></td>
								<td><?php echo $row1["centre"]; ?></td>
                <td><?php echo $row1["participant_type"]; ?></td>
                <td><?php echo $row1["coupon_number"]; ?></td>
                <td><?php echo $row1["badges_issuer"]; ?></td>
                <td><?php echo $row1["badges_receiver"]; ?></td>

                <!-- <td><?php echo $row12["name"]; ?></td>
                <td><?php echo $row12["gender"]; ?></td>
								<td><?php echo $row12["city"]; ?></td>
								<td><?php echo $row12["centre"]; ?></td>


                <td><?php echo $row122["name"]; ?></td>
                <td><?php echo $row122["gender"]; ?></td>
								<td><?php echo $row122["city"]; ?></td>
								<td><?php echo $row122["centre"]; ?></td> -->
					
         
				</tr>
			<?php
			// 	}
      // }
    }
      } 
      }
			?>
			</tbody>
		  </table>
		</div>
        

	  </div>
	</div>
</div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


 <script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script> 


  <script>
    $(document).ready(function () {
        $('#example').DataTable({
 			"pageLength": 20,
			"bLengthChange": false,
			"bFilter": true,
			"scrollX": true,
			dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
            ]
        });
    });
  </script>
  
<!-- /.container-fluid -->


<script type="text/javascript">
// var tableToExcel = (function() {
//   var uri = 'data:application/vnd.ms-excel;base64,'
//     , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="https://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
//     , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
//     , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
//   return function(table, name) {
//     if (!table.nodeType) table = document.getElementById(table)
//     var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
//     window.location.href = uri + base64(format(template, ctx))
//   }
// })()
</script> 

<script type="text/javascript">
var d = new Date();
var datestring = d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear() ;
var tableToExcel = (function () {
        var table = document.getElementById('ex');
        var encabezado = '<html><head><meta http-equiv="content-type"  content="text/plain; charset=UTF-8"/><style> table, td {border:thin solid black} table {border-collapse:collapse}</style></head><body><table>';
  
  var dataTable = table.innerHTML
  var piePagina = "</table></body></html>";
  var tabla = encabezado + dataTable + piePagina;
  var myBlob =  new Blob( [tabla] , {type:'text/html'});
  var url = window.URL.createObjectURL(myBlob);
  var a = document.createElement("a");
  document.body.appendChild(a);
  a.href = url;
  a.download = "Particpants MIS Report - "+datestring+".xls";
  a.click();
  
  setTimeout(function() {window.URL.revokeObjectURL(url);},0);

});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<?php
include_once 'footer.php';
?>