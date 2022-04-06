<?php
$entered_code= $_GET['entered_code'];
echo $_GET['entered_code'];
$connect = mysqli_connect("localhost", "root", "", "testcentreaudit");
$sql = "SELECT * FROM test_centre_report where centre_code=$entered_code";  
$result1 = mysqli_query($connect, $sql);
$result2 = mysqli_query($connect, $sql);
$centre_data = mysqli_fetch_assoc($result2);
$total=mysqli_num_rows($result1);
//echo "$total";
?>
<html>  
 <head>  
  <title>Export data to Excel</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Forms Data</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                        <th>Centre code</th>  
                        <th>Centre Name</th>  
                        <th>City</th>  
                        <th>Auditor Firstname</th>
                        <th>Auditor Lastname</th>
                        <th>Auditor Contact</th>
                        <th>Audit Date</th>
                        <th>Centre AdminName</th>
                        <th>Centre AdminContact</th>
                        <th>Centre ITheadName</th>
                        <th>Centre ITheadContact</th>
                        <th>Centre NetworkName</th>
                        <th>Centre NetworkContact</th>
                        <th>PCs booked</th>
                        <th>distance BusStand</th>
                        <th>distance railway</th>
                        <th>distance city</th>
                        <th>computer labs</th>
                        <th>floors</th>
                        <th>PH-Friendly</th>
                        <th>Lift</th>
                        <th>waiting Space</th>
                        <th>Queuing Space</th>
                        <th>Screening Facility</th>
                        <th>Registration Desk</th>
                        <th>Server Room</th>
                        <th>Building</th>
                        <th>Same Subnetmask</th>
                        <th>Distance B/W(meter)</th>
                        <th>Covid Hotspot</th>
                        <th>TC Sanitized</th>
                        <th>Any staff has covid History?</th>
                        <th>washbasins</th>
                    </tr>
     <?php
     if($total!=0){
     while($row = mysqli_fetch_array($result1))  
     {  
        echo '  
       <tr>  
         <td>'.$row["centre_code"].'</td>  
         <td>'.$row["centre_name"].'</td>  
         <td>'.$row["city"].'</td>  
         <td>'.$row["auditor_firstname"].'</td>  
         <td>'.$row["auditor_lastname"].'</td>
         <td>'.$row["auditor_contact"].'</td>
         <td>'.$row["audit_date"].'</td>
         <td>'.$row["centre_admin_name"].'</td>
         <td>'.$row["centre_admin_contact"].'</td>
         <td>'.$row["centre_IThead_name"].'</td>
         <td>'.$row["centre_IThead_contact"].'</td>
         <td>'.$row["centre_network_name"].'</td>
         <td>'.$row["centre_network_contact"].'</td>
         <td>'.$row["PCs_booked"].'</td>
         <td>'.$row["distance_BusStand"].'</td>
         <td>'.$row["distance_railway"].'</td>
         <td>'.$row["distance_city"].'</td>
         <td>'.$row["computer_labs"].'</td>
         <td>'.$row["floors"].'</td>
         <td>'.$row["PH_friendly"].'</td>
         <td>'.$row["lift_availability"].'</td>
         <td>'.$row["waiting_space"].'</td>
         <td>'.$row["queuing_space"].'</td>
         <td>'.$row["screening_facility"].'</td>
         <td>'.$row["regis_desk"].'</td>
         <td>'.$row["server_room"].'</td>
         <td>'.$row["building"].'</td>
         <td>'.$row["samesubnetmask"].'</td>
         <td>'.$row["distance_bw"].'</td>
         <td>'.$row["covid_hotspot"].'</td>
         <td>'.$row["TC_sanitized"].'</td>
         <td>'.$row["anystaff_covid_history"].'</td>
         <td>'.$row["washbasins"].'</td>
       </tr>  
        ';  
     }
    }
    else echo "Oops! No record found";
     ?>
    </table>
    <br />
    <form method="post" action="./exportcentredata.php">
     <input type="submit" name="export" class="btn btn-success" value="Download" />
    </form>
   </div>  
  </div>  
