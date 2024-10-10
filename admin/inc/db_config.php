
<?php


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hotelprosjekt";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    die("Connection failed , cannot connect to Database: " . mysqli_connect_error());
}

function filteration($data){

foreach ($data as $key => $value) {
$data[$key] = trim($value);
$data[$key] = stripcslashes($value);
$data[$key] = htmlspecialchars($value);
$data[$key] = strip_tags($value);
}
 return $data;
}

function select($sql, $values, $datatypes)


{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) 
    {
        mysqli_stmt_bind_param($stmt, $datatypes,...$values);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return  $result;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -Select");
        }
       
    } else {
        die("Query cannot be prepared -Select");
    }
}




?>