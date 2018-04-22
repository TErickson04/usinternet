<?php
include('connect.php');
include('account.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	//push account to setup
	if(isset($_POST['setup'])){
		$id = $_POST['id'];
		$place = 2;
		$movedDate = date('Y-m-d H:i:s');
		$setup = new Account;
		$setup->setPlace($place,$id);
		$setup->setReport($id,$place,$movedDate);
	}
	//push account to active
	if(isset($_POST['activate'])){
		$id = $_POST['id'];
		$active = 1;
		$place = 3;
		$movedDate = date('Y-m-d H:i:s');
		$activate = new Account;
		$activate->setStatus($active,$id);
		$activate->setPlace($place,$id);
		$activate->setReport($id,$place,$movedDate);
	}
	//push account to inactive
	if(isset($_POST['deactivate'])){
		$id = $_POST['id'];
		$deactive = 0;
		$place = 4;
		$movedDate = date('Y-m-d H:i:s');
		$deactivate = new Account;
		$deactivate->setStatus($active,$id);
		$deactivate->setPlace($place,$id);
		$deactivate->setReport($id,$place,$movedDate);
	}
?>
<body>
	<table cellspacing="8">
		<thead>
			<tr>
				<th>Account ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Account Type</th>
				<th>Place</th>
				<th>Created Date</th>
			</tr>
		</thead>
		<tbody>
			<?php  
				$account2 = new Account;
				$account2->getAllAccounts();
			?>
		</tbody>
	</table>
		<form method="post">
			<label>Account ID</label>&nbsp;
			<input type="text" name="id" placeholder="Account ID">
			<input type="submit" name="setup" value="Setup">
			<input type="submit" name="activate" value="Activate">
			<input type="submit" name="deactivate" value="Deactivate">
		</form>		
		<a href="index.php">Create Account</a>
		<a href="reports.php">View Reports</a>

</body>
</html>