<?php 
    session_start();

	include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$des_config = $_POST['des_config'];
        $ram_avail = $_POST['ram_avail'];
        $disk_space = $_POST['disk_space'];
        $monitor_type = $_POST['monitor_type'];
        $os_name = $_POST['os_name'];
        $ie_version = $_POST['ie_version'];
        $os_license = $_POST['os_license'];
        $antivirus_name = $_POST['antivirus_name'];
        $Branded_machine = $_POST['Branded_machine'];
        $dotnet_install = $_POST['dotnet_install'];
        $distance_norms = $_POST['distance_norms'];
        $thin_client = $_POST['thin_client'];


        if(!empty($des_config) && !empty($ram_avail) && !empty($disk_space) && !empty($monitor_type) && !empty($os_name) && 
            !empty($ie_version) && !empty($os_license) && !empty($antivirus_name)&& !empty($Branded_machine)
            && !empty($dotnet_install)&& !empty($distance_norms)&& !empty($thin_client))
        {   //save to database
			//$user_id = random_num(20);
			$query = "insert into desktop_detail(des_config,ram_avail,disk_space,monitor_type,os_name,ie_version,os_license,
            antivirus_name,Branded_machine,dotnet_install,distance_norms,thin_client) 
            values ('$des_config','$ram_avail','$disk_space','$monitor_type','$os_name','$ie_version','$os_license',
            '$antivirus_name','$Branded_machine','$dotnet_install','$distance_norms','$thin_client')";

			mysqli_query($con, $query);

			header("Location: Power_backup.php");
			die;
		}
        else
		{
			echo "<script> alert('Please enter the details required');window.location='Desktop_config.php'</script>";
		}
    }
?>



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
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Basic Details</a>
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

            <h2 id="heading">Desktop Details</h2><hr>
            <form id="form" method="post">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputState">Desktop Configuration in Lab</label>
                        <select id="inputState" class="form-control" name="des_config">
                            <option selected>Choose...</option>
                            <option>PIV</option>
                            <option>Dual</option>
                            <option>2.4GHz</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">RAM available on each desktop</label>
                        <select id="inputState" class="form-control" name="ram_avail" >
                            <option selected>Choose...</option>
                            <option>1GB</option>
                            <option>2GB</option>
                            <option>4GB</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Minimum hard disk space available on desktop</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Min Hardisk Space" name="disk_space" require>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Type of Monitors</label>
                        <select id="monitortype" class="form-control" name="monitor_type">
                            <option selected>choose</option>
                            <option>CRT</option>
                            <option>15th</option>
                            <option>17th</option>
                            <option>TFT</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Operating system on desktops</label>
                        <select id="monitortype" class="form-control" name="os_name">
                            <option selected>choose</option>
                            <option>XP</option>
                            <option>2003</option>
                            <option>Linux</option>
                            <option>windows</option>

                        </select>
                    </div>
                    <div class="form-group col-md-6">

                        <label for="inputState">IE version on desktops</label>
                        <select id="monitortype" class="form-control" name="ie_version">
                            <option selected>choose</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>NO</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">License OS in all Client node</label>
                       
                        <input type="text" class="form-control" id="License" placeholder="License OS in all Client node" name="os_license" require>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name of Antivirus installed on PC's</label>
                        
                        <input type="text" class="form-control" id="Antivirus" name="antivirus_name" placeholder="Name of Antivirus installed on PC's" require>
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Branded Machines?</label>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Branded_machine" value ="Yes"id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" name="Branded_machine" value ="NO"id="flexRadioDefault1">NO
                            
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">.Net Framework 4.0 or higher installed?</label>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio"  id="ramework" value="Yes" name="dotnet_install" require>YES
                            <br>
                            <input class="form-check-input" type="radio"  id="ramework" value="No"name="dotnet_install">NO
                    
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Head to Head seating distance will be as per norms of Health ministry of India 
                            i.e. 6 feet head to head distance?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="count" value="yes"name="distance_norms" require> YES
                            <br>
                            <input class="form-check-input" type="radio" id="count" value="No"name="distance_norms">NO
                        </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="inputEmail4">College has Thin client?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"  id="client" value="Yes"name="thin_client" require>YES
                            <br>
                            <input class="form-check-input" type="radio"  id="client" value="NO"name="thin_client">No
                        </div>
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