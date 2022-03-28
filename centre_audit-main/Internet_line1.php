<?php 
    session_start();

	include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$connection_type = $_POST['connection_type'];
        $service_provider = $_POST['service_provider'];
        $internet_bandwidth = $_POST['internet_bandwidth'];
        $for_IBT = $_POST['for_IBT'];
        $clg_bandwidth = $_POST['clg_bandwidth'];

        if(!empty($connection_type) && !empty($service_provider) && !empty($internet_bandwidth) && !empty($for_IBT) && !empty($clg_bandwidth))
        {   //save to database
			//$user_id = random_num(20);
			$query = "insert into internet_line1(connection_type,service_provider,internet_bandwidth,for_IBT,clg_bandwidth) 
            values ('$connection_type','$service_provider','$internet_bandwidth','$for_IBT','$clg_bandwidth')";

			mysqli_query($con, $query);

			header("Location: Backup_internet.php");
			die;
		}
        else
		{
			echo "<script> alert('Please enter the details required');window.location='Internet_line1.php'</script>";
		}
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

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
                            <a href="./Basic_details.php">Detail 1</a>
                        </li>
                        <li>
                            <a href="#">Detail 2</a>
                        </li>
                        <li>
                            <a href="#">Detail 3</a>
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
            <h2 id="heading">Internet Line</h2><hr>

            <form id="form" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Type of internet connection</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="connection_type" value="Broadband" id="flexRadioDefault1" require>Broadband
                            <br>
                            <input class="form-check-input" type="radio" name="connection_type" Lease Line id="flexRadioDefault1">
                            Lease Line
                        </div>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name of internet Service Provider</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Service Providers" name="service_provider" require>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Internet Bandwidth (in MBPS)</label>
                        <input type="number" class="form-control" id="inputEmail4" placeholder="in MBPS" name="internet_bandwidth" require>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Suitable for IBT?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="for_IBT" value="Yes" id="flexRadioDefault1" require>YES
                            <br>
                            <input class="form-check-input" type="radio" name="for_IBT" value="No" id="flexRadioDefault1">NO
                        </div>
                    </div>
                    
                </div>  
                 <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">How much Internet Bandwidth will college provide during Exam?</label>
                        <input type="number" class="form-control" id="inputEmail4" name="clg_bandwidth"placeholder="Internet Bandwidth" require>
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
        <label>Select Type of internet connection</label>
        <select name="connection_type">
            <option>Broadband</option>
            <option>Lease line</option>
        </select><br>
        <label>Name of internet Service Provider</label>
        <input type="text" name="service_provider"/>
        <label>Internet Bandwidth (in MBPS)</label>
        <input type="number" name="internet_bandwidth"/>
        <label>Suitable for IBT?</label>
        <select name="for_IBT">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <label>How much Internet Bandwidth will college provide during Exam</label>
        <input type="number" name="clg_bandwidth"/>
        <br>
        <button type="submit" class="button">SUBMIT</button>
        <button type="" class="next" name="fetch"><a href="./Backup_internet.php">Next</a></button>
       

        
    </form>
</body>
</html> -->