<div class="print">
<h3>Centre Code:<?php echo $centre_data['centre_code']; ?> <h3>
<h3>Centre Name:<?php echo $centre_data['centre_name']; ?> <h3>
<h3>Centre City:<?php echo $centre_data['city']; ?> <h3>
<h3>Auditor FirstName:<?php echo $centre_data['auditor_firstname']; ?> <h3>
<h3>Auditor LastName:<?php echo $centre_data['auditor_lastname']; ?> <h3>
<h3>Auditor Contact:<?php echo $centre_data['auditor_contact']; ?> <h3>
<h3>Audit Date:<?php echo $centre_data['audit_date']; ?> <h3>
<h3>Centre Administrator:<?php echo $centre_data['centre_admin_name']; ?> <h3>
<h3>Administrator Contact:<?php echo $centre_data['centre_admin_contact']; ?> <h3>
<h3>Centre IT Head:<?php echo $centre_data['centre_IThead_name']; ?> <h3>
<h3>IT Head Contact:<?php echo $centre_data['centre_IThead_contact']; ?> <h3>
<h3>Centre System and Network Administrator:<?php echo $centre_data['centre_network_name']; ?> <h3>
<h3>System and Network Administrator Contact:<?php echo $centre_data['centre_network_contact']; ?> <h3>
<h3>Total No of PC's :<?php echo $centre_data['PCs_booked']; ?> <h3>
<h3>How far is Center from Public transport facility?<h3>
<h3>a) Bus Stand (Main  BUS Stand):<?php echo $centre_data['distance_BusStand']; ?> <h3>
<h3>b)Railway Station:<?php echo $centre_data['distance_railway']; ?> <h3>
<h3>c)How far is Center from main City place?:<?php echo $centre_data['distance_city']; ?> <h3>
<h3>How many Computer labs are allocated for Exam?:<?php echo $centre_data['computer_labs']; ?> <h3>
<h3>On which floors Computer LABS are located?:<?php echo $centre_data['floors']; ?> <h3>

<h3>PH Friendly Centre (Y/N):<?php echo $centre_data['PH_friendly']; ?> <h3>
<h3>Lift Availability (Y/N) :<?php echo $centre_data['lift_availability']; ?> <h3>
<h3>Adequate space for candidate waiting area ?:<?php echo $centre_data['waiting_space']; ?> <h3>
<h3>Adequate space for Queuing up candidate?:<?php echo $centre_data['queuing_space']; ?> <h3>

<h3>Candidate screening facility?:<?php echo $centre_data['screening_facility']; ?> <h3>
<h3>Place for Registration Desk with LAN, POWER & Sufficient Light?:<?php echo $centre_data['regis_desk']; ?> <h3>
<h3>Secure Server Room Availability (Y/N):<?php echo $centre_data['server_room']; ?> <h3>
<h3>Are all the Labs in one Building or Different Building:<?php echo $centre_data['building']; ?> <h3>
<h3>If they are Different Building are they using same subnet mask:<?php echo $centre_data['samesubnetmask']; ?> <h3>
<h3>IF Different then distance between them(meter)?:<?php echo $centre_data['distance_bw']; ?> <h3>
<h3>Does the TC belongs to Covid 19 Hotspot areas?:<?php echo $centre_data['covid_hotspot']; ?> <h3>
<h3>If Yes than is the TC Sanitized?:<?php echo $centre_data['TC_sanitized']; ?> <h3>
<h3>Does any of the center staff has the history of Covid 19 Positive?:<?php echo $centre_data['anystaff_covid_history']; ?> <h3>
<h3>Does each floor has Wash basins along with Soap available for hand wash?:<?php echo $centre_data['washbasins']; ?> <h3>
    
</div>  
 </body>  
</html>
