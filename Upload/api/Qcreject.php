<?php
include_once("../../include/mysql_connection.php"); 

  
    $title =  $_POST['title'];
    $condition =  $_POST['condition'];
    $qty =  $_POST['qty'];
    $brand =  $_POST['brand'];
    $made =  $_POST['made'];
    $weight =  $_POST['weight'];
    $price =  $_POST['price'];
   $sku =  $_POST['sku'];
     $gender =  $_POST['gender'];
    $att= $_POST['att'];
   $status= 'QC_REJECTED';
   $image1 = $_POST['image1'];
     $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];
           $image4 = $_POST['image4'];
              $image5 = $_POST['image5'];
  
     $ShopifyID = $_POST['sid'];
       $VariantID = $_POST['vid'];
         $Vendor_ID = $_POST['vendor'];
        $Category = $_POST['category'];
         $SubCat = $_POST['subCat'];
         $Inventory_Item_ID=$_POST['Inventory_Item_ID'];
         
          $Lot_ID=$_POST['Lot_ID'];
          $Size=$_POST['Size'];
         $DateTime=$_POST['DateTime'];
// $Inventory_Status=$_POST['Inventory_Status'];
  
  
      $sql = "INSERT INTO `addition` (
      `Title`,
       `Shopify_ID`,
        `Inventory_Item_ID`,
         `Variant_ID`,
        `Vendor_ID`,
        `Lot_ID`,
      `Cndition`,
      `Size`,
         `Weight`,
        `Status`,
        `SKU`,
        `Price`,
        `DateTime`,
    `Category_ID`,
      `Sub_Category_ID`,
       `Quantity`,
       `Image_1`, 
      `Image_2`, 
      `Image_3`, 
      `Image_4`, 
      `Image_5`,
      `Inventory_Status`,
       `att` 
      )
      VALUES
      (
      '$title', 
       '$ShopifyID',
       '$Inventory_Item_ID',
        '$VariantID',
           '$Vendor_ID',
           '$Lot_ID',
      '$condition',
      '$Size',
      '$weight',
      '$status',
       '$sku',
      '$price',
      '$DateTime',
       '$Category',
      '$SubCat',
         '$qty',
      '$image1',
      '$image2', 
      '$image3',
      '$image4',
      '$image5',
      'Pending',
       '$att'
      );";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Product !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product Added Successfully !.')</script>";
          
              
   	}