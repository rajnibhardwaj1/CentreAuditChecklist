<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>imageupload</title>
    <style>
        *{
            margin: 10px;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-transform:uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-white bg-dark text-center">
            Register form for events
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <th>id</th>
                    <th>username</th>
                    <th>profile pic</th>
                </thead>
                <tbody>
                    <?php
                    $con2=mysqli_connect('localhost','root');
                    mysqli_select_db($con2,'test2');
                    if(isset($_POST['submit'])){
                        $username=$_POST['username'];
                        $files=$_FILES['file'];
                        // print_r($username);
                        // echo "<br/>";
                        // print_r($files);
                        $filename=$files['name'];
                        // print_r($filename);
                        $fileerror=$files['error'];
                        $filetemp=$files['tmp_name'];

                        $fileext=explode('.',$filename);
                        $filecheck=strtolower(end($fileext));

                        $fileextstored=array('jpg','jpeg');

                        if(in_array($filecheck,$fileextstored)){
                            $destinationfile='upload/'.$filename;
                            move_uploaded_file($filetemp,$destinationfile);
                            
                            $q="INSERT INTO `imgupload`(`username`, `image`) VALUES ('$username','$destinationfile')";
                            $query=mysqli_query($con2,$q);

                            $displayquery="SELECT * FROM imgupload";
                            $querydisplay=mysqli_query($con2,$displayquery);
                            // $row=mysqli_num_rows($querydisplay);
                            
                            while($result=mysqli_fetch_array($querydisplay)){
                                ?>
                                <tr>
                                    <td><?php echo $result['id']?></td>
                                    <td><?php echo $result['username']?></td>
                                    <td><img src="<?php echo $result['image']?>" height="100px" width="100px"></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>