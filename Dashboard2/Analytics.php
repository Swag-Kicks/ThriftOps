<?php 
   session_start();
   include_once("../include/mysql_connection.php"); 
   error_reporting(0);
   date_default_timezone_set("Asia/Karachi");
   $monthinwords=date('F');
   $monthinnumbers=date('m');
   //print_r($monthinnumbers);
   $year=date('Y');

   
//   if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
//   {
      
//   }
//   else 
//   {
      
//       echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
//   }


// echo $check=$_POST['from'];
// echo $check1=$_POST['To'];

 if(isset($_POST['filter']))
   {
        $check=$_POST['from'];
        $check1=$_POST['To'];
        
        //montlhy report
       //total number
       //current
        $tot=0;
        $sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE Date Between '$check' AND '$check1' GROUP BY order_id DESC";
        $result = mysqli_query($mysql, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        { 
            $co++;
            $sum=$i=$row['Total_Amount'];
            $tot=$tot+$sum;
            $i=$row['order_id'];
        }
        $or_total=$co;
        
        //target
        $sql1 = "SELECT * FROM `Target_Month`where Date Between '$check' AND '$check1'";
        $result1 = mysqli_query($mysql, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $target=$row1['Target_Orders'];
        
        
        //revenue
    
    
        
        //target
        $sql1 = "SELECT * FROM `Target_Month` where Date Between '$check' AND '$check1' ";
        $result1 = mysqli_query($mysql, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $target_r=$row1['Target_Revenue'];
        
        
        //category
        //sk shoe total
        
    
        $sql13 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items NOT LIKE 'SK-SH%' AND Items NOT LIKE 'SK-SHO%' AND Items NOT LIKE 'SK-SC%' AND Items NOT LIKE 'SK-SN%' AND `Items` LIKE 'SK-S%'";
        $result13 = mysqli_query($mysql, $sql13);
        $row13 = mysqli_fetch_assoc($result13);
        $shoe_sum=number_format($row13['sum']);
        $shoe_total=$row13['total'];
    
        if($shoe_total=='')
        {
            $shoe_total=0;
            $shoe_sum=0;
        }
        //wp shoe total
        
        $sql1w3 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'WP-S%' OR 'WP-s%' OR 'wp-s%' or 'WP-%'";
        $result1w3 = mysqli_query($mysql, $sql1w3);
        $row1w3 = mysqli_fetch_assoc($result1w3);
        $wp_shoe_total=$row1w3['total'];
        $wp_shoe_sum=number_format($row1w3['sum']);
    
         if($wp_shoe_total=='')
        {
            $wp_shoe_total=0;
            $wp_shoe_sum=0;
        }
        
        //sandal total
        $sql14 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-SN%'";
        $result14 = mysqli_query($mysql, $sql14);
        $row14 = mysqli_fetch_assoc($result14);
        $sandals_total=$row14['total'];
        $sandals_sum=number_format($row14['sum']);
    
        if($sandals_total=='')
        {
            $sandals_total=0;
            $sandals_sum=0;
        }
        
        //slipper total
        $sql15 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-SL%'";
        $result15 = mysqli_query($mysql, $sql15);
        $row15 = mysqli_fetch_array($result15);
        $slipper_total=$row15['total'];
        $slipper_sum=number_format($row15['sum']);
    
        if($slipper_total=='')
        {
            $slipper_total=0;
            $slipper_sum=0;
        }
        
        //kids total
        $sql16 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-KD%'";
        $result16 = mysqli_query($mysql, $sql16);
        $row16 = mysqli_fetch_assoc($result16) ;
        $kids_total=$row16['total'];
        $kids_sum=number_format($row16['sum']);
    
        if($kids_total=='')
        {
            $kids_total=0;
            $kids_sum=0;
        }
        
        //khussa
        $sql17 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-KHU%'";
        $result17 = mysqli_query($mysql, $sql17);
        $row12 = mysqli_fetch_assoc($result17); 
        $khusaa_total=$row17['total'];
        $khusaa_sum=number_format($row17['sum']);
    
        if($khusaa_total=='')
        {
            $khusaa_total=0;
            $khusaa_sum=0;
        }
        //Bags
        $sql18 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-BG%'";
        $result18 = mysqli_query($mysql, $sql18);
        $row18 = mysqli_fetch_assoc($result18);
    
        $bags_total=$row18['total'];
        $bags_sum=number_format($row18['sum']);
    
        if($bags_total=='')
        {
            $khusaa_total=0;
             $khusaa_sum=0;
        }
        //Beanies
        $sql19 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items NOT LIKE 'SK-BL%' AND Items NOT LIKE 'SK-BG%' AND Items NOT LIKE 'SK-BT%' AND Items LIKE 'SK-B%'";
        $result19 = mysqli_query($mysql, $sql19);
        $row19 = mysqli_fetch_assoc($result19);
    
        $beanies_total=$row19['total'];
        $beanies_sum=number_format($row19['sum']);
    
        if($beanies_total=='')
        {
            $beanies_total=0;
            $beanies_sum=0;
        }
        //Belts
        $sql20 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-BL%'";
        $result20 = mysqli_query($mysql, $sql20);
        $row20 = mysqli_fetch_assoc($result20); 
    
        $belts_total=$row20['total'];
        $belts_sum=number_format($row20['sum']);
    
        if($belts_total=='')
        {
            $belts_total=0;
            $belts_sum=0;
        }
        //Bottoms
        $sql21 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-BT%'";
        $result21 = mysqli_query($mysql, $sql21);
        $row21 = mysqli_fetch_assoc($result21); 
    
        $bottoms_total=$row21['total'];
        $bottoms_sum=number_format($row21['sum']);
    
        if($bottoms_total=='')
        {
            $bottoms_total=0;
            $bottoms_sum=0;
        }
        //Caps
        $sql22 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-C%'";
        $result22 = mysqli_query($mysql, $sql22);
        $row22 = mysqli_fetch_assoc($result22);
    
        $caps_total=$row22['total'];
        $caps_sum=number_format($row22['sum']);
    
        if($caps_total=='')
        {
            $caps_total=0;
            $caps_sum=0;
        }
        //Cleaning kit
        $sql23 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-CL%'";
        $result23 = mysqli_query($mysql, $sql23);
        $row23 = mysqli_fetch_assoc($result23);
    
        $cl_total=$row23['total'];
        $cl_sum=number_format($row23['sum']);
    
        if($cl_total=='')
        {
            $cl_total=0;
            $cl_sum=0;
        }
        //Hoodies
        $sql24 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-H%'";
        $result24 = mysqli_query($mysql, $sql24);
        $row24 = mysqli_fetch_assoc($result24); 
    
        $hoddies_total=$row24['total'];
        $hoddies_sum=number_format($row24['sum']);
    
        if($hoddies_total=='')
        {
            $hoddies_total=0;
            $hoddies_sum=0;
        }
        //Mufflers
        $sql25 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-M%'";
        $result25 = mysqli_query($mysql, $sql25);
        $row25 = mysqli_fetch_assoc($result25);
        $Mufflers_total=$row25['total'];
        $Mufflers_sum=number_format($row25['sum']);
    
        if($Mufflers_total=='')
        {
            $Mufflers_total=0;
            $Mufflers_sum=0;
        }
        //Shirts
        $sql26 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-SH%'";
        $result26 = mysqli_query($mysql, $sql26);
        $row26 = mysqli_fetch_assoc($result26);
    
        $Shirts_total=$row26['total'];
        $Shirts_sum=number_format($row26['sum']);
    
        if($Shirts_total=='')
        {
            $Shirts_total=0;
            $Shirts_sum=0;
        }
        //Shorts
        $sql27 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-SHO%'";
        $result27 = mysqli_query($mysql, $sql27);
        $row27 = mysqli_fetch_assoc($result27);
    
        $Shorts_total=$row27['total'];
        $Shorts_sum=number_format($row27['sum']);
    
    
        if($Shorts_total=='')
        {
            $Shorts_total=0;
            $Shorts_sum=0;
        }
        //Socks
        $sql28 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-SC%'";
        $result28 = mysqli_query($mysql, $sql28);
        $row28 = mysqli_fetch_assoc($result28);
    
        $Socks_total=$row28['total'];
        $Socks_sum=number_format($row28['sum']);
    
    
        if($Socks_total=='')
        {
            $Socks_total=0;
            $Socks_sum=0;
        }
        //Tie
        $sql29 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-TI%'";
        $result29 = mysqli_query($mysql, $sql29);
        $row29 = mysqli_fetch_assoc($result29);
    
        $Tie_total=$row29['total'];
        $Tie_sum=number_format($row29['sum']);
    
    
        if($Tie_total=='')
        {
            $Tie_total=0;
            $Tie_total=0;
        }
        //Tops
        $sql30 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-TP%'";
        $result30 = mysqli_query($mysql, $sql30);
        $row30 = mysqli_fetch_assoc($result30); 
    
        $Tops_total=$row30['total'];
        $Tops_sum=number_format($row30['sum']);
    
        if($Tops_total=='')
        {
            $Tops_total=0;
            $Tops_sum=0;
        }
        //t-shirts
        $sql31 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE Date Between '$check' AND '$check1' AND Items LIKE 'SK-TS%'";
        $result31 = mysqli_query($mysql, $sql31);
        $row31 = mysqli_fetch_assoc($result31);
    
        $tshirts_total=$row31['total'];
        $tshirts_sum=number_format($row31['sum']);
    
        if($tshirts_total=='')
        {
            $tshirts_total=0;
            $tshirts_sum=0;
        }
        
        
        //Uploads
        //bags
        $up1="Select Count(Shopify_ID) as up_total from Bags WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr1 = mysqli_query($mysql, $up1);
        $upd1 = mysqli_fetch_assoc($upr1);
        $u_bag=$upd1['up_total'];
        
        //beanies
        $up2="Select Count(Shopify_ID) as up_total from Beanies WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr2 = mysqli_query($mysql, $up2);
        $upd2 = mysqli_fetch_assoc($upr2);
        $u_beanie=$upd2['up_total'];
        
        //belts
        $up3="Select Count(Shopify_ID) as up_total from belts WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr3 = mysqli_query($mysql, $up3);
        $upd3 = mysqli_fetch_assoc($upr3);
        $u_belt=$upd3['up_total'];
        
        
        //bottoms
        $up4="Select Count(Shopify_ID) as up_total from bottoms WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr4 = mysqli_query($mysql, $up4);
        $upd4 = mysqli_fetch_assoc($upr4);
        $u_bottom=$upd4['up_total'];
        
        //caps
        $up5="Select Count(Shopify_ID) as up_total from caps WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr5 = mysqli_query($mysql, $up5);
        $upd5 = mysqli_fetch_assoc($upr5);
        $u_cap=$upd5['up_total'];
        
        //Cleaning kits
        $up6="Select Count(Shopify_ID) as up_total from `Cleaning kits` WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr6 = mysqli_query($mysql, $up6);
        $upd6 = mysqli_fetch_assoc($upr6);
        $u_cl=$upd6['up_total'];
        
        //Hoodies
        $up7="Select Count(Shopify_ID) as up_total from Hoodies WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr7 = mysqli_query($mysql, $up7);
        $upd7 = mysqli_fetch_assoc($upr7);
        $u_hoddie=$upd7['up_total'];
        
        //Kids
        $up8="Select Count(Shopify_ID) as up_total from Kids WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr8 = mysqli_query($mysql, $up8);
        $upd8 = mysqli_fetch_assoc($upr8);
        $u_kid=$upd8['up_total'];
        
        //Mufflers
        $up9="Select Count(Shopify_ID) as up_total from Mufflers WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr9 = mysqli_query($mysql, $up9);
        $upd9 = mysqli_fetch_assoc($upr9);
        $u_muffler=$upd9['up_total'];
        
        
        //sandals
        $up10="Select Count(Shopify_ID) as up_total from sandals WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr10 = mysqli_query($mysql, $up10);
        $upd10 = mysqli_fetch_assoc($upr10);
        $u_sandal=$upd10['up_total'];
        
        //shirts
        $up11="Select Count(Shopify_ID) as up_total from shirts WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr11 = mysqli_query($mysql, $up11);
        $upd11 = mysqli_fetch_assoc($upr11);
        $u_shirt=$upd11['up_total'];
        
        //shorts
        $up12="Select Count(Shopify_ID) as up_total from shorts WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr12 = mysqli_query($mysql, $up12);
        $upd12 = mysqli_fetch_assoc($upr12);
        $u_short=$upd12['up_total'];
        
        //shoes total
        $up13="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr13 = mysqli_query($mysql, $up13);
        $upd13 = mysqli_fetch_assoc($upr13);
        $u_shoe=$upd13['up_total'];
        
        //shoes SK
        $up14="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!=''AND SKU LIKE 'SK-%' AND DateTime Between '$check' AND '$check1'";
        $upr14 = mysqli_query($mysql, $up14);
        $upd14 = mysqli_fetch_assoc($upr14);
        $u_sk=$upd14['up_total'];
        
        //shoes WP
        $up15="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU LIKE 'WP-%' AND DateTime Between '$check' AND '$check1'";
        $upr15 = mysqli_query($mysql, $up15);
        $upd15 = mysqli_fetch_assoc($upr15);
        $u_wp=$upd15['up_total'];
        
        //shoes others
        $up16="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU NOT LIKE 'SK-%' AND SKU NOT LIKE 'WP-%' AND DateTime Between '$check' AND '$check1'";
        $upr16 = mysqli_query($mysql, $up16);
        $upd16 = mysqli_fetch_assoc($upr16);
        $u_other=$upd16['up_total'];
        
        //Socks
        $up17="Select Count(Shopify_ID) as up_total from Socks WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr17 = mysqli_query($mysql, $up17);
        $upd17 = mysqli_fetch_assoc($upr17);
        $u_sock=$upd17['up_total'];
        
        //Slippers
        $up18="Select Count(Shopify_ID) as up_total from Slippers WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr18 = mysqli_query($mysql, $up18);
        $upd18 = mysqli_fetch_assoc($upr18);
        $u_slipper=$upd18['up_total'];
        
        //Tie
        $up19="Select Count(Shopify_ID) as up_total from Tie WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr19 = mysqli_query($mysql, $up19);
        $upd19 = mysqli_fetch_assoc($upr19);
        $u_tie=$upd19['up_total'];
        
        //TOPS
        $up20="Select Count(Shopify_ID) as up_total from TOPS WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr20 = mysqli_query($mysql, $up20);
        $upd20 = mysqli_fetch_assoc($upr20);
        $u_top=$upd20['up_total'];
        
        //tshirts
        $up21="Select Count(Shopify_ID) as up_total from tshirts WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr21 = mysqli_query($mysql, $up21);
        $upd21 = mysqli_fetch_assoc($upr21);
        $u_tshirt=$upd21['up_total'];
        
        //khussa
        $up22="Select Count(Shopify_ID) as up_total from khussa WHERE Shopify_ID!='' AND DateTime Between '$check' AND '$check1'";
        $upr22 = mysqli_query($mysql, $up22);
        $upd22 = mysqli_fetch_assoc($upr22);
        $u_khussa=$upd22['up_total'];
        
        
     
        //dispaly max
        $allshoe_total=$shoe_total+$wp_shoe_total;

    }
   
//   //montlhy report
//   //total number
  //current
  
  else{
        $tot=0;
        $sql = "SELECT *,GROUP_CONCAT(Items) FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' GROUP BY order_id DESC";
        $result = mysqli_query($mysql, $sql);
        while($row = mysqli_fetch_assoc($result)) 
        { 
            $co++;
            $sum=$i=$row['Total_Amount'];
            $tot=$tot+$sum;
            $i=$row['order_id'];
        }
        $or_total=$co;
        
        //target
        $sql1 = "SELECT * FROM `Target_Month`where Month='$monthinwords' AND Year='$year'";
        $result1 = mysqli_query($mysql, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $target=$row1['Target_Orders'];
        
        
        //revenue
    
    
        
        //target
        $sql1 = "SELECT * FROM `Target_Month` where Month='$monthinwords' AND Year='$year'";
        $result1 = mysqli_query($mysql, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $target_r=$row1['Target_Revenue'];
        
        
        //category
        //sk shoe total
        
    
        $sql13 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '2022' AND MONTH(Date) = '08' AND Items NOT LIKE 'SK-SH%' AND Items NOT LIKE 'SK-SHO%' AND Items NOT LIKE 'SK-SC%' AND Items NOT LIKE 'SK-SN%' AND `Items` LIKE 'SK-S%'";
        $result13 = mysqli_query($mysql, $sql13);
        $row13 = mysqli_fetch_assoc($result13);
        $shoe_sum=number_format($row13['sum']);
        $shoe_total=$row13['total'];
    
        if($shoe_total=='')
        {
            $shoe_total=0;
            $shoe_sum=0;
        }
        //wp shoe total
        
        $sql1w3 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'WP-S%' OR 'WP-s%' OR 'wp-s%' or 'WP-%'";
        $result1w3 = mysqli_query($mysql, $sql1w3);
        $row1w3 = mysqli_fetch_assoc($result1w3);
        $wp_shoe_total=$row1w3['total'];
        $wp_shoe_sum=number_format($row1w3['sum']);
    
         if($wp_shoe_total=='')
        {
            $wp_shoe_total=0;
            $wp_shoe_sum=0;
        }
        
        //sandal total
        $sql14 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-SN%'";
        $result14 = mysqli_query($mysql, $sql14);
        $row14 = mysqli_fetch_assoc($result14);
        $sandals_total=$row14['total'];
        $sandals_sum=number_format($row14['sum']);
    
        if($sandals_total=='')
        {
            $sandals_total=0;
            $sandals_sum=0;
        }
        
        //slipper total
        $sql15 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-SL%'";
        $result15 = mysqli_query($mysql, $sql15);
        $row15 = mysqli_fetch_array($result15);
        $slipper_total=$row15['total'];
        $slipper_sum=number_format($row15['sum']);
    
        if($slipper_total=='')
        {
            $slipper_total=0;
            $slipper_sum=0;
        }
        
        //kids total
        $sql16 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-KD%'";
        $result16 = mysqli_query($mysql, $sql16);
        $row16 = mysqli_fetch_assoc($result16) ;
        $kids_total=$row16['total'];
        $kids_sum=number_format($row16['sum']);
    
        if($kids_total=='')
        {
            $kids_total=0;
            $kids_sum=0;
        }
        
        //khussa
        $sql17 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-KHU%'";
        $result17 = mysqli_query($mysql, $sql17);
        $row12 = mysqli_fetch_assoc($result17); 
        $khusaa_total=$row17['total'];
        $khusaa_sum=number_format($row17['sum']);
    
        if($khusaa_total=='')
        {
            $khusaa_total=0;
            $khusaa_sum=0;
        }
        //Bags
        $sql18 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-BG%'";
        $result18 = mysqli_query($mysql, $sql18);
        $row18 = mysqli_fetch_assoc($result18);
    
        $bags_total=$row18['total'];
        $bags_sum=number_format($row18['sum']);
    
        if($bags_total=='')
        {
            $khusaa_total=0;
             $khusaa_sum=0;
        }
        //Beanies
        $sql19 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items NOT LIKE 'SK-BL%' AND Items NOT LIKE 'SK-BG%' AND Items NOT LIKE 'SK-BT%' AND Items LIKE 'SK-B%'";
        $result19 = mysqli_query($mysql, $sql19);
        $row19 = mysqli_fetch_assoc($result19);
    
        $beanies_total=$row19['total'];
        $beanies_sum=number_format($row19['sum']);
    
        if($beanies_total=='')
        {
            $beanies_total=0;
            $beanies_sum=0;
        }
        //Belts
        $sql20 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-BL%'";
        $result20 = mysqli_query($mysql, $sql20);
        $row20 = mysqli_fetch_assoc($result20); 
    
        $belts_total=$row20['total'];
        $belts_sum=number_format($row20['sum']);
    
        if($belts_total=='')
        {
            $belts_total=0;
            $belts_sum=0;
        }
        //Bottoms
        $sql21 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-BT%'";
        $result21 = mysqli_query($mysql, $sql21);
        $row21 = mysqli_fetch_assoc($result21); 
    
        $bottoms_total=$row21['total'];
        $bottoms_sum=number_format($row21['sum']);
    
        if($bottoms_total=='')
        {
            $bottoms_total=0;
            $bottoms_sum=0;
        }
        //Caps
        $sql22 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-C%'";
        $result22 = mysqli_query($mysql, $sql22);
        $row22 = mysqli_fetch_assoc($result22);
    
        $caps_total=$row22['total'];
        $caps_sum=number_format($row22['sum']);
    
        if($caps_total=='')
        {
            $caps_total=0;
            $caps_sum=0;
        }
        //Cleaning kit
        $sql23 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-CL%'";
        $result23 = mysqli_query($mysql, $sql23);
        $row23 = mysqli_fetch_assoc($result23);
    
        $cl_total=$row23['total'];
        $cl_sum=number_format($row23['sum']);
    
        if($cl_total=='')
        {
            $cl_total=0;
            $cl_sum=0;
        }
        //Hoodies
        $sql24 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-H%'";
        $result24 = mysqli_query($mysql, $sql24);
        $row24 = mysqli_fetch_assoc($result24); 
    
        $hoddies_total=$row24['total'];
        $hoddies_sum=number_format($row24['sum']);
    
        if($hoddies_total=='')
        {
            $hoddies_total=0;
            $hoddies_sum=0;
        }
        //Mufflers
        $sql25 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-M%'";
        $result25 = mysqli_query($mysql, $sql25);
        $row25 = mysqli_fetch_assoc($result25);
        $Mufflers_total=$row25['total'];
        $Mufflers_sum=number_format($row25['sum']);
    
        if($Mufflers_total=='')
        {
            $Mufflers_total=0;
            $Mufflers_sum=0;
        }
        //Shirts
        $sql26 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-SH%'";
        $result26 = mysqli_query($mysql, $sql26);
        $row26 = mysqli_fetch_assoc($result26);
    
        $Shirts_total=$row26['total'];
        $Shirts_sum=number_format($row26['sum']);
    
        if($Shirts_total=='')
        {
            $Shirts_total=0;
            $Shirts_sum=0;
        }
        //Shorts
        $sql27 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-SHO%'";
        $result27 = mysqli_query($mysql, $sql27);
        $row27 = mysqli_fetch_assoc($result27);
    
        $Shorts_total=$row27['total'];
        $Shorts_sum=number_format($row27['sum']);
    
    
        if($Shorts_total=='')
        {
            $Shorts_total=0;
            $Shorts_sum=0;
        }
        //Socks
        $sql28 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-SC%'";
        $result28 = mysqli_query($mysql, $sql28);
        $row28 = mysqli_fetch_assoc($result28);
    
        $Socks_total=$row28['total'];
        $Socks_sum=number_format($row28['sum']);
    
    
        if($Socks_total=='')
        {
            $Socks_total=0;
            $Socks_sum=0;
        }
        //Tie
        $sql29 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-TI%'";
        $result29 = mysqli_query($mysql, $sql29);
        $row29 = mysqli_fetch_assoc($result29);
    
        $Tie_total=$row29['total'];
        $Tie_sum=number_format($row29['sum']);
    
    
        if($Tie_total=='')
        {
            $Tie_total=0;
            $Tie_total=0;
        }
        //Tops
        $sql30 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-TP%'";
        $result30 = mysqli_query($mysql, $sql30);
        $row30 = mysqli_fetch_assoc($result30); 
    
        $Tops_total=$row30['total'];
        $Tops_sum=number_format($row30['sum']);
    
        if($Tops_total=='')
        {
            $Tops_total=0;
            $Tops_sum=0;
        }
        //t-shirts
        $sql31 = "SELECT SUM(Items_Price) as sum,COUNT(id) as total FROM orders WHERE YEAR(Date) = '$year' AND MONTH(Date) = '$monthinnumbers' AND Items LIKE 'SK-TS%'";
        $result31 = mysqli_query($mysql, $sql31);
        $row31 = mysqli_fetch_assoc($result31);
    
        $tshirts_total=$row31['total'];
        $tshirts_sum=number_format($row31['sum']);
    
        if($tshirts_total=='')
        {
            $tshirts_total=0;
            $tshirts_sum=0;
        }
        
        
        //Uploads
        //bags
        $up1="Select Count(Shopify_ID) as up_total from Bags WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr1 = mysqli_query($mysql, $up1);
        $upd1 = mysqli_fetch_assoc($upr1);
        $u_bag=$upd1['up_total'];
        
        //beanies
        $up2="Select Count(Shopify_ID) as up_total from Beanies WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr2 = mysqli_query($mysql, $up2);
        $upd2 = mysqli_fetch_assoc($upr2);
        $u_beanie=$upd2['up_total'];
        
        //belts
        $up3="Select Count(Shopify_ID) as up_total from belts WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr3 = mysqli_query($mysql, $up3);
        $upd3 = mysqli_fetch_assoc($upr3);
        $u_belt=$upd3['up_total'];
        
        
        //bottoms
        $up4="Select Count(Shopify_ID) as up_total from bottoms WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr4 = mysqli_query($mysql, $up4);
        $upd4 = mysqli_fetch_assoc($upr4);
        $u_bottom=$upd4['up_total'];
        
        //caps
        $up5="Select Count(Shopify_ID) as up_total from caps WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr5 = mysqli_query($mysql, $up5);
        $upd5 = mysqli_fetch_assoc($upr5);
        $u_cap=$upd5['up_total'];
        
        //Cleaning kits
        $up6="Select Count(Shopify_ID) as up_total from `Cleaning kits` WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr6 = mysqli_query($mysql, $up6);
        $upd6 = mysqli_fetch_assoc($upr6);
        $u_cl=$upd6['up_total'];
        
        //Hoodies
        $up7="Select Count(Shopify_ID) as up_total from Hoodies WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr7 = mysqli_query($mysql, $up7);
        $upd7 = mysqli_fetch_assoc($upr7);
        $u_hoddie=$upd7['up_total'];
        
        //Kids
        $up8="Select Count(Shopify_ID) as up_total from Kids WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr8 = mysqli_query($mysql, $up8);
        $upd8 = mysqli_fetch_assoc($upr8);
        $u_kid=$upd8['up_total'];
        
        //Mufflers
        $up9="Select Count(Shopify_ID) as up_total from Mufflers WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr9 = mysqli_query($mysql, $up9);
        $upd9 = mysqli_fetch_assoc($upr9);
        $u_muffler=$upd9['up_total'];
        
        
        //sandals
        $up10="Select Count(Shopify_ID) as up_total from sandals WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr10 = mysqli_query($mysql, $up10);
        $upd10 = mysqli_fetch_assoc($upr10);
        $u_sandal=$upd10['up_total'];
        
        //shirts
        $up11="Select Count(Shopify_ID) as up_total from shirts WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr11 = mysqli_query($mysql, $up11);
        $upd11 = mysqli_fetch_assoc($upr11);
        $u_shirt=$upd11['up_total'];
        
        //shorts
        $up12="Select Count(Shopify_ID) as up_total from shorts WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr12 = mysqli_query($mysql, $up12);
        $upd12 = mysqli_fetch_assoc($upr12);
        $u_short=$upd12['up_total'];
        
        //shoes total
        $up13="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr13 = mysqli_query($mysql, $up13);
        $upd13 = mysqli_fetch_assoc($upr13);
        $u_shoe=$upd13['up_total'];
        
        //shoes SK
        $up14="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!=''AND SKU LIKE 'SK-%' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr14 = mysqli_query($mysql, $up14);
        $upd14 = mysqli_fetch_assoc($upr14);
        $u_sk=$upd14['up_total'];
        
        //shoes WP
        $up15="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU LIKE 'WP-%' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr15 = mysqli_query($mysql, $up15);
        $upd15 = mysqli_fetch_assoc($upr15);
        $u_wp=$upd15['up_total'];
        
        //shoes others
        $up16="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU NOT LIKE 'SK-%' AND SKU NOT LIKE 'WP-%' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr16 = mysqli_query($mysql, $up16);
        $upd16 = mysqli_fetch_assoc($upr16);
        $u_other=$upd16['up_total'];
        
        //Socks
        $up17="Select Count(Shopify_ID) as up_total from Socks WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr17 = mysqli_query($mysql, $up17);
        $upd17 = mysqli_fetch_assoc($upr17);
        $u_sock=$upd17['up_total'];
        
        //Slippers
        $up18="Select Count(Shopify_ID) as up_total from Slippers WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr18 = mysqli_query($mysql, $up18);
        $upd18 = mysqli_fetch_assoc($upr18);
        $u_slipper=$upd18['up_total'];
        
        //Tie
        $up19="Select Count(Shopify_ID) as up_total from Tie WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr19 = mysqli_query($mysql, $up19);
        $upd19 = mysqli_fetch_assoc($upr19);
        $u_tie=$upd19['up_total'];
        
        //TOPS
        $up20="Select Count(Shopify_ID) as up_total from TOPS WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr20 = mysqli_query($mysql, $up20);
        $upd20 = mysqli_fetch_assoc($upr20);
        $u_top=$upd20['up_total'];
        
        //tshirts
        $up21="Select Count(Shopify_ID) as up_total from tshirts WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr21 = mysqli_query($mysql, $up21);
        $upd21 = mysqli_fetch_assoc($upr21);
        $u_tshirt=$upd21['up_total'];
        
        //khussa
        $up22="Select Count(Shopify_ID) as up_total from khussa WHERE Shopify_ID!='' AND YEAR(DateTime) = '$year' AND MONTH(DateTime) = '$monthinnumbers'";
        $upr22 = mysqli_query($mysql, $up22);
        $upd22 = mysqli_fetch_assoc($upr22);
        $u_khussa=$upd22['up_total'];
        
        
     
        //dispaly max
        $allshoe_total=$shoe_total+$wp_shoe_total;
  } 
   
   
   
   ?>
<?php include ("../include/header.php"); ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawGauge);

    var gaugeOptions = {min: 0, max: <?php  echo $target_r ?>};
    var gauge;

    function drawGauge() {
      gaugeData = new google.visualization.DataTable();
      gaugeData.addColumn('number', 'Revenue');
      gaugeData.addRows(1);
      gaugeData.setCell(0, 0, <?php  echo $tot ?>);


      gauge = new google.visualization.Gauge(document.getElementById('gauge_div'));
      gauge.draw(gaugeData, gaugeOptions);
    }


</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Total', 'Orders per Month'],
          ['Shoes',     <?php  echo $allshoe_total ?>],
          ['Sandal',  <?php  echo $sandals_total ?>],
          ['Slipper', <?php  echo $slipper_total ?>],
          ['Kids',   <?php  echo $kids_total ?>],
          ['Khussa',   <?php  echo $kids_total ?>],
          ['Bags',   <?php  echo $bags_total ?>],
          ['Beanies',   <?php  echo $beanies_total ?>],
          ['Belts',   <?php  echo $belts_total ?>],
          ['Bottoms',   <?php  echo $bottoms_total ?>],
          ['Caps',   <?php  echo $caps_total ?>],
          ['Cleaning Kits',   <?php  echo $cl_total ?>],
          ['Hoodies',   <?php  echo $hoddies_total ?>],
          ['Mufflers',   <?php  echo $Mufflers_total ?>],
          ['Shirts',   <?php  echo $Shirts_total ?>],
          ['Shorts',   <?php  echo $Shorts_total ?>],
          ['Socks',   <?php  echo $Socks_total ?>],
          ['Tie',   <?php  echo $Tie_total ?>],
          ['Tops',   <?php  echo $Tops_total ?>],
          ['T-Shirts',   <?php  echo $tshirts_total ?>]
          
        ]);

        var options = {
          //title: 'Orders'
           is3D: true,
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
                    
                            var data = google.visualization.arrayToDataTable([
                              ['Total', 'Orders per Month'],
                              ['Bags',     <?php  echo $u_bag ?>],
                              ['Beanies',     <?php  echo $u_beanie ?>],
                              ['Belt',     <?php  echo $u_belt ?>],
                              ['Bottoms',      <?php  echo $u_bottom ?>],
                              ['Caps',  <?php  echo $u_cap ?>],
                              ['Cleaning Kits', <?php  echo $u_cl ?>],
                              ['Hoddies',   <?php  echo $u_hoddie ?>],
                              ['Mufflers',   <?php  echo $u_muffler ?>],
                              ['Kids',   <?php  echo $u_kid ?>],
                              ['Sandals',   <?php  echo $u_sandal ?>],
                              ['Shirts',   <?php  echo $u_shirt ?>],
                              ['Shorts',   <?php  echo $u_short ?>],
                              ['Sk Shoes',   <?php  echo $u_sk ?>],
                              ['WP Shoes',   <?php  echo $u_wp ?>],
                              ['Others Shoes',   <?php  echo $u_other ?>],
                              ['Socks',   <?php  echo $u_sock ?>],
                              ['Slippers',   <?php  echo $u_slipper ?>],
                              ['Ties',   <?php  echo $u_tie ?>],
                              ['Tops',   <?php  echo $u_top ?>],
                              ['T-Shirts',   <?php  echo $u_tshirt ?>],
                              ['Khussa',   <?php  echo $u_khussa ?>]
                              
                              
                            ]);

        var options = {
          //title: 'Uploads',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    
    <form action="" method="POST" class="PR">

                                
                                    <div class="col-md-4 style="padding: 0px;"">
                                        <label><b>From</b></label>
                                        <input placeholder="YYYY-DD-MM" type="date" name="from" style="padding: 5px !important;">
                                    </div>
                               
                                    <div class="col-md-4 style="padding: 0px;"">
                                        <label><b>To</b></label>
                                        <input  placeholder="YYYY-DD-MM" type="date" name="To"  style="padding: 5px !important;">
                                    </div>
                                    

                                    <div class="form-group" style="display: flex;">
                                        <button name="filter" class="btn btn-info">Filter</button>
                                    </div>
                                    <h1 style="margin-left: 376px;top: 32px;position: relative;">Analytics</h1>
                                    <div class="row">
                                        
                                        <figure class="highcharts-figure">
                                          <div style="width: 485px;height: 250px;margin-left: 424px;position: relative;top: 57px;overflow: hidden;" id="container-speed" class="chart-container"></div>
                                          <div style="width: 485px;height: 250px;margin-left: 7px;position: relative;top: -193px;overflow: hidden;" id="container-rpm" class="chart-container"></div>
                                        </figure>
                                        <script>
                                            var gaugeOptions = {
                                                  chart: {
                                                    type: 'solidgauge'
                                                  },
                                                
                                                  title: null,
                                                
                                                  pane: {
                                                    center: ['50%', '85%'],
                                                    size: '140%',
                                                    startAngle: -90,
                                                    endAngle: 90,
                                                    background: {
                                                      backgroundColor:
                                                        Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                                                      innerRadius: '60%',
                                                      outerRadius: '100%',
                                                      shape: 'arc'
                                                    }
                                                  },
                                                
                                                  exporting: {
                                                    enabled: false
                                                  },
                                                
                                                  tooltip: {
                                                    enabled: false
                                                  },
                                                
                                                  // the value axis
                                                  yAxis: {
                                                    stops: [
                                                      [0.1, '#55BF3B'], // green
                                                      [0.5, '#DDDF0D'], // yellow
                                                      [0.9, '#DF5353'] // red
                                                    ],
                                                    lineWidth: 0,
                                                    tickWidth: 0,
                                                    minorTickInterval: null,
                                                    tickAmount: 2,
                                                    title: {
                                                      y: -70
                                                    },
                                                    labels: {
                                                      y: 16
                                                    }
                                                  },
                                                
                                                  plotOptions: {
                                                    solidgauge: {
                                                      dataLabels: {
                                                        y: 5,
                                                        borderWidth: 0,
                                                        useHTML: true
                                                      }
                                                    }
                                                  }
                                                };
                                                
                                                // The speed gauge
                                                var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
                                                  yAxis: {
                                                    min: 0,
                                                    max: <?php echo $target_r ?>,
                                                    title: {
                                                      //text: 'Revenue'
                                                    }
                                                  },
                                                
                                                  credits: {
                                                    enabled: false
                                                  },
                                                
                                                  series: [{
                                                    name: 'Speed',
                                                    data: [<?php echo $tot ?>],
                                                    dataLabels: {
                                                      format:
                                                        '<div style="text-align:center$tot">' +
                                                        '<span style="font-size:25px">{y}</span><br/>' +
                                                        '<span style="font-size:12px;opacity:0.4">Revenue</span>' +
                                                        '</div>'
                                                    },
                                                    tooltip: {
                                                      valueSuffix: ' Revenue'
                                                    }
                                                  }]
                                                
                                                }));
                                                
                                                // The RPM gauge
                                                var chartRpm = Highcharts.chart('container-rpm', Highcharts.merge(gaugeOptions, {
                                                  yAxis: {
                                                    min: 0,
                                                    max: <?php echo $target ?>,
                                                    title: {
                                                      //text: 'null'
                                                    }
                                                  },
                                                
                                                  series: [{
                                                    name: 'RPM',
                                                    data: [<?php echo $or_total ?>],
                                                    dataLabels: {
                                                      format:
                                                        '<div style="text-align:center">' +
                                                        '<span style="font-size:25px">{y}</span><br/>' +
                                                        '<span style="font-size:12px;opacity:0.4">' +
                                                        'Orders' +
                                                        '</span>' +
                                                        '</div>'
                                                    },
                                                    tooltip: {
                                                      valueSuffix: ' Orders'
                                                    }
                                                  }]
                                                
                                                }));
                                        
                                        </script>
                                
                                
                                
                                    
                                    </script>
                                        <!--<div id="gauge_div" style="width: 485px;height: 250px;margin-left: 104px;position: relative;top: 57px;"></div>-->
                                        <div id="piechart" style="width: 600px;height: 300px;margin-left: 236px;position: relative;top: -78px;top: -212px;"></div>
                                
                                         <div class="col-md-12">
                                             <label><b>No Of Orders</b>: <?php echo number_format($or_total) ?> / <?php echo number_format($target) ?></label><br>
                                             <label><b>Revenue</b>: Rs. <?php echo number_format($tot) ?> / Rs. <?php echo number_format($target_r) ?></label><br>
                                
                                      
                                                 <br><div class="e-table">
                                                        <div class="table-responsive table-lg">
                                                           <table class="table table-bordered" id="crud_table">
                                                                 <tr>
                                                                    <td>Category</td>
                                                                    <td>Total Orders</td>
                                                                    <td>Revenue</td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>SK Shoe</td>
                                                                    <td><?php echo $shoe_total; ?></td>
                                                                    <td><?php echo $shoe_sum; ?></td>
                                                                    
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>WP Shoe</td>
                                                                    <td><?php echo $wp_shoe_total; ?></td>
                                                                    <td><?php echo $wp_shoe_sum; ?></td>
                                                                    
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Sandal</td>
                                                                    <td><?php echo $sandals_total; ?></td>
                                                                    <td><?php echo $sandals_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Slipper</td>
                                                                    <td><?php echo $slipper_total; ?></td>
                                                                    <td><?php echo $slipper_sum; ?></td>
                                                                    
                                                                 </tr>
                                
                                                                 <tr>
                                                                 	<td>Kids</td>
                                                                    <td><?php echo $kids_total; ?></td>
                                                                    <td><?php echo $kids_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Khussa</td>
                                                                    <td><?php echo $khusaa_total; ?></td>
                                                                    <td><?php echo $khusaa_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Bags</td>
                                                                    <td><?php echo $bags_total; ?></td>
                                                                    <td><?php echo $bags_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Beanies</td>
                                                                    <td><?php echo $beanies_total; ?></td>
                                                                    <td><?php echo $beanies_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Belts</td>
                                                                    <td><?php echo $belts_total; ?></td>
                                                                    <td><?php echo $belts_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Bottoms</td>
                                                                    <td><?php echo $bottoms_total; ?></td>
                                                                    <td><?php echo $bottoms_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Caps</td>
                                                                    <td><?php echo $caps_total; ?></td>
                                                                    <td><?php echo $caps_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Cleaning kits</td>
                                                                    <td><?php echo $cl_total; ?></td>
                                                                    <td><?php echo $cl_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Hoodies</td>
                                                                    <td><?php echo $hoddies_total; ?></td>
                                                                    <td><?php echo $hoddies_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Mufflers</td>
                                                                    <td><?php echo $Mufflers_total; ?></td>
                                                                    <td><?php echo $Mufflers_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Shirts</td>
                                                                    <td><?php echo $Shirts_total; ?></td>
                                                                    <td><?php echo $Shirts_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Shorts</td>
                                                                    <td><?php echo $Shorts_total; ?></td>
                                                                    <td><?php echo $Shorts_sum; ?></td>
                                                                 </tr>
                                                                 
                                                                 <tr>
                                                                 	<td>Socks</td>
                                                                    <td><?php echo $Socks_total; ?></td>
                                                                    <td><?php echo $Socks_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Tie</td>
                                                                    <td><?php echo $Tie_total; ?></td>
                                                                    <td><?php echo $Tie_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Tops</td>
                                                                    <td><?php echo $Tops_total; ?></td>
                                                                    <td><?php echo $Tops_sum; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>T-Shirts</td>
                                                                    <td><?php echo $tshirts_total; ?></td>
                                                                    <td><?php echo $tshirts_sum; ?></td>
                                                                 </tr>
                                                                 
                                
                                                           </table>
                                                        </div>
                                                     </div>
                                                     
                                                     <!--Uploads-->
                                                     <br>
                                                     <h4>Uploads</h4>
                                                    <div id="piechart_3d" style="width: 650px; height: 450px;"></div>
                                                    
                                                    <br><div class="e-table">
                                                        <div class="table-responsive table-lg">
                                                           <table class="table table-bordered" id="crud_table">
                                                                 <tr>
                                                                    <td>Category</td>
                                                                    <td>Uploads</td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>SK Shoe</td>
                                                                    <td><?php echo $u_sk; ?></td>
                                
                                                                    
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>WP Shoe</td>
                                                                    <td><?php echo $u_wp; ?></td>
                                
                                                                    
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Sandal</td>
                                                                    <td><?php echo $u_sandal; ?></td>
                                                                  
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Slipper</td>
                                                                    <td><?php echo $u_slipper; ?></td>
                                
                                                                    
                                                                 </tr>
                                
                                                                 <tr>
                                                                 	<td>Kids</td>
                                                                    <td><?php echo $u_kid; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Khussa</td>
                                                                    <td><?php echo $u_khussa; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Bags</td>
                                                                    <td><?php echo $u_bag; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Beanies</td>
                                                                    <td><?php echo $u_beanie; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Belts</td>
                                                                    <td><?php echo $u_belt; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Bottoms</td>
                                                                    <td><?php echo $u_bottom; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Caps</td>
                                                                    <td><?php echo $u_cap; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Cleaning kits</td>
                                                                    <td><?php echo $u_cl; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Hoodies</td>
                                                                    <td><?php echo $u_hoddie; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Mufflers</td>
                                                                    <td><?php echo $u_muffler; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Shirts</td>
                                                                    <td><?php echo $u_shirt; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Shorts</td>
                                                                    <td><?php echo $u_short; ?></td>
                                
                                                                 </tr>
                                                                 
                                                                 <tr>
                                                                 	<td>Socks</td>
                                                                    <td><?php echo $u_sock; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Tie</td>
                                                                    <td><?php echo $u_tie; ?></td>
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>Tops</td>
                                                                    <td><?php echo $u_top; ?></td>
                                
                                                                 </tr>
                                                                 <tr>
                                                                 	<td>T-Shirts</td>
                                                                    <td><?php echo $u_tshirt; ?></td>
                                                                 </tr>
                                                                 
                                
                                                           </table>
                                                        </div>
                                                     </div>
                                                     
                                                     
                                
                                   </div>
                                </div>
                                </form>
<?php include ("../include/footer.php"); ?>
  

  
 </body>
</html>

