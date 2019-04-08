
   
            <?php include ('header.php');?>
        
            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
			
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" size='40'></td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'></td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="emailAddress" name="emailAddress" id="emailAddress" size='40'></td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'></td>
                            </tr> 
                            <tr>
                                <td colspan='2'>
								<input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;
								<input type='reset' name="btnReset" id="btnReset" value="Reset Form"></td>
                            </tr>
                        </table>
                    </form>
				
			<h3>Sign Up newsletter</h3>     
    <?php

	$customerName=@$_GET['customerName'];
	$phoneNumber=@$_GET['phoneNumber'];
	$emailAddress=@$_GET['emailAddress'];
    $referral=@$_GET['referral'];
	$errmassage ="";
	$errorFlag = false;
	
	if (@$_GET["btnSubmit"] == "Sign up!" )  {
	   if ( isset($customerName) && !empty(trim($customerName))){
	
	   }else {echo "<span style= \"color: red\">Name required! </span><br>";}  //<span> element used to color a part of a text
	   
		if (isset($phoneNumber) && preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phoneNumber)) {
			 
		        }else {
				       $errorFlag = true;
			 		   echo "<span style= \"color: red\">Phone number should be 000-123-4567 formate!</span><br>";
					  }
					
		if (isset($emailAddress) && !filter_var( $emailAddress, FILTER_VALIDATE_EMAIL) === false) {
		
		     	}else { 
				       $errorFlag = true;
				       echo "<span style= \"color: red\">Enter a valid email!</span><br>";
					  }				
		if (@$_GET['referral'] =='newspaper' || @$_GET['referral']=='radio' || @$_GET['referral'] == 'TV' || @$_GET['referral'] == 'other'){				
			 
			    }else { 
						$errorFlag = true;
						echo "<span style= \"color: red\">Please select a referral!</span><br>";
					  } 
			if ( $errorFlag == false){
				
			    $mysql_host = "127.0.0.1";
				$mysql_user = "wp_eatery";
				$mysql_password = "password";
				$mysql_database = "wp_eatery";
				$mysql_commandTable = "mailinglist";
				
				//Instantiate & create connection
				$dbobj = new mysqli($mysql_host, $mysql_user, $mysql_password,$mysql_database);
				
				//Check for connect error or not
				if ($dbobj->connect_errno) { 
					die("Error connecting to database  ". $dbobj->connect_errno." ( ". $dbobj->connect_error. ")");
					}
                //prepare and bind					
			    $sqlqry = "INSERT INTO $mysql_database.$mysql_commandTable
										(customerName,phoneNumber,emailAddress,referrer) VALUES (?,?,?,?)";
			
			    $dbstmt = $dbobj->prepare($sqlqry);
				
				if (!$dbstmt) { die("Error during preparation phase");}
				
					$res = $dbstmt->bind_param('ssss',$customerName,$phoneNumber,$emailAddress,$referral);
					
				if (!$res) { die("Error during bind_param phase");}	
				
				$res = $dbstmt->execute();   
				
				if ( $dbstmt->errno || !$res ) { 
					die("Error inserting new row  ".$dbstmt->errno." ".$dbstmt->error);
				}
			
			echo "<span style= \"color: yellow\">Personal information was saved successfully!</span>";
		
		} else{
		
			   echo "<span style= \"color: red\">Missing or invalid field in Name, Phone Number, Email or Referral!</span>";
			  }
	
	    if(@$dbobj) $dbobj->close();
	}
	
	?>
                </div><!-- End Main -->
            </div><!-- End Content -->
			
    <?php include('footer.php'); ?>
		   
      
    
