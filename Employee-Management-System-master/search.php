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
    $dbpass = '';
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);

    if(! $conn )
    {
    	die('Could not connect: ' . mysql_error());
	}

	$id = $_POST['emp_id'];
	$emp_name = $_POST['emp_name'];
	$designation = $_POST['dropdown'];
	$city = $_POST['city'];

//	$id=NULL;
	if(($id!=""))
	{
		$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE emp_id='$id' ";
	}
	else if($emp_name!="")
	{
		$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE emp_name LIKE '$emp_name%';";

		if(($designation!="") && ($city=="")){
			$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE designation='$designation' AND emp_name LIKE '$emp_name%';";
		}
		else if(($designation=="") && ($city!="")){
			$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE city='$city'AND emp_name LIKE '$emp_name%';";
		}
		else if(($designation!="") && ($city!="")){
			$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE designation='dropdown' AND city='$city' AND emp_name LIKE '$emp_name%';";
		}

	}
	else if(($designation!="") && ($city==""))
	{
		$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE designation='$designation' ";
	}
	else if(($designation=="") && ($city!=""))
	{
		$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE city='$city' ";
	}
	else if(($designation!="") && ($city!=""))
	{
		$sql="SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee WHERE city='$city' AND designation='$designation' ";
	}

	mysql_select_db('myDB');
	$retval=mysql_query($sql, $conn);

	if(!$retval)
		die('Could not get data: ' . mysql_error());

	echo "<table class = 'table table-hover'>";
	echo "<thead>";
	echo "<td width = '20'>ID</td>";
	echo "<td width = '120'>Name</td>";
	echo "<td width ='100'>Date of Birth</td>";
	echo "<td width ='50'>Age</td>";
	echo "<td width ='40'>Sex</td>";
	echo "<td width ='80'>Designation</td>";
	echo "<td width ='100'>Mobile</td>";
	echo "<td width ='200'>Address</td>";
	echo "<td width ='50'>City</td>";
	echo "<td width ='50'>Salary</td>";
	echo "<td width ='50'>Join Date</td>";
	echo "</thead>";

	$found=0;
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
		$found=1;
		//if($row['emp_id']==$id || $row['designation']==$designation )
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
	if(!$found)
		echo "<br>No Match Found\n";
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