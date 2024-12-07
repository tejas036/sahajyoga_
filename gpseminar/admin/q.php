<html>
    <head>
        <title>Chandan Patel</title>
    </head>
<body>

    <form method="post">
        Select Participant Type: 
        <select style="width:200px;" name="ptype">
            <option value="ALL">ALL</option>
            <option value="Adult">Adult</option>
            <option value="Yuva">Yuva</option>
            <option value="Child">Child</option>
        </select>
        <br><br>
        Event Type: 
        <select style="width:200px;" name="etype">
            <option value="ALL">ALL</option>
            <option value="International Sahaja Yoga Seminar, Ganapatipule">International Sahaja Yoga Seminar, Ganapatipule</option>
            <option value="Only one day Puja, Ganapatipule">Only one day Puja, Ganapatipule</option>
        </select>
        <br><br>
        <input type="submit" name="getres">
    </form>

</html>


<!-- Yuva: 102500, Adult: 406000, Child: 16500 525000-->
<!-- 
    Adult: 5 x 900 = 4500 
    Yuva: 1 x 900 = 900
    CHild: 
-->


<?php
error_reporting(E_ALL);
$con=mysqli_connect("localhost","payplatter","Dexpert@2020","symumbai");

if(isset($_POST['getres']))
{
    $participant_type=$_POST['ptype'];  
    $etype=$_POST['etype'];  
    
    if($participant_type!="ALL")
    {
        $filter="&& p.participant_type='$participant_type'";
    }
    else{
        $filter="";
    }

    if($etype!="ALL")
    {
        $filter1="&& e.Towards='$etype'";
    }
    else{
        $filter1="";
    }


    $stmt=$con->prepare("select count(p.name) as member_count,e.Fname,e.Mobile,e.Address,e.PAN,e.Aadhar,e.Pin,e.Transaction_id,e.Amount,e.Status,e.Towards from  event_registration e left join participants p on e.event_registration_id=p.event_registration_id where e.Status like '%success%' $filter $filter1 group by e.event_registration_id");
    $stmt->execute();
    $res=$stmt->get_result();
    $mcount=0;
    $total_amount=0;
    while($row=$res->fetch_assoc())
    {
        $member_count=$row['member_count'];
        $mcount+=$member_count;

        $amount=$row['Amount'];
        $total_amount+=$amount;
    }
    echo"Member Count: $mcount";
    echo"<br>";
    echo"Total Amount: $total_amount";

}








?>