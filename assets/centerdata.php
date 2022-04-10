<?php
$entered_code= $_GET['entered_code'];
// echo $_GET['entered_code'];
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
 <style>
     /* @media print{
         body *{
            visibility:hidden;
         }
         .print-container,.print-container *{
                visibility:visible;
         }
     } */
     <style>
        .printing{
                font-size: 20px;
                width: 600px;
                margin-left:30vh;
                font-family:'Times New Roman', Times, serif;
            }
            .print-container h3{
                width: 300px;
                /*border: 2px solid blue;*/
                display: inline-block;
            }
            h4{
                width: 300px;
                /*border: 2px solid red;*/
                font-size:22px;
                display: inline;
                color: gray;
                }
    </style>
 </style>  
 <body>  
  <!-- <div class="container">  
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
  </div>   -->
<button onclick="window.print();">print</button>
<div class="printing">
<div id="basicdetails" class="print-container">
    <h1>Basic Details <h1>              
    <!-- basiccc detailsss------------------------------------------------------ -->
<h3>Details filled by Emp ID:<h4><?php echo $centre_data['emp_id'];?></h4> </h3><br>
<h3>Centre Code:<h4><?php echo $centre_data['centre_code']; ?></h4> </h3><br>
<h3>Centre Name:<h4><?php echo $centre_data['centre_name']; ?></h4> </h3><br> 
<h3>Centre City:<h4><?php echo $centre_data['city']; ?> </h4></h3><br>
<h3>Auditor FirstName:<h4><?php echo $centre_data['auditor_firstname']; ?> </h4></h3><br>
<h3>Auditor LastName:<h4><?php echo $centre_data['auditor_lastname']; ?> </h4></h3><br>
<h3>Auditor Contact:<h4><?php echo $centre_data['auditor_contact']; ?> </h4></h3><br>
<h3>Audit Date:<h4><?php echo $centre_data['audit_date']; ?> </h4></h3><br>
<h3>Centre Administrator:<h4><?php echo $centre_data['centre_admin_name']; ?> </h4></h3><br>
<h3>Administrator Contact:<h4><?php echo $centre_data['centre_admin_contact']; ?> </h4></h3><br>
<h3>Centre IT Head:<h4><?php echo $centre_data['centre_IThead_name']; ?> </h4></h3><br>
<h3>IT Head Contact:<h4><?php echo $centre_data['centre_IThead_contact']; ?> </h4></h3><br>
<h3>Centre System and Network Administrator:<h4><?php echo $centre_data['centre_network_name']; ?> </h4></h3><br>
<h3>System and Network Administrator Contact:<h4><?php echo $centre_data['centre_network_contact']; ?></h4> </h3><br>
<h3>Total No of PC's :<h4><?php echo $centre_data['PCs_booked']; ?></h4> </h3><br>
<h3>How far is Center from Public transport facility?</h3><br>
<h3>a) Bus Stand (Main  BUS Stand):<h4><?php echo $centre_data['distance_BusStand']; ?> </h4></h3><br>
<h3>b)Railway Station:<h4><?php echo $centre_data['distance_railway']; ?></h4></h3><br>
<h3>c)How far is Center from main City place?:<h4><?php echo $centre_data['distance_city']; ?></h4></h3><br>
<h3>How many Computer labs are allocated for Exam?:<h4><?php echo $centre_data['computer_labs']; ?> </h4></h3><br>
<h3>On which floors Computer LABS are located?:<h4><?php echo $centre_data['floors']; ?></h4> </h3><br>

<h3>PH Friendly Centre (Y/N):<?php echo $centre_data['PH_friendly']; ?> <h3><br>
<h3>Lift Availability (Y/N) :<?php echo $centre_data['lift_availability']; ?> <h3><br>
<h3>Adequate space for candidate waiting area ?:<?php echo $centre_data['waiting_space']; ?> <h3><br>
<h3>Adequate space for Queuing up candidate?:<?php echo $centre_data['queuing_space']; ?> <h3><br>

<h3>Candidate screening facility?:<?php echo $centre_data['screening_facility']; ?> <h3><br>
<h3>Place for Registration Desk with LAN, POWER & Sufficient Light?:<?php echo $centre_data['regis_desk']; ?> <h3><br>
<h3>Secure Server Room Availability (Y/N):<?php echo $centre_data['server_room']; ?> <h3><br>
<h3>Are all the Labs in one Building or Different Building:<?php echo $centre_data['building']; ?> <h3><br>
<h3>If they are Different Building are they using same subnet mask:<?php echo $centre_data['samesubnetmask']; ?> <h3><br>
<h3>IF Different then distance between them(meter)?:<?php echo $centre_data['distance_bw']; ?> <h3><br>
<h3>Does the TC belongs to Covid 19 Hotspot areas?:<?php echo $centre_data['covid_hotspot']; ?> <h3><br>
<h3>If Yes than is the TC Sanitized?:<?php echo $centre_data['TC_sanitized']; ?> <h3><br>
<h3>Does any of the center staff has the history of Covid 19 Positive?:<?php echo $centre_data['anystaff_covid_history']; ?> <h3><br>
<h3>Does each floor has Wash basins along with Soap available for hand wash?:<?php echo $centre_data['washbasins']; ?> <h3><br>
</div>
<hr>


 <!-- Desktop  detailsss------------------------------------------------------ -->
<div id="desktop">
    <h1>Desktop Details</h1>
 <h3>Candidate screening facility?:<?php echo $centre_data['des_config']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['ram_avail']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['disk_space']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['monitor_type']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['os_name']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['os_version']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['ie_version']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['os_license']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['antivirus_name']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['Branded_machine']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['dotnet_install']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['distance_norms']; ?> <h3>
 <h3>Candidate screening facility?:<?php echo $centre_data['thin_client']; ?> <h3>
</div>
<hr>
<div id="powerbackup">
    <h1>Power Backup</h1>
    <h3>Candidate screening facility?:<?php echo $centre_data['UPS_availability']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['typeof_UPS']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['UPS_capacity']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['labsconnected_UPS']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['UPS_backup_time']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['avail_diesel_genset']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['genset_capacity']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['labsconnected_genset']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['switchover']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['avail_backup_dg']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['dg_capacity']; ?> <h3>
</div>
<hr>
<div id="internetline">
    <h1>Internet Line</h1>
    <h3>Candidate screening facility?:<?php echo $centre_data['internet']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['connection_type']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['service_provider']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['internet_bandwidth']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['for_IBT']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['clg_bandwidth']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['backup_net']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['b_connection_type']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['b_service_provider']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['b_internet_bandwidth']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['b_for_IBT']; ?> <h3>
</div>
<hr>
<div id="networkdetails">
    <h1>Network Details</h1>
    <h3>Candidate screening facility?:<?php echo $centre_data['network_topology']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['type_network']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['cabling_structure']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['isolated_network']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['proxy_config']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['power_backup']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['type_structured_network']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['LAN']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['clg_network']; ?> <h3>
</div>
<hr>
<div id="otherinfo">
    <h1>Other Information</h1>
    <h3>Candidate screening facility?:<?php echo $centre_data['wifi']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['num_system_wifi']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['printers']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['type_printer']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['ac_avail']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['cctv_avail']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['drinking_water']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['has_bell']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['sep_frisking_area']; ?> <h3>
    <h3>Candidate screening facility?:<?php echo $centre_data['thermal_guns']; ?> <h3>
</div>   
<hr>
</div>  
 </body>  
</html>
