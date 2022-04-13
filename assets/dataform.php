<?php
session_start();
include("../login/indexconfig.php");
include("../login/functions.php");
$emp_data=check_login($con1);
$emp_id=$emp_data['emp_id'];
$connect = mysqli_connect("localhost", "root", "", "testcentreaudit");
$sql1 = "SELECT * FROM test_centre_report where emp_id=$emp_id ";  
$sql2 = "SELECT * FROM desktop_detail where emp_id=$emp_id "; 
$sql3="SELECT * FROM power_backup where emp_id=$emp_id";
$sql4="SELECT * FROM internet_line1 where emp_id=$emp_id";
$sql5="SELECT * FROM network_details where emp_id=$emp_id";
$sql6="SELECT * FROM other_info where emp_id=$emp_id";
// $sql2 = "SELECT * FROM desktop_detail where emp_id=$emp_id "; 
// $result1 = mysqli_query($connect, $sql);

//connection to database
$result2 = mysqli_query($connect, $sql1);
$result3 = mysqli_query($connect, $sql2);
$result4 = mysqli_query($connect, $sql3);
$result5 = mysqli_query($connect, $sql4);
$result6 = mysqli_query($connect, $sql5);
$result7 = mysqli_query($connect, $sql6);


//checking the data is exist or not
$totalbasic=mysqli_num_rows($result2);
$totaldesktop=mysqli_num_rows($result3);
$totalpower=mysqli_num_rows($result4);
$totalinternet=mysqli_num_rows($result5);
$totalnetwork=mysqli_num_rows($result6);
$totalother=mysqli_num_rows($result7);

//fetching data
$centre_data = mysqli_fetch_assoc($result2);
$desktop = mysqli_fetch_assoc($result3);
$power = mysqli_fetch_assoc($result4);
$internet = mysqli_fetch_assoc($result5);
$network = mysqli_fetch_assoc($result6);
$other = mysqli_fetch_assoc($result7);
// $total=mysqli_num_rows($result1);
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
     @media print{
         body *{
            visibility:hidden;
         }
         .print-container,.print-container *{
                visibility:visible;
         }
     }
        .printing{
            font-size: 20px;
            width: 700px;
            margin-left:10vh;
            font-family:'Times New Roman', Times, serif;
            }
            .print-container h3{
                width: 420px;
                /*border: 2px solid blue;*/
                display: inline-block;
            }
            .print-container h4{
                width: 380px;
                /* border: 2px solid red; */
                font-size:20px;
                display: inline;
                color: black;
                margin-left:40px;
                }
                .print-container h2{
                    text-align:center;
                    background:whitesmoke;
                    border-radius:10px 10px 10px 10px;
                    }
                .print-container h2:hover {
                     background-color: black;
                     color:white;
                    }
                .print-container h2{
                    background:whitesmoke;
                    border-radius:10px 10px 10px 10px;
                    font-size:30px;
                }
                .print-container h4:hover{
                    color:blue;
                    border-radius:10px 10px 10px 10px;
                }
                /* #btn{
                    margin-top:10px;
                    float:right;
                    background-color:#7386d5;
                    width:100px;
                    padding:10px;
                    margin-right:20px;
                    color:white;
                    font-size:20px;

                }
                 */
                 #btn{
                    margin-top:10px;
                    background-color:#7386d5;
                    width:90px;
                    padding:8px;
                    color:white;
                    font-size:25px;
                    border-radius:10px 10px 10px 10px;

                }
                
    
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
<button onclick="window.print();" id="btn">print</button>
<div class="printing">
<div id="basicdetails" class="print-container">
<h2>Basic Details<h2>
    <?php if($totalbasic===1){?>              
    <!-- basiccc detailsss------------------------------------------------------ -->
<h3>Details filled by Emp ID:<h4><?php echo $centre_data['emp_id'];?></h4> </h3><br>
<h3>Centre Code:<h4><?php echo $centre_data['centre_code']; ?></h4> </h3><br>
<h3>Centre Name:<h4><?php echo $centre_data['centre_name']; ?></h4> </h3><br> 
<h3>Centre City:<h4><?php echo $centre_data['city']; ?> </h4></h3><br>
<h3>Auditor FirstName:<h4><?php echo $centre_data['auditor_firstname']; ?> </h4></h3><br>
<h3>Auditor LastName:<h4><?php echo $centre_data['auditor_lastname']; ?> </h4></h3><br>
<h3>Auditor Contact:<h4><?php echo $centre_data['auditor_contact']; ?> </h4></h3><br>
<h3>Audit Date:<h4><?php echo $centre_data['audit_date']; ?> </h4></h3><br>
<h3>Centre Administrator:<h4><?php echo $centre_data['centre_admin_name']; ?></h4></h3><br>
<h3>Administrator Contact:<h4><?php echo $centre_data['centre_admin_contact']; ?> </h4></h3><br>
<h3>Centre IT Head:<h4><?php echo $centre_data['centre_IThead_name']; ?> </h4></h3><br>
<h3>IT Head Contact:<h4><?php echo $centre_data['centre_IThead_contact']; ?> </h4></h3><br>
<h3>Centre System and Network Administrator:<h4><?php echo $centre_data['centre_network_name']; ?> </h4></h3><br>
<h3>System and Network Administrator Contact:<h4><?php echo $centre_data['centre_network_contact']; ?></h4> </h3><br>
<h3>Total No of PC's :<h4><?php echo $centre_data['PCs_booked']; ?></h4> </h3><br>
<h3><h4>How far is Center from Public transport facility?</h3><br>
<h3>a) Bus Stand (Main  BUS Stand):<h4><?php echo $centre_data['distance_BusStand']; ?> </h4></h3><br>
<h3>b)Railway Station:<h4><?php echo $centre_data['distance_railway']; ?></h4></h3><br>
<h3>c)How far is Center from main City place?:<h4><?php echo $centre_data['distance_city']; ?></h4></h3><br>
<h3>How many Computer labs are allocated for Exam?:<h4><?php echo $centre_data['computer_labs']; ?> </h4></h3><br>
<h3>On which floors Computer LABS are located?:<h4><?php echo $centre_data['floors']; ?></h4> </h3><br>

