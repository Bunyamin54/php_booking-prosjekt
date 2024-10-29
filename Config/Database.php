
<?php

// * Definerer databaseforbindelsesdetaljer  

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "hotelprosjekt";

//* Oppretter en forbindelse til databasen ved hjelp av mysqli_connect()

$con = mysqli_connect($hostname, $username, $password, $dbname);

//? Sjekker om tilkoblingen til databasen er vellykket

if (!$con) {
    die("Connection failed , cannot connect to Database: " . mysqli_connect_error());
}



// *  Definerer en funksjon for å filtrere og rense data fra skjemaer

function filteration($data)
{

    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);

        $data[$key] = $value;
    }
    return $data;
}

  function selectAll($table) 
  {
  
    $con = $GLOBALS['con'];
   
     $res = mysqli_query($con, "SELECT * FROM $table");
     
    return $res;


  }

// * Definerer en funksjon for å kjøre SELECT-spørringer mot databasen

function select($sql, $values, $datatypes)


{   // * Henter den globale variabelen $con 

    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
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

function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return  $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -Update");
        }
    } else {
        die("Query cannot be prepared -Update");
    }
}

function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return  $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -Insert");
        }
    } else {
        die("Query cannot be prepared -Insert");
    }
}


function delete($sql, $values, $datatypes)
{
    $con = $GLOBALS['con'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return  $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query cannot be executed -Delete");
        }
    } else {
        die("Query cannot be prepared -Delete");
    }
}


?>