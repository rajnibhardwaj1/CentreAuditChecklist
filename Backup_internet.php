<!doctype html>
<html lang="en">

<head>
    <title>power backup</title>
</head>
<body>
    <form>
        <label>Select Type of internet connection</label>
        <select name="b_connection_type">
            <option>Broadband</option>
            <option>Lease line</option>
        </select><br>
        <label>Name of internet Service Provider</label>
        <input type="text" name="b_service_provider"/>
        <label>Internet Bandwidth (in MBPS)</label>
        <input type="number" name="b_internet_bandwidth"/>
        <label>Suitable for IBT?</label>
        <select name="b_for_IBT">
            <option>Yes</option>
            <option>No</option>
        </select><br>
        <button type="submit" class="next" ><a href="./Network_details.php">Next</a></button>

        
    </form>
</body>
</html>