<h3>PH Friendly Centre (Y/N):<h4><?php echo $centre_data['PH_friendly']; ?> </h4> </h3><br>
<h3>Lift Availability (Y/N) :<h4><?php echo $centre_data['lift_availability']; ?> </h4> </h3><br>
<h3>Adequate space for candidate waiting area ?:<h4><?php echo $centre_data['waiting_space']; ?> </h4> </h3><br>
<h3>Adequate space for Queuing up candidate?:<h4><?php echo $centre_data['queuing_space']; ?> </h4> </h3><br>

<h3>Candidate screening facility?:<h4><?php echo $centre_data['screening_facility']; ?> </h4> </h3><br>
<h3>Place for Registration Desk with LAN, POWER & Sufficient Light?:<h4><?php echo $centre_data['regis_desk']; ?> </h4> </h3><br>
<h3>Secure Server Room Availability (Y/N):<h4><?php echo $centre_data['server_room']; ?> </h4> </h3><br>
<h3>Are all the Labs in one Building or Different Building:<h4><?php echo $centre_data['building']; ?> </h4> </h3><br>
<h3>If they are Different Building are they using same subnet mask:<h4><?php echo $centre_data['samesubnetmask']; ?> </h4> </h3><br>
<h3>IF Different then distance between them(meter)?:<h4><?php echo $centre_data['distance_bw']; ?> </h4> </h3><br>
<h3>Does the TC belongs to Covid 19 Hotspot areas?:<h4><?php echo $centre_data['covid_hotspot']; ?> </h4> </h3><br>
<h3>If Yes than is the TC Sanitized?:<h4><?php echo $centre_data['TC_sanitized']; ?> </h4> </h3><br>
<h3>Does any of the center staff has the history of Covid 19 Positive?:<h4><?php echo $centre_data['anystaff_covid_history']; ?> </h4> </h3><br>
<h3>Does each floor has Wash basins along with Soap available for hand wash?:<h4><?php echo $centre_data['washbasins']; ?> </h4> </h3><br>
</div>
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr>


 <!-- Desktop  detailsss------------------------------------------------------ -->
