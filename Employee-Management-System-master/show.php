<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<iframe src="header.html" style="border:2px solid black;" height="160" width="100% "></iframe>

<div style="background-color:LightGray">
	<a href="add.html">
	<button class="btn btn-light" style="font-size:24px;">
		<i class="fa fa-pencil-square" style="color:dodgerblue"> ADD </i>
	</button>
	</a>

	<a href="edit.html">
	<button class="btn btn-light" style="font-size:24px;color:#3c3c3c">
		<i class="fa fa-edit" style="color:dodgerblue"> EDIT </i>
	</button>
	</a>

	<a href="search.html">
	<button class="btn btn-light" style="font-size:24px;color:#3c3c3c">
		<i class="fa fa-search" style="color:dodgerblue"> SEARCH</a></i>
	</button>
	</a>

	<a href="delete.html">
	<button class="btn btn-light" style="font-size:24px;color:#3c3c3c">
		<i class="fa fa-trash" style="color:dodgerblue"> DELETE </i>
	</button>
	</a>
</div>
<?php
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'root';
    $conn = mysqli_connect('localhost', 'root', 'root', 'myDB');

    if(! $conn )
    {
    	die('Could not connect: ' . mysql_error());
	}

	$sql='SELECT emp_id,emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date FROM employeee';

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

	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
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
	echo "</table>";
//	echo "<br>Fetched data successfully\n";
   	mysql_close($conn);
?>
</body>
</html>
