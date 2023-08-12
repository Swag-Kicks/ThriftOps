<?php
session_start();
include_once("../../include/mysql_connection.php"); 
$cr=$_SESSION['id'];
$C_Date = date('Y-m-d/h:i:a');

    $title =  $_POST['title'];
    $condition =  $_POST['condition'];
    $qty =  $_POST['qty'];
    $brand =  $_POST['brand'];
    $made =  $_POST['made'];
    $material =  $_POST['Material'];
    $code =  $_POST['Code'];
    $weight =  $_POST['weight'];
    $price =  $_POST['price'];
   $sku =  $_POST['sku'];
     $gender =  $_POST['gender'];
    $att= $_POST['att'];
   $status= $_POST['status'];
   $image1 = $_POST['image1'];
     $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];
           $image4 = $_POST['image4'];
              $image5 = $_POST['image5'];
              $image6 = $_POST['image6'];
              $war=$_POST['war'];
   $pred=$_POST['Prediction'];
     $ShopifyID = $_POST['sid'];
       $VariantID = $_POST['vid'];
         $Vendor_ID = $_POST['vendor'];
        $Category = $_POST['category'];
         $SubCat = $_POST['subCat'];
         $Inventory_Item_ID=$_POST['v_it_id'];
         
          $Lot_ID=$_POST['Lot_ID'];
          $Size=$_POST['Size'];
         $DateTime=$_POST['DateTime'];
// $Inventory_Status=$_POST['Inventory_Status'];
  
  
    //   $sql = "INSERT INTO `addition` (
    //   `Title`,
    //   `Shopify_ID`,
    //     `Inventory_Item_ID`,
    //      `Variant_ID`,
    //     `Vendor_ID`,
    //     `Lot_ID`,
    //   `Cndition`,
    //   `Size`,
    //      `Weight`,
    //     `Status`,
    //     `SKU`,
    //     `Price`,
    //     `DateTime`,
    // `Category_ID`,
    //   `Sub_Category_ID`,
    //   `Quantity`,
    //   `Image_1`, 
    //   `Image_2`, 
    //   `Image_3`, 
    //   `Image_4`, 
    //   `Image_5`,
    //   `Inventory_Status`,
    //   `att` 
    //   )
    //   VALUES
    //   (
    //   '$title', 
    //   '$ShopifyID',
    //   '$Inventory_Item_ID',
    //     '$VariantID',
    //       '$Vendor_ID',
    //       '$Lot_ID',
    //   '$condition',
    //   '$Size',
    //   '$weight',
    //   '$status',
    //   '$sku',
    //   '$price',
    //   '$DateTime',
    //   '$Category',
    //   '$SubCat',
    //      '$qty',
    //   '$image1',
    //   '$image2', 
    //   '$image3',
    //   '$image4',
    //   '$image5',
    //   'Pending',
    //   '$att'
    //   );";
       $result = mysqli_query($mysql,"Update `addition` Set Title='$title',Shopify_ID='$ShopifyID',Inventory_Item_ID='$Inventory_Item_ID',Variant_ID='$VariantID',Cndition='$condition',Size='$Size' Where SKU='$sku'");
       $result2= mysqli_query($mysql,"Update `addition` Set Weight='$weight',Brand='$brand',Made='$made ',Material='$material',Gender='$gender',Code='$code',Status='$status',Price='$price',DateTime='$C_Date',Category_ID='$Category',Sub_Category_ID='$SubCat',Quantity='$qty' Where SKU='$sku'");
       $result3=mysqli_query($mysql,"Update `addition` Set Image_1='$image1', Image_2='$image2', Image_3='$image3', Image_4='$image4', Image_5='$image5',Image_6='$image6',Inventory_Status='Pending',Warehouse_ID='$war',att='$att',Prediction='$pred' WHERE SKU='$sku'");
       
       $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Product','$ShopifyID','Product Updated', 'Edited from thriftops', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
   
       
   
       if (!$result1) 
       {
           echo "<script>alert('Error Adding Product !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product Added Successfully !.')</script>";
          
              
   	}