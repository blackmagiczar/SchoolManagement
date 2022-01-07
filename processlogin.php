


<div class="processedlogin">
  <?php 
    include "connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
	  session_start();
          if(isset($_POST['password']) && isset($_POST['first'])){
			$userN = "name";
			$userPass  = "password";
	        $name = $_POST['first'];
		    $password = $_POST['password'];
		    if($name != "" && $password != ""){
			  setcookie($userN,$name);
			  setcookie($userPass,$password);
			  echo "<p>passed form data here</p>";
			  $sqlPasswCheck = "SELECT*FROM registration WHERE password1 = ".'"'.$password.'"';
			  $sqlUsername = "SELECT*FROM registration WHERE firstN = ".'"'.$name.'"';
			  $passwordRes = mysqli_query($conn,$sqlPasswCheck);
			  $usernameRes = mysqli_query($conn,$sqlUsername);
			  $cornfirmPassw = mysqli_fetch_array($passwordRes);
			  $checkUsername = mysqli_fetch_array($usernameRes);
			  if(isset($checkUsername)){
				  if(isset($cornfirmPassw)){
					  echo "<p>Hello! ". $name . ". your password is ". $password .'. <a href = "processSessionData.php">Click here to view details</a>'."</p>";
				  }
				  else{
					  echo '<p>'."incorrect username and password".'</p>';
				  }
			  }
			  else{
				  echo '<p>'."incorrect username and password".'</p>';
			  }
		    }
		    else{
			  echo ("Missing inputs from the form entry fields.");
			  include "Login-form.php";
		    }	 
	      }
	}
  ?>			
</div>