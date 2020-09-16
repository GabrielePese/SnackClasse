
<?php

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "dbhotel";

// $conn = new mysqli($servername,$username,$password,$dbname);
// if ($conn && $conn->$connect_error) {
//     echo "connection failed:". $conn->connect_error;
//     return;
// }




//         // SELECT YEAR(date_of_birth), name
//         // FROM ospiti
//         // WHERE document_type LIKE 'Driver License'
//         // AND YEAR(date_of_birth) = ?

// $sql = "
//         INSERT INTO pagamenti (status, price, prenotazione_id, pagante_id )
//         VALUES ( ?, ? , ? ,? )
//     ";

// $stmt = $conn->prepare($sql);
// $stmt ->bind_param("sdii", $status,$price,$prenotazione_id,$pagante_id);


// $status = $_POST['status'];
// $price = $_POST['price'];
// $prenotazione_id = $_POST['prenotazione_id'];
// $pagante_id = $_POST['pagante_id'];

// // echo $status, $price,$prenotazione_id,$pagante_id;
// // die();

// $result = $stmt->execute();
// // $result = $stmt -> get_result();


// // $result = $conn->query($sql);  

// if ($result && $result->num_rows > 0) {

    
//     while($row = $result->fetch_assoc()){
    
//     echo  $row['name']. " " . $row['lastname']. " " .$row['date']. " " .$row['doctype']. " " .$row['doc']. " " .  "<br>";
   
// } 

// }

// elseif ($result){
//     echo "0 result";
// }else {
//     echo "query error";
// }
// $conn -> close();




// QUI SOTTO SCRIVIAMO LA STESSA COSA MA CON LE FUNZIONI 
// QUI SOTTO SCRIVIAMO LA STESSA COSA MA CON LE FUNZIONI 


function getConnection (
    $servername = "localhost",
    $username = "root",
    $password = "root",
    $dbname = "dbhotel"
    ){
    
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn && $conn->$connect_error) {
    echo "connection failed:". $conn->connect_error;
    return;
}
return $conn;
};


function inserPaganti ($conn){
    $sql = "
        INSERT INTO paganti (ospite_id, name, lastname, address)
        VALUES ( ?, ? , ? ,? )
    ";

    $stmt = $conn->prepare($sql);
    $stmt ->bind_param("isss",$ospite_id, $name, $lastname, $address);

    $ospite_id =$_POST['ospite_id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];


$result = $stmt->execute();

return $result;
};

function printResult($result){
    if ($result && $result->num_rows > 0) {

    
        while($row = $result->fetch_assoc()){
        
        echo  $row['name']. " " . $row['lastname']. " " .$row['date']. " " .$row['doctype']. " " .$row['doc']. " " .  "<br>";
       
    } 
    
    }
    
    elseif ($result){
        echo "0 result";
    }else {
        echo "query error";
    }
};

$conn = getConnection();
$result = inserPaganti($conn);
printResult($result);

$conn -> close();
