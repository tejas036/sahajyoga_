<?php
/**

 * Date: 6/16/2020
 * Time: 11:09 PM
 */
session_start();
require_once('function.php');
require_once('file.php');
$EncryptDecrypt = new EncryptDecrypt();
$query=$_REQUEST['query'];
$decText = $EncryptDecrypt->decrypt($query,$privateValue,$privateKey);
$res_array = explode('&',$decText);
foreach($res_array as $res){
    $a = explode('=',$res);
    if($a[0]=='pgTransId'){
        $pg_trans_id = $a[1];
    }

    if($a[0]=='transId'){
        $trans_id = $a[1];
    }
	
    if($a[0]=='payInstrument'){
        $payInstrument = strtoupper($a[1]);
    }

    if($a[0]=='respCode'){
        $respCode = $a[1];
    }

    if($a[0]=='mtxnId'){
        $mtxnId = $a[1];
    }

    if($a[0]=='amount'){
        $amount = round($a[1]);
    }

    if($a[0]=='firstName'){
        $firstName = strtoupper($a[1]);
    }

    if($a[0]=='lastName'){
        $lastName = strtoupper($a[1]);
    }

    if($a[0]=='contact'){
        $contact = $a[1];
    }

	if($a[0]=='email'){
        $email = $a[1];
    }

    if($a[0]=='receiptNumber'){
        $receiptNumber = $a[1];

		$receiptNumber = preg_replace('/[\x00-\x1F\x7f-\xFF]/', '', $receiptNumber);
    }

	 if($a[0]=='status'){
        $status = $a[1];

    }
	
	
    if($a[0]=='udf5'){
        $pan = strtoupper($a[1]);
    }

    if($a[0]=='udf7'){
        $towards = strtoupper($a[1]);
    }
	if($a[0]=='udf8'){
        $address = strtoupper($a[1]);
    }
echo $a[6];
}

$data= explode('=',$res_array[5]);
  $data[1];

  include_once 'dbConnection.php';
 $Date =  date("Y-m-d");
	 $sql = "update transactions set Transaction_end_time='" . $Date . "',Status='Failed',Payment_mode ='" . $payInstrument . "',receiptNumber='" . $receiptNumber . "',Transaction_Number='" . $trans_id . "' where Transaction_id='" . $data[1] . "'";
		if ($conn->query($sql) === true) {
			//echo "<script> alert('Record Update.'); </script>";
		} else {
			//echo "<script> alert('Failed To Update Record.'); </script>";
		}


?>
<br/>
<br/>
<div style="text-align: center"><h1>Your payment has not been successful!</h1></div>

<p style="margin-left: 0;margin-right: 0;" margin-right = "50px;" align="justify">
    <font color="red">
    We thank you for your donation. You will receive the donation receipt on email. If required, you can also view your previous donations made to us by using Donor Login.
    </font> 
</p>
<!-- <div style="text-align: center"><h2> If money was debited from your account, please reach out to donations@sahajayogamumbai.org </h2></div> -->
<div>
<br/>
<br/><br/>
<br/>
<div align="center"><a href = "<?php echo $backToForm; ?>" ><button type="button" class = "button hidden-print">Back to Home</button></a></div>
</div>
