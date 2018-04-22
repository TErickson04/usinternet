<?php
//Account class that connects to Database project
class Account extends Dbh {	
	
	public $fname;
	public $lname;
	public $email;
	public $accountType;
	public $active;
	public $place;
	public $created;
	
	public function setAccountInfo($fname, $lname, $email, $accountType, $active,$place,$created){
		//INSERT query to set account information
		$stmt = $this->connect()->query("INSERT INTO accounts(first_name, last_name, email, account_type_id, active,place,created_on) VALUES('$fname', '$lname', '$email', '$accountType', '$active','$place','$created')");
		
	}
	
	public function getAllAccounts(){
		//SELECT query to get all information from table accounts
		$stmt = $this->connect()->query("SELECT * FROM accounts");
		//SELECT query to get account_type from accounts_type table and match with id from accounts table
		$stmt2 = $this->connect()->query("SELECT account_type FROM account_types JOIN accounts ON account_types.id = accounts.account_type_id");
		//SELECT query to get account status (place from table status) and match with id from accounts table
		$stmt3 = $this->connect()->query("SELECT status.place FROM status JOIN accounts ON status.id = accounts.place  
										ORDER BY `accounts`.`id` ASC");
		//while loop to dispaly queried infromation
		while(($row = $stmt->fetch())&&($row2 = $stmt2->fetch())&&($row3= $stmt3->fetch())){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			//label account active or inactive
			if($row['active']==0){echo "<td>Inactive</td>";}else{echo"<td>Active</td>";}
			echo "<td>".$row2['account_type']."</td>";
			echo "<td>".$row3['place']."</td>";
			echo "<td>".$row['created_on']."</td>";
			echo "</tr>";			
		}
		
	}
	
	public function setPlace($place,$id){
		//UPDATE query to set account place(place in accounts table)
		$stmt = $this->connect()->query("UPDATE accounts SET place = '$place' WHERE id ='$id'");
		
	}
	
	public function setStatus($active,$id){
		//UPDATE query to set account status(active/inactive) in accounts table
		$stmt = $this->connect()->query("UPDATE accounts SET active = '$active' WHERE id ='$id'");
		
	}
	
	public function setReport($id,$place,$movedDate){
		//INSERT query to show when account was moved
		$stmt = $this->connect()->query("INSERT INTO reports(account_id,place,moved_on)VALUES('$id','$place','$movedDate')");
	}
	
	public function getInactiveAccounts(){
		//SELECT query to get all information from table accounts where place = inactive
		$stmt = $this->connect()->query("SELECT * FROM accounts WHERE place = 1 OR place = 2");
		
		//while loop to dispaly queried infromation
		while(($row = $stmt->fetch())){
			echo "<tr>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			//label account active or inactive
			if($row['active']==0){echo "<td>Inactive</td>";}else{echo"<td>Active</td>";}
			//label account type to gold, silver, or platinim
			if($row['account_type_id']==1){echo "<td>Silver</td>";}elseif($row['account_type_id']==2){echo"<td>Gold</td>";}else{echo"<td>Platinum</td>";}
			//label place to Confirmation or Setup
			if($row['place']==1){echo "<td>Confirmation</td>";}else{echo"<td>Setup</td>";}
			echo "<td>".$row['created_on']."</td>";
			echo "</tr>";			
		}
		
	}
	
	public function getDailyReport(){
		//SELECT query to get report of accounts moved in the last day
		$stmt = $this->connect()->query("SELECT reports.account_id, accounts.first_name, accounts.last_name, accounts.email, status.place, 											account_types.account_type, reports.moved_on
										FROM `reports`
											JOIN accounts
												ON reports.account_id = accounts.id
											JOIN status
												ON reports.place = status.id
											 JOIN account_types
												ON accounts.account_type_id = account_types.id
										WHERE DATE(reports.moved_on) >= DATE(NOW() - INTERVAL 1 DAY)
										ORDER BY reports.moved_on ASC");
		while($row = $stmt->fetch()){
			echo "<tr>";
			echo "<td>".$row['account_id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			//label account active or inactive
			if($row['active']==0){echo "<td>Inactive</td>";}else{echo"<td>Active</td>";}
			echo "<td>".$row['account_type']."</td>";
			echo "<td>".$row['place']."</td>";
			echo "<td>".$row['moved_on']."</td>";
			echo "</tr>";
		}
	}
	
	public function getWeeklyReport(){
		//SELECT query to get report of accounts moved in the last day
		$stmt = $this->connect()->query("SELECT reports.account_id, accounts.first_name, accounts.last_name, accounts.email, status.place, 											account_types.account_type, reports.moved_on
										FROM `reports`
											JOIN accounts
												ON reports.account_id = accounts.id
											JOIN status
												ON reports.place = status.id
											 JOIN account_types
												ON accounts.account_type_id = account_types.id
										WHERE DATE(reports.moved_on) > DATE(NOW() - INTERVAL 8 DAY)
										ORDER BY reports.moved_on ASC");
		while($row = $stmt->fetch()){
			echo "<tr>";
			echo "<td>".$row['account_id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			//label account active or inactive
			if($row['active']==0){echo "<td>Inactive</td>";}else{echo"<td>Active</td>";}
			echo "<td>".$row['account_type']."</td>";
			echo "<td>".$row['place']."</td>";
			echo "<td>".$row['moved_on']."</td>";
			echo "</tr>";
		}
	}
	
	public function getMonthlyReport(){
		//SELECT query to get report of accounts moved in the last day
		$stmt = $this->connect()->query("SELECT reports.account_id, accounts.first_name, accounts.last_name, accounts.email, status.place, 											account_types.account_type, reports.moved_on
										FROM `reports`
											JOIN accounts
												ON reports.account_id = accounts.id
											JOIN status
												ON reports.place = status.id
											 JOIN account_types
												ON accounts.account_type_id = account_types.id
										WHERE DATE(reports.moved_on) > DATE(NOW() - INTERVAL 31 DAY)
										ORDER BY reports.moved_on ASC");
		while($row = $stmt->fetch()){
			echo "<tr>";
			echo "<td>".$row['account_id']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['email']."</td>";
			//label account active or inactive
			if($row['active']==0){echo "<td>Inactive</td>";}else{echo"<td>Active</td>";}
			echo "<td>".$row['account_type']."</td>";
			echo "<td>".$row['place']."</td>";
			echo "<td>".$row['moved_on']."</td>";
			echo "</tr>";
		}
	}
	
}

?>