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

			//header("");
			die;
		}
        else
		{
			echo "<script> alert('Please enter the details required');window.location='Power_backup.php'</script>";
		}
    }
?>
<!doctype html>
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
</html>