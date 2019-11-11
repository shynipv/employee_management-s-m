<?php
   if(isset($_POST['add']))
   {
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = 'root';
       $conn = mysqli_connect('localhost', 'root', 'root', 'myDB');

      if(! $conn ) {
         die('Could not connect: ' . mysql_error());
      }

            $emp_name = $_POST['emp_name'];
            $sex = $_POST['sex'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $designation = $_POST['dropdown'];
            $emp_address = $_POST['emp_address'];
            $mob_number = $_POST['mob_number'];
            $emp_salary = $_POST['emp_salary'];
            $city = $_POST['city'];

            $sql = "INSERT INTO employeee ". "(emp_name,dob,age,sex,designation,mob_number,emp_address,city, emp_salary, join_date) ".
            "VALUES('$emp_name', '$dob', '$age', '$sex', '$designation', '$mob_number', '$emp_address','$city', '$emp_salary', NOW())";

            mysql_select_db('myDB');
            $retval = mysql_query( $sql, $conn );

            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }
            else
            {
               echo "Entered data successfully\n";
               header("location: show.php");
            }
            mysql_close($conn);
   }
?>