<div id="desktop" class="print-container">
    <h2>Desktop Details</h2>
    <?php if($totaldesktop===1){?> 
 <h3>Desktop configuration in Lab?:<h4><?php echo $desktop['des_config']; ?> </h4> </h3><br>
 <h3>RAM available on each desktop?:<h4><?php echo $desktop['ram_avail']; ?> </h4> </h3><br>
 <h3>Minimum hard disk space available on desktop:<h4><?php echo $desktop['disk_space']; ?> </h4> </h3><br>
 <h3>Type of monitors:<h4><?php echo $desktop['monitor_type']; ?> </h4> </h3><br>
 <h3>Operating system on desktops:<h4><?php echo $desktop['os_name']; ?> </h4> </h3><br>
 <h3>Version of Operating system on desktops?:<h4><?php echo $desktop['os_version']; ?> </h4> </h3><br>
 <h3>IE version on desktops?:<h4><?php echo $desktop['ie_version']; ?> </h4> </h3><br>
 <h3>License OS in all Client node:<h4><?php echo $desktop['os_license']; ?> </h4> </h3><br>
 <h3>Name of Antivirus installed on PC's:<h4><?php echo $desktop['antivirus_name']; ?> </h4> </h3><br>
 <h3>Branded Machines (Y/N):<h4><?php echo $desktop['Branded_machine']; ?> </h4> </h3><br>
 <h3>.Net Framework 4.0 or higher installed(Y/N):<h4><?php echo $desktop['dotnet_install']; ?> </h4> </h3><br>
 <h3>Head to Head seating distance will be as per norms of Health ministry of India i.e. 6 feet head to head distance.?:<h4><?php echo $desktop['distance_norms']; ?> </h4> </h3><br>
 <h3>College has Thin client (Y/N):<h4><?php echo $desktop['thin_client']; ?> </h4> </h3><br>
</div>
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr>
<div id="powerbackup" class="print-container">
    <h2>Power Backup</h2>
    <?php if($totalpower===1){?> 
    <h3>UPS Availability (Y/N):<h4><?php echo $power['UPS_availability']; ?> </h4> </h3><br>
    <h3>Type of UPS - Individual / Online:<h4><?php echo $power['typeof_UPS']; ?> </h4> </h3><br>
    <h3>UPS Capacity (in KVA):<h4><?php echo $power['UPS_capacity']; ?> </h4> </h3><br>
    <h3>All Labs connected to UPS (Y/N):<h4><?php echo $power['labsconnected_UPS']; ?> </h4> </h3><br>
    <h3>Duration of UPS back-up (in minutes):<h4><?php echo $power['UPS_backup_time']; ?> </h4> </h3><br>
    <h3>Availability of Diesel Genset(Y/N):<h4><?php echo $power['avail_diesel_genset']; ?> </h4> </h3><br>
    <h3>Capacity of the Genset (in KVA):<h4><?php echo $power['genset_capacity']; ?> </h4> </h3><br>
    <h3>All Labs connected to Genset (Y/N):<h4><?php echo $power['labsconnected_genset']; ?> </h4> </h3><br>
    <h3>Switchover from Raw power to DG - (Manual / Automatic):<h4><?php echo $power['switchover']; ?> </h4> </h3><br>
    <h3>Availabilty of back-up diesel Genset (Y/N):<h4><?php echo $power['avail_backup_dg']; ?> </h4> </h3><br>
    <h3>Capacity of Back up DG (in KVA):<h4><?php echo $power['dg_capacity']; ?> </h4> </h3><br>
</div>
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr>
<div id="internetline" class="print-container">
    <h2>Internet Line</h2>
    <?php if($totalinternet===1){?>  
    <h3>Internet connection is available?:<h4><?php echo $internet['internet']; ?> </h4> </h3><br>
    <h3>Type of internet connection (Broadband/Lease line):<h4><?php echo $internet['connection_type']; ?> </h4> </h3><br>
    <h3>Name of internet Service Provider?:<h4><?php echo $internet['service_provider']; ?> </h4> </h3><br>
    <h3>Internet Bandwidth (in MBPS):<h4><?php echo $internet['internet_bandwidth']; ?> </h4> </h3><br>
    <h3>Suitable for IBT (Y/N)?:<h4><?php echo $internet['for_IBT']; ?> </h4> </h3><br>
    <h3>How much Internet Bandwidth will college provide during Exam?:<h4><?php echo $internet['clg_bandwidth']; ?> </h4> </h3><br>
    <h3>Backup Internet is available?:<h4><?php echo $internet['backup_net']; ?> </h4> </h3><br>
    <h3>Type of Backup internet connection (Broadband/Lease line):<h4><?php echo $internet['b_connection_type']; ?> </h4> </h3><br>
    <h3>Name of internet Service Provider:<h4><?php echo $internet['b_service_provider']; ?> </h4> </h3><br>
    <h3>Internet Bandwidth (in MBPS):<h4><?php echo $internet['b_internet_bandwidth']; ?> </h4> </h3><br>
    <h3>Suitable for IBT (Y/N):<h4><?php echo $internet['b_for_IBT']; ?> </h4> </h3><br>
</div>
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr>
<div id="networkdetails" class="print-container">
    <h2>Network Details</h2>
    <?php if($totalnetwork===1){?> 
    <h3>Candidate screening facility?:<h4><?php echo $network['network_topology']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['type_network']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['cabling_structure']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['isolated_network']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['proxy_config']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['power_backup']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['type_structured_network']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['LAN']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $network['clg_network']; ?> </h4> </h3><br>
</div>
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr>
<div id="otherinfo" class="print-container">
    <h2>Other Information</h2>
    <?php if($totalother===1){?> 
    <h3>Candidate screening facility?:<h4><?php echo $other['wifi']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['num_system_wifi']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['printers']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['type_printer']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['ac_avail']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['cctv_avail']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['drinking_water']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['has_bell']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['sep_frisking_area']; ?> </h4> </h3><br>
    <h3>Candidate screening facility?:<h4><?php echo $other['thermal_guns']; ?> </h4> </h3><br>
</div>   
<div>
   <?php }
   else{
       echo '<p>This form is not submitted yet</p>';
   }
    ?>
</div>
<hr> 
</div>  
 </body>  
</html>