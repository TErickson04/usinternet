<?php
include('connect.php');
include('account.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	//create account
	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$accountType = $_POST['accountType'];
		$active = false;
		$place = 1;
		$created = date('Y-m-d H:i:s');
		$movedDate = date('Y-m-d H:i:s');
		$account = new Account;
		$account->setAccountInfo($fname, $lname, $email, $accountType, $active, $place, $created);
		$account->setReport($id,$place,$movedDate);
	}
	
?>
<!--Form to make initial account  -->
	<form method="post" >
		<fieldset class="col-md-4">
			<legend>Account Information</legend>
			<div class="form-group">
			  <label for="fname">First Name:</label>
			  <input type="text" class="form-control" name="fname" required>
			</div>
			<div class="form-group">
			  <label for="lname">Last Name:</label>
			  <input type="text" class="form-control" name="lname" required>
			</div>
			<div class="form-group">
			  <label for="email">Email:</label>
			  <input type="email" class="form-control" name="email" required>
			</div>
			<div class="form-group">
			  <label for="sel1">Account Type:</label>
			  <select class="form-control" name="accountType" required>
				<option>Select an account type</option>
				<option value="1">Silver - $10</option>
				<option value="2">Gold - $15</option>
				<option value="3">Platinum - $20</option>
			  </select>
			</div>
			<input type="submit" name="submit" value="Submit"><br><br>		
		</fieldset>
	</form>	
	<a href="viewdata.php">View Accounts</a><br>
	<a href="reports.php">View Reports</a>

</body> 
</html>