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
        <div class="col-lg-8 m-auto d-block">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user"> lab: </label>
                <input type="text" name="username" id="user" class="form-control">
            </div>
            <div class="form-group">
                <label for="file"> lab picture: </label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <input type="submit" name="submit" value="submit" class="btn btn-success">
        </form>
        </div>
    </div>
</body>
</html>