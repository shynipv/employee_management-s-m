<html>
<head>
	<title>Add New Record in MySQL Database</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
  $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
   $conn = mysqli_connect('localhost', 'root', 'root', 'myDB');

    if(! $conn )
    {
      die('Could not connect: ' . mysql_error());
  }

  $id = $_POST['emp_id'];
  $sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE emp_id='$id'";

  mysql_select_db('myDB');
  $retval=mysql_query($sql, $conn);

  if(!$retval)
    die('Could not get data: ' . mysql_error());

  $row = mysql_fetch_array($retval, MYSQL_ASSOC);
?>

<body>
  <iframe src="header.html" style="border:2px solid black;" height="160" width="100% "></iframe>
	<div class="container">
	<form method = "POST" action = "edit.php">
    <table class="table table-striped">
      <tr>
          <td>Employee Id</td>
          <td><input type="text" name="emp_id" id="emp_id" value="<?php echo $row ['emp_id']; ?>" ></td>
      </tr>
     	<tr>
           	<td >Employee Name</td>
           	<td><input name = "emp_name" type = "text" id = "emp_name" value="<?php echo $row ['emp_name']; ?>"></td>
       	</tr>

       	<tr>
       		<td >Designation</td>
       		<td>
       		<select name="dropdown" id="dropdown" required>
       			<option value="">Please select</option>
       			<option value="Manager">Manager</option>
       			<option value="Supervisor">Supervisor</option>
       			<option value="Software Developer">Software Developer</option>
       		</select>
       		</td>
       	</tr>

   		<tr>
       		<td >Employee Address</td>
       		<td><input name = "emp_address" type = "text" id = "emp_address" value="<?php echo $row ['emp_address']; ?>" ></td>
       	</tr>

       	<tr>
       		<td >Mobile Number</td>
       		<td><input type="text" name="mob_number" id="mob_number" value="<?php echo $row ['mob_number']; ?>" ></td>
       	</tr>

       	<tr>
       		<td >Employee Salary</td>
       		<td><input name = "emp_salary" type = "text" id = "emp_salary" value="<?php echo $row ['emp_salary']; ?>" ></td>
       	</tr>

       	<tr>
       		<td >City </td>
        	<td><input type="text" name="city" id="city" value="<?php echo $row ['city']; ?>" > </td>
        </tr>

        <tr>
        	<td > </td>
        	<td>
				<button name = "add" type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>
        	</td>
        </tr>
    </table>
	</form>
</div>

<div align="center">
<a href="show.php">
  <button class="btn btn-secondary" style="font-size:32px;">
    <i class="fa fa-home"> HOME </i>
  </button>
</a>
</div>

</body>
</html>
<!--id,name,age,sex,designation,DOJ,salry,mobileNo,address,city -->
