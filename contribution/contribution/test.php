 <?php
/*call the FPDF library*/
require("mpdf/mpdf.php");
         
          $pdf=new mPDF();
		// generate a simple PDF (for more info, see http://fpdf.org/en/tutorial/)
		
		$ns=$pdf->WriteHTML("<html>
	  	<head>
		<style>
		.table {
		    
		  border: 1px solid black;
		  font-size:14px;
		  font-family:TimesNewRoman-Bold_l;
		  color:#000;
		  
		}
		</style>
		</head>
		<body>
        <table width='550' height='400' class='table'>
		<tbody>
		  <tr>
		  <th><span style='font-size:16px;'>International Sahaja Yoga Seminar</span><br>
		     <span style='font-size:16px;'>Nirmal Nagari, Ganapatipule | December 24-26, 2021</span></th>
		  </tr>
		  <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><b>RECEIPT NO :</b>&nbsp;<u>$receiptNumber&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b>DATE :</b>&nbsp;<u>$currDate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><b>RECEIVED WITH THANKS FROM :</b>&nbsp;<u>$firstName $lastName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
			
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><b>ADDRESS :</b>&nbsp;<u>$address&nbsp;&nbsp;&nbsp;</u><b>MOBILE NO:</b>&nbsp;<u>$contact&nbsp;&nbsp;&nbsp;</u><b>PAN NO :</b>&nbsp;<u>$pan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><b>A SUM OF RUPEES :&nbsp;&nbsp;</b><u>$amountInWords ONLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		   </tr>
		    <tr>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
	        <td><b>PAID VIA:</b><u>$payInstrument</u><b>DATED:</b><u>$transactionDate</u><b>TRANSACTION ID:</b><u>$bankTransId</u></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><b>TOWARDS :</b>&nbsp;&nbsp;<u>$towards&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td><span style='width:30px;height:30px;border: 3px solid black;'><b>$amount&nbsp;/-</b></span></td>
			<td></td>
		  </tr>
		  <tr>
			<td><center>This is a computer generated receipt, hence no signature is required.</center></td>
			<td></td>
		  </tr>
		  
		</tbody></table>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
     	<p><strong>----------------- : For Office Use only (Not to be filled in by participants) : ----------------- </strong>
     	<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
     	<style type='text/css'>
		#table1 td  {
           border: 1px solid black;
          }
          #tr1  {
           border: 1px solid black;
          }
          
       </style>		
		<table width='500' class='table1' id='table1'>

		<tbody>
		  <tr>
		    <th id='tr1' width='5%'><strong>Sr.No</strong></th>    
			<th id='tr1' width='40%'><strong>Name</strong></th>
			<th id='tr1' width='15%'><strong>Gender</strong></th>
			<th id='tr1' width='20%'><strong>Badge Number</strong></th>
		  </tr>
		  <tr>
		    <td>1.</td>
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>2.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>3.</td> 
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>4.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>5.</td>     
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>6.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>7.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>8.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		  <tr>
		    <td>9.</td>    
			<td></td>
			<td></td>
			<td></td>
		  </tr>
		</tbody></table>  
		
        <p><strong>Note:1.Badges will be issued at Nirmal Nagri Site only on produce of above receipt & Second Vaccination Dose Certificate.</strong></p>
				
			
				<p>(1) Date on Badges issued:</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
				<p>(2) Badges Issuer Name & Sign:</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
				<p>(3) Badges Receiver Name,Sign & Mobile number:</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>

           
           
            </script>	
        </body>
	   </html>");
	

$pdf->Output();

?>