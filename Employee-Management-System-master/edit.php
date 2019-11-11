<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<iframe src="header.html" style="border:2px solid black;" height="160" width="100% "></iframe>

<?php
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
     $conn= mysqli_connect('localhost', 'root', 'root', 'myDB');

    if(! $db )
    {
    	die('Could not connect: ' . mysql_error());
	}
	$id = $_POST['emp_id'];
	$emp_name = $_POST['emp_name'];
    $designation = $_POST['dropdown'];
    $emp_address = $_POST['emp_address'];
    $mob_number = $_POST['mob_number'];
    $emp_salary = $_POST['emp_salary'];
    $city = $_POST['city'];


	$sql="UPDATE employeee
		SET emp_name='$emp_name', designation='$designation', emp_address='$emp_address', mob_number='$mob_number', emp_salary='$emp_salary', city='$city'
		WHERE emp_id='$id';";

	mysql_select_db("myDB");
	$retval=mysql_query($sql, $conn);

	if(!$retval)
		die('1. Could not get data: ' . mysql_error());

	$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE emp_id='$id'";
	$retval=mysql_query($sql, $conn);
	if(!$retval)
		die('2. Could not get data: ' . mysql_error());

	echo "<table class = 'table table-hover'>";
	echo "<thead>";
	echo "<td>ID</td>";
	echo "<td>Name</td>";
	echo "<td>Date of Birth</td>";
	echo "<td>Age</td>";
	echo "<td>Sex</td>";
	echo "<td>Designation</td>";
	echo "<td>Mobile</td>";
	echo "<td>Address</td>";
	echo "<td>City</td>";
	echo "<td width ='50'>Salary</td>";
	echo "<td width ='50'>Join Date</td>";
	echo "</thead>";

	$row = mysql_fetch_array($retval, MYSQL_ASSOC);
	{
		if($row['emp_id']==$id)
		{
		echo "<tr>";
		echo "<td>{$row['emp_id']}</td>".
			"<td>{$row['emp_name']}</td> ".
			"<td>{$row['dob']} </td>".
			"<td>{$row['age']} </td>".
			"<td>{$row['sex']} </td>".
			"<td>{$row['designation']} </td>".
			"<td>{$row['mob_number']} </td>".
			"<td>{$row['emp_address']} </td>".
			"<td>{$row['city']} </td>".
			"<td>{$row['emp_salary']} </td>".
			"<td>{$row['join_date']} </td>";
		echo "</tr>";
			}
	}
	echo "</table>";
//	echo "<br>Fetched data successfully\n";
   	mysql_close($conn);
?>

<div align="center">
<a href="show.php">
  <button class="btn btn-secondary" style="font-size:32px;">
    <i class="fa fa-home"> HOME </i>
  </button>
</a>
</div>

</body>
</html>
