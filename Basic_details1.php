<?php 
    session_start();

	include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$centre_code = $_POST['centre_code'];
        $centre_name = $_POST['centre_name'];
        $city = $_POST['city'];
        $auditor_firstname = $_POST['auditor_firstname'];
        $auditor_lastname = $_POST['auditor_lastname'];
        $auditor_contact = $_POST['auditor_contact'];
        $audit_date = $_POST['audit_date'];

        $centre_admin_name = $_POST['centre_admin_name'];
        $centre_admin_contact = $_POST['centre_admin_contact'];
        $centre_IThead_name = $_POST['centre_IThead_name'];
        $centre_IThead_contact = $_POST['centre_IThead_contact'];
        $centre_network_name = $_POST['centre_network_name'];
        $centre_network_contact = $_POST['centre_network_contact'];

        $PCs_booked = $_POST['PCs_booked'];
        $distance_BusStand = $_POST['distance_BusStand'];
        $distance_railway = $_POST['distance_railway'];
        $distance_city = $_POST['distance_city'];

        if(!empty($centre_code) && !empty($centre_name) && !empty($city) && !empty($auditor_firstname) && !empty($auditor_lastname) && 
            !empty($auditor_contact) && !empty($audit_date) && !empty($centre_admin_name)&& !empty($centre_admin_contact)
            && !empty($centre_IThead_name)&& !empty($centre_IThead_contact)&& !empty($centre_network_name)&& 
            !empty($centre_network_contact) && !empty($PCs_booked)&& !empty($distance_BusStand)&& !empty($distance_railway)
            && !empty($distance_city))
        {   //save to database
			//$user_id = random_num(20);
			$query = "insert into test_centre_report(centre_code,centre_name,city,auditor_firstname,auditor_lastname,
            auditor_contact,audit_date,centre_admin_name,centre_admin_contact,centre_IThead_name,centre_IThead_contact,centre_network_name,
            centre_network_contact,PCs_booked,distance_BusStand,distance_railway,distance_city) 
            values ('$centre_code','$centre_name','$city','$auditor_firstname','$auditor_lastname','$auditor_contact','$audit_date',
            '$centre_admin_name','$centre_admin_contact','$centre_IThead_name','$centre_IThead_contact','$centre_network_name',
            '$centre_network_contact','$PCs_booked','$distance_BusStand','$distance_railway','$distance_city')";

			mysqli_query($con, $query);

			header("Location: Desktop_config.php");
			die;
		}
        else
		{
			echo "<script> alert('Please enter the details required');window.location='Basic_details.php'</script>";
		}
    }
?>

<!-- <!doctype html>
<html lang="en">

<head>
    <title>basic details</title>
</head>
<link rel="stylesheet" href="../CSS/basic.details.css">
    
<body>
    <div class="side1">
        <ul id="nav-bar">
            <div id="nav-box"><li><a href="./Basic_details.php" >Basic Details</a></li></div>
            <div id="nav-box"><li><a href="./Desktop_config.php" >Desktop Configuration</a></li></div>
            <div id="nav-box"><li><a href="./Power_backup.php" >Power Back Up</a></li></div>
            <div id="nav-box"><li><a href="./Internet_line1.php" >Internet Line1</a></li></div>
            <div id="nav-box"><li><a href="./Backup_internet.php" >Backup Internet</a></li></div>
            <div id="nav-box"><li><a href="./Network_details.php" >Network Details</a></li></div>
            <div id="nav-box"><li><a href="./Other_info.php" >Other Info</a></li></div>
        </ul>
    </div>
    <div class="side2">
    <form action="" method="post">
        <label>Enter Test Center Code</label><input type="varchar" name="centre_code"  /><br><br>
        <label>Test Centre Name </label><input type="text" name="centre_name" /><br>
        <label>City</label><input type="text" name="city" method="post"/><br>
        <label>Auditor FirstName</label><input type="text" name="auditor_firstname" />
        <label>Lastname</label><input type="text" name="auditor_lastname" />
        <label>Auditor Contact Number</label><input type="tel" name="auditor_contact" /><br>
        <label>Audit Date</label><input type="date" name="audit_date" /><br>
        <hr>

        <h3>Enter Test Centre Administer details</h3>
        <label>Name</label><input type="text" name="centre_admin_name" method="post"/><br>
        <label>Contact Number</label><input type="tel" name="centre_admin_contact"method="post" /><br>
        <hr>
        <h3>Enter Test Centre IT Head details</h3>
        <label>Name</label><input type="text" name="centre_IThead_name" method="post"/><br>
        <label>Contact Number</label><input type="tel" name="centre_IThead_contact" method="post"/><br>
        <hr>
        <h3>Enter Test Centre System and Network admin Details</h3>
        <label>Name</label><input type="text" name="centre_network_name" method="post"/><br>
        <label>Contact Number</label><input type="tel" name="centre_network_contact" method="post"/><br>
        <hr>


        <label>Total No of PC's that can be booked ensuring Social Diatancing Norms i.e. Head to Head distance of 6 Feet Distance (Including Test Node, Buffer, Registration machines, Video recording machines)
        </label><input type="number" name="PCs_booked"/>
        <h3>How far is Center from Public transport facility?</h3>
        <ul>
            <label> Bus Stand (Main BUS Stand)</label><input type="number" name="distance_BusStand"  /><br>
            <label> Railway Station</label><input type="number" name="distance_railway"  /><br>
            <label> How far is Center from main City place?</label><input type="number" name="distance_city" /><br>
        </ul>  
        <button type="submit" class="button">SUBMIT</button>
        <button type="submit" class="fetch" name="fetch">fetch</button>
        <button type="submit" class="next" name="fetch"><a href="./Desktop_config.php">Next</a></button>
       
    </div>



    </form>
