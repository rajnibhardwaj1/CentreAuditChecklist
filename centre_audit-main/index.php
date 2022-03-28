<?php
// include("./indexconfig.php");
if($_SERVER['REQUEST_METHOD']=="POST")
if(isset($_POST['emp_b']))
{   
    $emp_id=$_POST['emp_id'];
    $emp_pass=$_POST['emp_pass'];
    if(!empty($emp_id) && !empty($emp_pass))
    {
        $query = "select * from employee where emp_id = '$emp_id' limit 1";

			$result=mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['emp_pass'] === $emp_pass)
					{

						// $_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ../forms/Basic_details.php");
						die;
					}
                    else{
                         echo "<script> alert('Wrong Password!');window.location='index.php'</script>";
                    }
				}

            }
            echo "<script> alert('Wrong Username!');window.location='index.php'</script>";
    }
    
    // else{
    //     echo "enter details";
    // }
}
else
{   
    $admin_id=$_POST['admin_id'];
    $admin_pass=$_POST['admin_pass'];
    if(!empty($admin_id) && !empty($admin_pass))
    {
        $query = "select * from admin where admin_id = '$admin_id' limit 1";

			$result=mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['admin_pass'] === $admin_pass)
					{

						// $_SESSION['user_id'] = $user_data['user_id'];
						header("Location: ../admin/admin.php");
						die;
					}
                    else{
                         echo "<script> alert('Wrong Password!');window.location='index.php'</script>";
                    }
				}

            }
            echo "<script> alert('Wrong Username!');window.location='index.php'</script>";
    }
    
    // else{
    //     echo "enter details";
    // }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    </script>
    <link rel="stylesheet" href="./style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="post">
            <h2 class="title">Sign in For Employee</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="User ID" name="emp_id"required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password"  name="emp_pass"required/>
            </div>
            <input type="submit" value="Login" name="emp_b"class="btn solid" />
            
          </form>
          <form action="#" class="sign-up-form" method="post">
            <h2 class="title">Sign In for Admin</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="admin_id" required/>
            </div>
            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="admin_pass" required />
            </div>
            <input style="background-color: #d9ab02" type="submit" class="btn" value="Log in" name="admin_b"/>
            
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>For Admin ?</h3>
            
            <button class="btn transparent" id="sign-up-btn">
              Login
            </button>
          </div>
          <img src="./img/user.svg" class="image" alt="" /  >
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>For Employee ?</h3>
            
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="./img/admin1.svg" class="image" alt="" />
        </div>
      </div>
      
</div>

<script src="./app.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
  $(function(){
    $('$footer').load('footer.html');
  })
</script> -->
  </body>
</html>