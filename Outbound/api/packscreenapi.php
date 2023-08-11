<?php

include_once("../../include/mysql_connection.php"); 

// Get the date range parameters
$FD = $_GET['fd'];
$TD = $_GET['td'];

// Prepare the SQL query using prepared statements
// $sql = "SELECT `Order`.`Order_Number`, `Order`.`Pdf_link`, `Order`.`City`, `Order`.`Tracking`, `addition`.`Image_1`, `Order`.`SKU`, `Order`.`Total`, `Order`.`Price`, `Order`.`Status`
//         FROM `Order`
//         INNER JOIN `addition` ON `addition`.`SKU` = `Order`.`SKU`
//         WHERE `Order`.`Status` = 'Booked'
//         AND `Order`.`Date` BETWEEN ? AND ?
//         LIMIT 500"; 
    
    
    $sql = "SELECT `Order`.`Order_Number`, `Order`.`Item_Status`, `Order`.`Dispatch_Advise`, `Order`.`Pdf_link`, `Order`.`City`, `Order`.`Tracking`, `addition`.`Image_1`, `Order`.`SKU`, `Order`.`Total`, `Order`.`Price`, `Order`.`Status`
        FROM `Order`
        INNER JOIN `addition` ON `addition`.`SKU` = `Order`.`SKU`
        WHERE `Order`.`Status` in ('Received','Picked') and Date > '2023-04-1'"; 
        
        
        // limit the number of rows returned to 1000

$stmt = $mysql->prepare($sql);
$stmt->bind_param("ss", $FD, $TD); // bind the parameters
$stmt->execute();

$result = $stmt->get_result();

// Fetch the data in smaller batches using a while loop
$to_encode = array();
while ($row = $result->fetch_assoc()) {
    $to_encode[] = $row;
}

$stmt->close();

// Set the HTTP response header to indicate that the response is JSON
header('Content-Type: application/json');

// Output the JSON encoded data
echo json_encode($to_encode);
?>