</body>

</html>
 -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="HTML/index.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Test-Centre Audit</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Forms</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Basic details</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="./Basic_details.php">Details 1</a>
                        </li>
                        <li>
                            <a href="#">Details 2</a>
                        </li>
                        <li>
                            <a href="#">Details 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./Desktop_config.php">Desktop configuration</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./Power_backup.php">Power backup</a>
                </li>
                <li>
                    <a href="./Internet_line1.php">Internet Line 1</a>
                </li>
                <li>
                    <a href="./Backup_internet.php">Backup internet </a>
                </li>
                <li>
                    <a href="./Network_details.php">Network Details</a>
                </li>
                <li>
                    <a href="./Other_info.php">Other Information</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">SAVE</a>
                </li>
                <!-- <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li> -->
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <form method="post" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Test Centre Code</label>
                        <input type="tel" class="form-control" id="inputEmail4" name="centre_code" placeholder="Center Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Test Centre Name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="centre_name" placeholder="Centre Address">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" name="city" id="inputCity" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Delhi</option>
                            <option>Mumbai</option>
                            <option>Agra</option>
                            <option>Mathura</option>
                            <option>Banarash</option>
                            <option>Rajashthan</option>
                            <option>Delhi</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Auditor FirstName</label>
                        <input type="text" class="form-control" id="inputEmail4" name="auditor_firstname" placeholder="Auditor Name">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPassword4">LastName</label>
                        <input type="text" class="form-control" id="inputPassword4" name="auditor_lastname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Auditor Contact</label>
                        <input type="text" class="form-control" id="inputAddress" name="auditor_contact" placeholder="">
                    </div>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Audit Date</label>
                    <input type="date" class="form-control" id="inputEmail4" name="audit_date" placeholder="Administrator Name">
                </div>
                
            </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name of Centre Administrator</label>
                        <input type="text" class="form-control" id="inputEmail4" name="centre_admin_name" placeholder="Administrator Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact details of Administrator</label>
                        <input type="tel" class="form-control" id="inputPassword4" name="centre_admin_contact"
                            placeholder="Administrator Contact no.">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name of Centre IT Head</label>
                        <input type="text" class="form-control" id="inputEmail4" name="centre_IThead_name" placeholder="IT Head Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact details of IT Head</label>
                        <input type="tel" class="form-control" id="inputPassword4" name="centre_IThead_contact"
                            placeholder="IT head Contact no.">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name of Centre Network And Security Head</label>
                        <input type="text" class="form-control" id="inputEmail4" name="centre_network_name" placeholder="NS Head Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contact details of Network And Security Head</label>
                        <input type="tel" class="form-control" id="inputPassword4"
                            placeholder="NS Head Contact no." name="centre_network_contact">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Total Number of PC's</label>
                        <input type="number" class="form-control" id="inputPassword4"
                            placeholder="NO. of PC's" name="PCs_booked">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">How far is Center from Bus Stand?</label>
                        <input type="number" class="form-control" id="inputEmail4" name="distance_BusStand" placeholder="In KM">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">How far is Center from Railway Station?</label>
                        <input type="number" class="form-control" id="inputPassword4"
                            placeholder="In KMs" name="distance_railway">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">How far is Center from from main City?</label>
                        <input type="number" class="form-control" id="inputPassword4"
                            placeholder="In KMs" name="distance_city">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">System Distancing Norms</label>
                        <input type="number" class="form-control" id="inputNorms" name="distance_norms" placeholder="In meter">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">On which floor computer LABS are located</label>
                        <input type="number" class="form-control" id="inputFloor"
                            placeholder="Floor no." name="distance_floor">
                    </div>
                    <!-- <div class="form-group col-md-4">
                        <label for="inputPassword4">PH friendly centre?</label>
                    <div class="form-check">

                            <input class="form-check-input" type="radio" name="PH_friendly" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                    </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                         No
                            </label>
                    </div>

                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Lift Availability</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lift_availability" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                                </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                     No
                            </label>
                        </div>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Wating Space</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="waiting_space" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                            No
                            </label>
                    </div>
                </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Queuing space</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="queuing_space" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="queuing_space" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                    No
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Faciity Game</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="facility_gate" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="facility_game" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                    No
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Registred Desk</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="regis_desk" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="regis_desk" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                                 No
                            </label>
                        </div>
                    </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Server Room available</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="serverroom_avail" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                                        Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="serverroom_avail" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                        No
                                </label>
                            </div>
                        </div> -->
                    </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">PH Friendly Centre</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="PH_friendly" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="PH_friendly" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Lift Availale</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Lift" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Lift" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Is any adequate space for candidate waiting area adhering to social distancing norms</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Waiting_area" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Waiting_area" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Is any adequate space for Queuing up candidate maintaining 6 feet distance</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Queue_area" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Queue_area" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Candidate screening facility available at the center Entry gate</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="screening_facility" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="screening_facility" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Secure Server Room Availability</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Server_room" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Secure_room" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Place for Registration Desk with LAN, POWER & Sufficient Light?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="registration_place" value="Available" id="flexRadioDefault1">Availale
                            <br>
                            <input class="form-check-input" type="radio" name="registration_place" value="Not available" id="flexRadioDefault1">NOt Availale
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Are all the Labs in one Building or Different Building</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Server_room" value="Same building" id="flexRadioDefault1">Same building
                            <br>
                            <input class="form-check-input" type="radio" name="Secure_room" value="Different Building" id="flexRadioDefault1">Different Building
                        </div>
                        <label for="inputEmail4">If in Different Building then distance between them</label>
                        <input type="number" class="form-control" id="inputNorms" name="Building_Distance" placeholder="In meter">
                        <label for="inputEmail4"> If they are Different Building are they using same subnet mask</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Server_room" value="Same building" id="flexRadioDefault1">Same subnet
                            <br>
                            <input class="form-check-input" type="radio" name="Secure_room" value="Different Building" id="flexRadioDefault1">Different subnet
                        </div>
                        <label for="inputEmail4">If in Different subnet then name of the subnet</label>
                        <input type="number" class="form-control" id="inputNorms" name="subnet_name" placeholder="Subnet Name">
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Does the TC belongs to Covid 19 Hotspot areas?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Hotspot_area" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Hotspot_area" value="No" id="flexRadioDefault1">NO
                        </div>
                         <label for="inputEmail4">If Yes than is the TC Sanitized?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Sanitized" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Sanitized" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Does any of the center staff has the history of Covid 19 Positive?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Positive_history" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="Positive_history" value="No" id="flexRadioDefault1">NO
                        </div>
                        <label for="inputEmail4">If yes then name of the staff member</label>
                        <input type="number" class="form-control" id="inputNorms" name="staff_member" placeholder="name of the staff member">
                    </div>
                </div>
                <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="inputEmail4">Does each floor has Wash basins along with Soap available for hand wash?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="hand_wash" value="Yes" id="flexRadioDefault1">YES
                            <br>
                            <input class="form-check-input" type="radio" name="hand_wash" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>