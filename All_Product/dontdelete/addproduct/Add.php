<?php
include_once("db.php"); 
// if(isset($_POST['publish']))
// {
    
    // $name=$_POST[''];  //to get data from text box
    //echo $name;   //for print or show 
    
    $Title= $_POST['Title'];
    
    
//      $Shopify_ID=$_POST['Shopify_ID'];
//     $Inventory_Item_ID = $_POST['Inventory_Item_ID'];
//     $Variant_ID=$_POST['Variant_ID'];
    $Brand=$_POST['Brand'];
    $Vendor_ID= 1;
   $Lot_ID=1;
    $Made=$_POST['Made'];
//     $Code=$_POST['Code'];
$Product_ID=1;
   $Category_ID=51;
    $Sub_Category_ID=1;
//     $Cndition=$_POST['Cndition'];
//     $Size=$_POST['Size'];
//     $Weight=$_POST['Weight'];
//     $SKU=$_POST['SKU'];
//     $Gender=$_POST['Gender'];
    $Warehouse_ID=2;
//     $Cost=$_POST['Cost'];
//     $Price=$_POST['Price'];
//     $Image_1=$_POST['Image_1'];
//     $Image_2=$_POST['Image_2'];
//     $Image_3=$_POST['Image_3'];
//     $Image_4=$_POST['Image_4'];
//     $Image_5=$_POST['Image_5'];
    
      $sql = "INSERT INTO Product (
          Title,
          Vendor_ID,
          Lot_ID,
          Product_ID,
          Category_ID,
          Sub_Category_ID,
          Warehouse_ID
     
          )
          VALUES (
              '$Title',
              '$Vendor_ID',
              '$Lot_ID',
              '$Product_ID',
              '$Category_ID',
              '$Sub_Category_ID',
              '$Warehouse_ID'
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Product !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product Added Successfully !.')</script>";
          
              
   	}
    
    
    
// }










?>