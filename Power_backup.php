<?php 
    session_start();

	include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$UPS_availability = $_POST['UPS_availability'];
        $typeof_UPS = $_POST['typeof_UPS'];
        $UPS_capacity = $_POST['UPS_capacity'];
        $switchover = $_POST['switchover'];
        $avail_backup_dg = $_POST['avail_backup_dg'];
        $dg_capacity = $_POST['dg_capacity'];

        if(!empty($UPS_availability) && !empty($typeof_UPS) && !empty($UPS_capacity) && !empty($switchover) && !empty($avail_backup_dg) && 
            !empty($dg_capacity))
        {   //save to database
			//$user_id = random_num(20);
			$query = "insert into power_backup(UPS_availability,typeof_UPS,UPS_capacity,switchover,avail_backup_dg,dg_capacity) 
            values ('$UPS_availability','$typeof_UPS','$UPS_capacity','$switchover','$avail_backup_dg','$dg_capacity')";

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
</html>