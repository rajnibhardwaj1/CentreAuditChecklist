<?php 
    session_start();

	include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$UPS_availability = $_POST['UPS_availability'];
        $typeof_UPS = $_POST['typeof_UPS'];
        $UPS_capacity = $_POST['UPS_capacity'];
        $labsconnected_UPS = $_POST['labsconnected_UPS'];
        $UPS_backup_time = $_POST['UPS_backup_time'];
        $avail_diesel_genset = $_POST['avail_diesel_genset'];
        $genset_capacity = $_POST['genset_capacity'];
        $labsconnected_genset = $_POST['labsconnected_genset'];
        $switchover = $_POST['switchover'];
        $avail_backup_dg = $_POST['avail_backup_dg'];
        $dg_capacity = $_POST['dg_capacity'];

        if(!empty($UPS_availability) && !empty($typeof_UPS) && !empty($UPS_capacity) && !empty($labsconnected_UPS)&& !empty($UPS_backup_time)
        && !empty($avail_diesel_genset)&& !empty($genset_capacity)&& !empty($labsconnected_genset) && !empty($switchover) && !empty($avail_backup_dg) && 
            !empty($dg_capacity))
        {   //save to database
			//$user_id = random_num(20);
			$query = "insert into power_backup(UPS_availability,typeof_UPS,UPS_capacity,labsconnected_UPS,UPS_backup_time,avail_diesel_genset,
            genset_capacity,labsconnected_genset,switchover,avail_backup_dg,dg_capacity) 
            values ('$UPS_availability','$typeof_UPS','$UPS_capacity','$labsconnected_UPS','$UPS_backup_time','$avail_diesel_genset',
            '$genset_capacity','$labsconnected_genset','$switchover','$avail_backup_dg','$dg_capacity')";

			mysqli_query($con, $query);

			header("Location: Internet_line1.php");
			die;
		}
        else
		{
			echo "<script> alert('Please enter the details required');window.location='Power_backup.php'</script>";
		}
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Power backup form</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="footer.css">

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
                            <a href="./Basic_details.php">detail 1</a>
                        </li>
                        <li>
                            <a href="#">detail 2</a>
                        </li>
                        <li>
                            <a href="#">detail 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./Desktop_config.php">Desktop Configuration</a>
                </li>
                <li>
                    <a href="./Power_backup.php">Power backup</a>
                </li>
                <li>
                    <a href="./Internet_line1.php">Internet Line</a>
                </li>
                <li>
                    <a href="./Backup_internet .php">Backup internet </a>
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
            <h3 id="heading">Power Backup</h3><hr>

            <form id="form" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">UPS Availability?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="UPS_availability" value="Yes"id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" name="UPS_availability" value="No "id="flexRadioDefault1">NO
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Types of Ups?</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="typeof_UPS" value="Individual" id="flexRadioDefault1" require>Individual
                            <br>
                        <input class="form-check-input" type="radio" name="typeof_UPS" value="Online" id="flexRadioDefault1">Online
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">UPS Capacity</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="In KVA" name="UPS_capacity" require>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">All Labs connected to UPS?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="labsconnected_UPS" value="Yes"id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" name="labsconnected_UPS" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Duration of UPS Back-up</label>
                        <input type="number" class="form-control" id="inputEmail4" name="UPS_backup_time" placeholder="In minutes" require>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Availability of Diesel Genset?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Yes" name="avail_diesel_genset" id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" value="No"name="avail_diesel_genset" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Capacity of Diesel Genset</label>
                        <input type="number" class="form-control" id="inputEmail4" name="genset_capacity" placeholder="in KVA" require>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">All Labs connected to Genset?</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="labsconnected_genset" value="Yes" id="flexRadioDefault1" require>YES
                        <br>
                        <input class="form-check-input" type="radio" name="labsconnected_genset" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Switchover from Raw power to DG</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="switchover" value="Manual" id="flexRadioDefault1" require>Manual
                        <br>
                        <input class="form-check-input" type="radio" name="switchover" value="Automatic" id="flexRadioDefault1">Automatic
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Availabilty of back-up diesel Genset?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="avail_backup_dg" value="Yes" id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" name="avail_backup_dg" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Capacity of Back up DG (in KVA)</label>
                        <input type="number" class="form-control" id="inputEmail4" name="dg_capacity" placeholder="(in KVA)" require>
                    </div>
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
        <div class="container">
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2018 - Company Name.  All rights reserved.</p>
		</div>
	</div>


  </div>
  </div>
    </footer>

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

<!-- <!doctype html>
<html lang="en">

<head>
    <title>power backup</title>
</head>
<body>
    <form method="post">
        <label for="UPS_availability">UPS Availability</label>
        <select name="UPS_availability">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label for="typeof_UPS">Select type of UPS</label>
        <select name="typeof_UPS">
            <option>Individual</option>
            <option>Online</option>
        </select><br>
        <label for="UPS_capacity">UPS Capacity(in KVA)</label>
        <input type="number" name="UPS_capacity"/>
        <label>All Labs connected to UPS?</label>
        <select name="labsconnected_UPS">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label>Duration of UPS back-up (in minutes)</label>
        <input type="number" name="UPS_backup_time"/>
        <label for="avail_diesel_genset">Availability of Diesel Genset ?</label>
        <select name="avail_diesel_genset">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label for="genset_capacity">Capacity of the Genset (in KVA)</label>
        <input type="number" name="genset_capacity"/>
        <label for="labsConnected_genset">All Labs connected to Genset (Y/N)</label>
        <select name="labsConnected_genset">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label for="switchover">Switchover from Raw power to DG </label>
        <select name="switchover">
            <option>Manual</option>
            <option>Automatic</option>
        </select><br>
        <label for="avail_backup_dg">Availabilty of back-up diesel Genset ?</label>
        <select name="avail_backup_dg">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label for="dg_capacity">Availabilty of back-up diesel Genset</label>
        <input type="number" name="dg_capacity"/>
        <br>
        <button type="submit" class="button">SUBMIT</button>
        <button type="submit" class="next" ><a href="./Internet_line1.php">Next</a></button>



    </form>
</body>
</html> -->