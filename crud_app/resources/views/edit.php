<?php 
include  'dbconnection.php';
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT id,name,email,contact_no,gender,qualification,address from student_details where id=:uid";

//Prepare the query:
$query = $dbconnection->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
$Names = $result->name;
$Emaiids = $result->email;
$contactno = $result->contact_no;
$genders = $result->gender;
$eductions = $result->qualification;
$addresss = $result->address;
	
	
		}
	}
	?>
 <?php

if(isset($_POST['submit']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['contactno'];
$gender = $_POST['gender'];
$eduction = $_POST['qualification'];
$address = $_POST['address'];
// Query for Updation
$sql="update student_details set name=:names,email=:emailid,contact_no=:mobileno,gender=:gendr,qualification=:eductions,address=:addresss where id=:uid";

//Prepare Query for Execution
$query = $dbconnection->prepare($sql);
// Bind the parameters
$query->bindParam(':names',$name,PDO::PARAM_STR);
$query->bindParam(':emailid',$email,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobile,PDO::PARAM_STR);
$query->bindParam(':gendr',$gender,PDO::PARAM_STR);
$query->bindParam(':eductions',$eduction,PDO::PARAM_STR);
$query->bindParam(':addresss',$address,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='fetch.php'</script>";
}
	?>


<link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Update data from Database Using PHP</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form method="POST">
			    			
                            <div class="form-group">
			    				<label for="name">Name</label>
			    				<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name" required="" value="<?php echo $Names;?>">
			    			</div>
			    			<div class="form-group">
			    				<label for="email">Email</label>
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required="" value="<?php echo $Emaiids; ?>">
			    			</div>
			    			<div class="form-group">
			    				<label for="contactno">Contact No</label>
			    				<input type="text" name="contactno" id="contactno" class="form-control input-sm" placeholder="Contact No" required="" maxlength="10" value="<?php echo $contactno; ?>">
			    			</div>
			    			<div class="form-group">
			    				<label for="name">Gender</label>
			    				 <input type="radio" name="gender" value="Male" <?php if ($genders == 'Male') echo 'checked="checked"'; ?>" /> Male
                               <input type="radio" name="gender" value="Male" <?php if ($genders == 'Female') echo 'checked="checked"'; ?>" /> Female
      
			    			</div>
			    			<div class="form-group">
			    				<label for="qualification">Qualification</label>
			    				<select name="qualification" id="qualification" class="form-control input-sm" placeholder="Qualification" required="">
			    					<option value="NA">--select--</option>
			    					<option value="10th"<?php if($eductions=='10th')echo 'selected'?>>10th</option>
			    					<option value="12th"<?php if($eductions=='12th')echo 'selected'?>>12th</option>
			    					<option value="Graduation"<?php if($eductions=='Graduation')echo 'selected'?>>Graduation</option>
	
			    				</select>
			    			</div>
			    			<div class="form-group">
			    				<label for="name">Address</label>
			    				<textarea name="address" id="address" class="form-control input-sm" required=""><?php echo $addresss; ?></textarea>
			    			</div>
                               <input type="submit" name="submit" value="Update" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    <style type="text/css">
    	body{
    background-color: #fff;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
    </style>