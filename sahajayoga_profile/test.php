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
		  <th><span style='font-size:15px;'>The Life Eternal Trust, Mumbai</span><br>
		     <span style='font-size:15px;'>International Sahaja Yoga Seminar</span><br>
		     <span style='font-size:15px;'>Nirmal Nagari, Ganapatipule | December 24-26, 2021</span></th>
		  </tr>
		  <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>RECEIPT NO :</b>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b>DATE :</b>&nbsp;<u>$currDate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>RECEIVED WITH THANKS FROM :</b>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
			
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>CITY/CENTER :</b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b>MOBILE NO:</b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;<b>PAN NO :</b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>A SUM OF RUPEES :&nbsp;&nbsp;</b><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
		   </tr>
		    <tr>
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
	        <td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>PAID VIA:</b>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b>DATED:</b>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><b>TRANSACTION ID:</b>&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><p><b>TOWARDS :</b>&nbsp;&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p></td>
		  </tr>
		   <tr>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  </tr>
		  <tr>
			<td style='border-bottom:2px solid white;white-space: nowrap;width: 1px;'><span style='width:30px;height:30px;border: 3px solid black;'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/-</b></span></td>
			<td></td>
		  </tr>
		  <tr>
			<td><center>This is a computer generated receipt, hence no signature is required.</center></td>
			<td></td>
		  </tr>
		  
		</tbody></table>
     	<p><b>----------------- : For Office Use only (Not to be filled in by participants) : ----------------- </b>
     	<style type='text/css'>
		#table1 td  {
           border: 1px solid black;
          }
          #tr1  {
           border: 1px solid black;
          }
          
       </style>		
		<table width='450' class='table1' id='table1'>

		<tbody>
		  <tr>
		    <th id='tr1' width='20%'><strong></strong></th>    
			<th id='tr1' width='30%'><strong>Name</strong></th>
			<th id='tr1' width='25%'><strong>Sahaja Marriage Badge No.</strong></th>
			<th id='tr1' width='30%'><strong>Receiver's Signature & Mobile No</strong></th>
		  </tr>
		  <tr>
		    <td>Groom</td>
		    <td>$Gname</td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>Bride</td>    
			<td>$Bname</td>
			<td></td>
			<td></td>
		  </tr> 
		</tbody></table>  
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
			<th id='tr1' width='40%'><strong>Guest Participant's Details</strong></th>
			<th id='tr1' width='20%'><strong>Gender</strong></th>
			<th id='tr1' width='20%'><strong>Badge Number</strong></th>
			<th id='tr1' width='30%'><strong>Receiver's Signature & Mobile No</strong></th>
		  </tr>
		  <tr>
		    <td>1.</td>
		    <td>$guest_1</td>
			<td>$item_G1</td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>2.</td>    
			<td>$guest_2</td>
			<td>$item_G2</td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>3.</td> 
			<td>$guest_3</td>
			<td>$item_G3</td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>4.</td>    
		    <td>$guest_4</td>
			<td>$item_G4</td>
			<td></td>
			<td></td>
		  </tr> 
		  <tr>
		    <td>5.</td>     
			<td>$guest_5</td>
			<td>$item_G5</td>
			<td></td>
			<td></td>
		  </tr> 
		   <tr>
		    <td>6.</td>     
			<td>$guest_6</td>
			<td>$item_G6</td>
			<td></td>
			<td></td>
		  </tr> 
		</tbody></table> 
		
        <p><b>Note:1.Guest on submission of second dose certificate completed by 11th Dec 2021 will be allowed to register only for 26th December 2021 to witness the sahaja marriage ceremony.</b></p>
				
			
				<p>(1) Date on Badges issued:___ December 2021
				<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
				<p>(2) Badges Issuer Name & Sign:</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
				

        </body>
	   </html>");
	   


$pdf->Output();

?>