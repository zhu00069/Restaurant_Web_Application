   
    <?php include('header.php'); ?>
   
	<h3>Database Table Content</h3>
    <?php
				$mysql_host = "127.0.0.1";
				$mysql_user = "wp_eatery";
				$mysql_password = "password";
				$mysql_database = "wp_eatery";
				$mysql_commandTable = "mailinglist";                                           //at least 4 arguements
				
				$dbobj = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database); //create a mysqli object,establish a database connection.
				
				if ($dbobj->connect_errno) { 
					die("Error connecting to database  ". $dbobj->connect_errno." ( ". $dbobj->connect_error. ")");
				}
			$sqlqry = "SELECT * FROM `$mysql_commandTable`";
		
			$dbstmt = $dbobj->prepare($sqlqry);
			if (!$dbstmt) { die("Error during preparation phase");}
		
			$res = $dbstmt->execute();
		
			if($dbstmt->errno || !$res) { 
				die("Error executing SELECT query  ". $dbstmt->errno." ". $dbstmt->error);
			}


			$dbresult = $dbstmt->get_result();
			if (!$dbresult) { die("Error creating result set");}	
		
			if ($dbresult->num_rows == 0)  { 
				echo "Table contains no rows";
			} else
			{
				echo "<table border='1'>";
				echo "<tr><th> Customer Name</th><th>Phone Number</th><th>Email address</th><th>Reference</th></tr>";
				while ($row = $dbresult->fetch_assoc())
				{
					$action = htmlspecialchars($_SERVER['PHP_SELF']);
					echo "<tr>";
					echo "<td>".$row['customerName']."</td><td>".$row['phoneNumber']."</td><td><a  href=\"$action?email=".$row['emailAddress']."&amp;optype=SEL\">".$row['emailAddress']."</a> </td><td>".$row['referrer']."</td>";
					echo "</tr>";

				}
				echo "</table>";

			}	
			if(@$dbobj) $dbobj->close();
    ?>
	
	<?php include('footer.php'); ?>
	
	