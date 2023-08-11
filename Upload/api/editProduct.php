

<?php

include_once("../includes/db.php"); 

 
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
   $status= $_POST['status'];
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



$key = $_GET['id'];

     $sql = "Update Product set 
 Title = '$title',
      Cndition = '$condition',
       qty='$qty',
        Brand = '$brand',
         Made = '$made',
          Weight = '$weight',
           Price = '$price',
             SKU = '$sku',
             att = '$att', 
               Gender = '$gender',
                 Status = '$status',
              Vendor_ID = '$Vendor_ID',
               Category_ID = '$Category',
                 Sub_Category_ID = '$SubCat',
      Image_1 = '$image1',
      Image_2 = '$image2',
      Image_3  = '$image3',
      Image_4  = '$image4',
      Image_5 = '$image5'

    
     
     where id  = $key ";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
       {
           echo "<script>alert('Error Adding User !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product Edited Successfully !.')</script>";
          
              
   	}
?>


