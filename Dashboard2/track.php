<?php  
   include_once("mysql.php"); 
   error_reporting(0);
   
   
   if(isset($_POST['filter']))
   {
       $check=$_POST['from'];
       $check1=$_POST['To'];
       //pr
       $pr="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Req_Date Between '$check' AND '$check1'";
       $result = mysqli_query($mysql, $pr);
       $data = mysqli_fetch_assoc($result);
       
       $pr1="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Approved' AND PR_Req_Date Between '$check' AND '$check1'";
       $result1 = mysqli_query($mysql, $pr1);
       $data1 = mysqli_fetch_assoc($result1);
       
       $pr2="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Rejected' AND PR_Req_Date Between '$check' AND '$check1'";
       $result2 = mysqli_query($mysql, $pr2);
       $data2 = mysqli_fetch_assoc($result2);
       
       $pr3="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Pending' AND PR_Req_Date Between '$check' AND '$check1'";
       $result3 = mysqli_query($mysql, $pr3);
       $data3 = mysqli_fetch_assoc($result3);
       
       $pr4="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Changes_Required' AND PR_Req_Date Between '$check' AND '$check1'";
       $result4 = mysqli_query($mysql, $pr4);
       $data4 = mysqli_fetch_assoc($result4);
       
       $pr5="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Delayed' AND PR_Req_Date Between '$check' AND '$check1'";
       $result5 = mysqli_query($mysql, $pr5);
       $data5 = mysqli_fetch_assoc($result5);
       
       //uploads
       $fil1=$check.' 00:00:00';
       $fil2=$check1.' 23:59:59';
       
       
       //bags
       $up1="Select Count(Shopify_ID) as up_total from Bags WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr1 = mysqli_query($mysql, $up1);
       $upd1 = mysqli_fetch_assoc($upr1);
       
       //beanies
       $up2="Select Count(Shopify_ID) as up_total from Beanies WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr2 = mysqli_query($mysql, $up2);
       $upd2 = mysqli_fetch_assoc($upr2);
       
       //belts
       $up3="Select Count(Shopify_ID) as up_total from belts WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr3 = mysqli_query($mysql, $up3);
       $upd3 = mysqli_fetch_assoc($upr3);
       
       
       //bottoms
       $up4="Select Count(Shopify_ID) as up_total from bottoms WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr4 = mysqli_query($mysql, $up4);
       $upd4 = mysqli_fetch_assoc($upr4);
       
       //caps
       $up5="Select Count(Shopify_ID) as up_total from caps WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr5 = mysqli_query($mysql, $up5);
       $upd5 = mysqli_fetch_assoc($upr5);
       
       //Cleaning kits
       $up6="Select Count(Shopify_ID) as up_total from `Cleaning kits` WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr6 = mysqli_query($mysql, $up6);
       $upd6 = mysqli_fetch_assoc($upr6);
       
       //Hoodies
       $up7="Select Count(Shopify_ID) as up_total from Hoodies WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr7 = mysqli_query($mysql, $up7);
       $upd7 = mysqli_fetch_assoc($upr7);
       
       //Kids
       $up8="Select Count(Shopify_ID) as up_total from Kids WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr8 = mysqli_query($mysql, $up8);
       $upd8 = mysqli_fetch_assoc($upr8);
       
       //Mufflers
       $up9="Select Count(Shopify_ID) as up_total from Mufflers WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr9 = mysqli_query($mysql, $up9);
       $upd9 = mysqli_fetch_assoc($upr9);
       
       //sandals
       $up10="Select Count(Shopify_ID) as up_total from sandals WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr10 = mysqli_query($mysql, $up10);
       $upd10 = mysqli_fetch_assoc($upr10);
       
       //shirts
       $up11="Select Count(Shopify_ID) as up_total from shirts WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr11 = mysqli_query($mysql, $up11);
       $upd11 = mysqli_fetch_assoc($upr11);
       
       //shorts
       $up12="Select Count(Shopify_ID) as up_total from shorts WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr12 = mysqli_query($mysql, $up12);
       $upd12 = mysqli_fetch_assoc($upr12);
       
       //shoes total
       $up13="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr13 = mysqli_query($mysql, $up13);
       $upd13 = mysqli_fetch_assoc($upr13);
       
       //shoes SK
       $up14="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!=''AND SKU LIKE 'SK-%'  AND DateTime Between '$fil1' AND '$fil2'";
       $upr14 = mysqli_query($mysql, $up14);
       $upd14 = mysqli_fetch_assoc($upr14);
       
       //shoes WP
       $up15="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU LIKE 'WP-%' AND DateTime Between '$fil1' AND '$fil2'";
       $upr15 = mysqli_query($mysql, $up15);
       $upd15 = mysqli_fetch_assoc($upr15);
       
       //shoes others
       $up16="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU NOT LIKE 'SK-%' AND SKU NOT LIKE 'WP-%' AND DateTime Between '$fil1' AND '$fil2'";
       $upr16 = mysqli_query($mysql, $up16);
       $upd16 = mysqli_fetch_assoc($upr16);
       
       //Socks
       $up17="Select Count(Shopify_ID) as up_total from Socks WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr17 = mysqli_query($mysql, $up17);
       $upd17 = mysqli_fetch_assoc($upr17);
       
       //Slippers
       $up18="Select Count(Shopify_ID) as up_total from Slippers WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr18 = mysqli_query($mysql, $up18);
       $upd18 = mysqli_fetch_assoc($upr18);
       
       //Tie
       $up19="Select Count(Shopify_ID) as up_total from Tie WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr19 = mysqli_query($mysql, $up19);
       $upd19 = mysqli_fetch_assoc($upr19);
       
       //TOPS
       $up20="Select Count(Shopify_ID) as up_total from TOPS WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr20 = mysqli_query($mysql, $up20);
       $upd20 = mysqli_fetch_assoc($upr20);
       
       //tshirts
       $up21="Select Count(Shopify_ID) as up_total from tshirts WHERE Shopify_ID!='' AND DateTime Between '$fil1' AND '$fil2'";
       $upr21 = mysqli_query($mysql, $up21);
       $upd21 = mysqli_fetch_assoc($upr21);
       
       
       
       
       // orders
       
       //total orders
       $ord1="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Status!='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr1 = mysqli_query($mysql, $ord1);
       while($row = mysqli_fetch_assoc($ordr1)) 
       { 
           $co++;
           $i=$row['order_id'];
       }
       $or_total=$co;
       
       //unbooked
       $ord2="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Status='None' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr2 = mysqli_query($mysql, $ord2);
       while($row = mysqli_fetch_assoc($ordr2)) 
       { 
           $c1++;
           $i=$row['order_id'];
       }
       $or_unbook_total=$c1;
       
       //confirmed
       $ord3="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Confirmed_By !='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr3 = mysqli_query($mysql, $ord3);
       while($row = mysqli_fetch_assoc($ordr3)) 
       { 
           $c2++;
           $i=$row['order_id'];
       }
       $or_conf_total=$c2;
       
       //cancel
       $ord4="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Cancel_By !='' AND Status='Cancel' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr4 = mysqli_query($mysql, $ord4);
       while($row = mysqli_fetch_assoc($ordr4)) 
       { 
           $c3++;
           $i=$row['order_id'];
       }
       $or_canc_total=$c3;
       
       //hold
       $ord5="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Hold_By !='' AND Status='Hold' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr5 = mysqli_query($mysql, $ord5);
       while($row = mysqli_fetch_assoc($ordr5)) 
       { 
           $c4++;
           $i=$row['order_id'];
       }
       $or_hold_total=$c4;
       
       //Book
       $ord6="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Confirmed_By !='' AND Booked_By !='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr6 = mysqli_query($mysql, $ord6);
       while($row = mysqli_fetch_assoc($ordr6)) 
       { 
           $c5++;
           $i=$row['order_id'];
       }
       $or_book_total=$c5;
       
       //Pick
       $ord16="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr16 = mysqli_query($mysql, $ord16);
       while($row = mysqli_fetch_assoc($ordr16)) 
       { 
           $c6++;
           $as=$row["order_id"];
          
       }
       
    
       $or_pick_total=$c6;
       
       //not picked
       $ord7="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Status='Booked' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr7 = mysqli_query($mysql, $ord7);
       while($row = mysqli_fetch_assoc($ordr7)) 
       { 
           $c7++;
           $i8=$row['order_id'];
       }
       $or_pick_left=$c7;
       
       //received
       $ord8="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND  Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr8 = mysqli_query($mysql, $ord8);
       while($row = mysqli_fetch_assoc($ordr8)) 
       { 
           $c8++;
           $i9=$row['order_id'];
       }
       $or_rece_total=$c8;
       
       
       $ord17="SELECT *,GROUP_CONCAT(Items) FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By ='' AND Status='Picked' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr17 = mysqli_query($mysql, $ord17);
       while($row = mysqli_fetch_assoc($ordr17)) 
       { 
           $c9++;
           $i10=$row['order_id'];
       }
       $or_rece_left=$c9;
       
       
       //pack
       $ord10="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By !='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr10 = mysqli_query($mysql, $ord10);
       while($row = mysqli_fetch_assoc($ordr10)) 
       { 
           $c10++;
           $i11=$row['order_id'];
       }
       $or_pack_total=$c10;
       
       $ord11="SELECT *,GROUP_CONCAT(Items) from orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By ='' AND Status='Recieved' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $ordr11 = mysqli_query($mysql, $ord11);
       while($row = mysqli_fetch_assoc($ordr11)) 
       { 
           $c11++;
           $i12=$row['order_id'];
       }
       $or_pack_left=$c11;
       
        //Items
       
       //pick
       $ord12="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Date Between '$check' AND '$check1'";
       $ordr12 = mysqli_query($mysql, $ord12);
       while($row = mysqli_fetch_assoc($ordr12)) 
       { 
           $c12++;
           $i12=$row['order_id'];
       }
       $or_ipick_total=$c12;
       
       //not found
       $ord13="SELECT * FROM orders WHERE Booked_By !='' AND Status ='Not_Found' AND Date Between '$check' AND '$check1'";
       $ordr13 = mysqli_query($mysql, $ord13);
       while($row = mysqli_fetch_assoc($ordr13)) 
       { 
           $c13++;
           $i13=$row['order_id'];
       }
       $or_inot_total=$c13;
       
       //QC
       $ord14="SELECT * FROM orders WHERE Booked_By !='' AND Status LIKE 'QC_Rejected%' AND Date Between '$check' AND '$check1'";
       $ordr14 = mysqli_query($mysql, $ord14);
       while($row = mysqli_fetch_assoc($ordr14)) 
       { 
           $c14++;
           $i14=$row['order_id'];
       }
       $or_iqc_total=$c14;
       
       //rec
       $ord15="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Date Between '$check' AND '$check1'";
       $ordr15 = mysqli_query($mysql, $ord15);
       while($row = mysqli_fetch_assoc($ordr15)) 
       { 
           $c15++;
           $i15=$row['order_id'];
       }
       $or_irece_total=$c15;
       
       //not rec
       $ord16="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By ='' AND Status='Picked' AND Date Between '$check' AND '$check1'";
       $ordr16 = mysqli_query($mysql, $ord16);
       while($row = mysqli_fetch_assoc($ordr16)) 
       { 
           $c16++;
           $i16=$row['order_id'];
       }
       $or_inrece_total=$c16;
       
       //not packed
       $ord17="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By='' AND Status='Recieved' AND Date Between '$check' AND '$check1'";
       $ordr17 = mysqli_query($mysql, $ord17);
       while($row = mysqli_fetch_assoc($ordr17)) 
       { 
           $c17++;
           $i17=$row['order_id'];
       }
       $or_inpack_total=$c17;
       
       
       //courier
       
       //post ex
       
       $post1 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status !='' AND  Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr1 = mysqli_query($mysql,$post1);
       while($row = mysqli_fetch_assoc($postr1)) 
       { 
           $po1++;
           $ip1=$row['order_id'];
       }
       $post_book_total=$po1;
       
       
       //unbooked
       
       $post2 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Unbooked' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr2 = mysqli_query($mysql,$post2);
       while($row = mysqli_fetch_assoc($postr2)) 
       { 
           $po2++;
           $ip2=$row['order_id'];
       }
       $post_unbook_total=$po2;
       
       //delivered
       $post3 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Delivered' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr3 = mysqli_query($mysql,$post3);
       while($row = mysqli_fetch_assoc($postr3)) 
       { 
           $po3++;
           $ip3=$row['order_id'];
       }
       $post_del_total=$po3;
       
       //out for del
       $post4 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Out For Delivery' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr4 = mysqli_query($mysql,$post4);
       while($row = mysqli_fetch_assoc($postr4)) 
       { 
           $po4++;
           $ip4=$row['order_id'];
       }
       $post_out_total=$po4;
       
       //PostEx Warehouse
       $post5 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='PostEx Warehouse' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr5 = mysqli_query($mysql,$post5);
       while($row = mysqli_fetch_assoc($postr5)) 
       { 
           $po5++;
           $ip5=$row['order_id'];
       }
       $post_ware_total=$po5;
       
       //Attempted
       $post6 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Attempted' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr6 = mysqli_query($mysql,$post6);
       while($row = mysqli_fetch_assoc($postr6)) 
       { 
           $po6++;
           $ip6=$row['order_id'];
       }
       $post_att_total=$po6;
       
       //Un-Assigned By Me
       $post7 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Un-Assigned By Me' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr7 = mysqli_query($mysql,$post7);
       while($row = mysqli_fetch_assoc($postr7)) 
       { 
           $po7++;
           $ip7=$row['order_id'];
       }
       $post_un_total=$po7;
       
       //Expired
       $post8 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Expired' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr8 = mysqli_query($mysql,$post8);
       while($row = mysqli_fetch_assoc($postr8)) 
       { 
           $po8++;
           $ip8=$row['order_id'];
       }
       $post_ex_total=$po8;
       
       //Delivery Under Review
       $post9 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Delivery Under Review' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr9 = mysqli_query($mysql,$post9);
       while($row = mysqli_fetch_assoc($postr9)) 
       { 
           $po9++;
           $ip9=$row['order_id'];
       }
       $post_delr_total=$po9;
       
       //Picked By PostEx
       $post10 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Picked By PostEx' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr10 = mysqli_query($mysql,$post10);
       while($row = mysqli_fetch_assoc($postr10)) 
       { 
           $po10++;
           $ip10=$row['order_id'];
       }
       $post_pick_total=$po10;
       
       // Out For Return
       $post11 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Out For Return' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr11 = mysqli_query($mysql,$post11);
       while($row = mysqli_fetch_assoc($postr11)) 
       { 
           $po11++;
           $ip11=$row['order_id'];
       }
       $post_outr_total=$po11;
       
       //En-Route 
       
       $post12 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status LIKE 'En-Route%' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $postr12 = mysqli_query($mysql,$post12);
       while($row = mysqli_fetch_assoc($postr12)) 
       { 
           $po12++;
           $ip12=$row['order_id'];
       }
       $post_enroute_total=$po12;
       
       
       
        //leopard
   
       //book
       $leo1 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status !='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor1 = mysqli_query($mysql,$leo1);
       while($row = mysqli_fetch_assoc($leor1)) 
       { 
           $lq1++;
           $li1=$row['order_id'];
       }
       $leo_book_total=$lq1;
       
       //Pickup Request not Send
       $leo2 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Pickup Request not Send' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor2 = mysqli_query($mysql,$leo2);
       while($row = mysqli_fetch_assoc($leor2)) 
       { 
           $lq2++;
           $li2=$row['order_id'];
       }
       $leo_enroute_total=$lq2;
       
       //Delivered
       $leo3 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Delivered' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor3 = mysqli_query($mysql,$leo3);
       while($row = mysqli_fetch_assoc($leor3)) 
       { 
           $lq3++;
           $li3=$row['order_id'];
       }
       $leo_del_total=$lq3;
       
       //Assign to Courier
       $leo4 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Assign to Courier' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor4 = mysqli_query($mysql,$leo4);
       while($row = mysqli_fetch_assoc($leor4)) 
       { 
           $lq4++;
           $li4=$row['order_id'];
       }
       $leo_ass_total=$lq4;
       
       //Cancelled
       $leo5 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Cancelled' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor5 = mysqli_query($mysql,$leo5);
       while($row = mysqli_fetch_assoc($leor5)) 
       { 
           $lq5++;
           $li5=$row['order_id'];
       }
       $leo_can_total=$lq5;
       
       //Refused
       $leo6 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Cancelled' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor6 = mysqli_query($mysql,$leo6);
       while($row = mysqli_fetch_assoc($leor6)) 
       { 
           $lq6++;
           $li6=$row['order_id'];
       }
       $leo_ref_total=$lq6;
       
       //	Returned to shipper
       $leo7 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Returned to shipper' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor7 = mysqli_query($mysql,$leo7);
       while($row = mysqli_fetch_assoc($leor7)) 
       { 
           $lq7++;
           $li7=$row['order_id'];
       }
       $leo_ret_total=$lq7;
       
       //Arrived at Station
       $leo8 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Arrived at Station' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor8 = mysqli_query($mysql,$leo8);
       while($row = mysqli_fetch_assoc($leor8)) 
       { 
           $lq8++;
           $li8=$row['order_id'];
       }
       $leo_arr_total=$lq8;
       
       //Being Return
       $leo9 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Being Return' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $leor9 = mysqli_query($mysql,$leo9);
       while($row = mysqli_fetch_assoc($leor9)) 
       { 
           $lq9++;
           $li9=$row['order_id'];
       }
       $leo_bret_total=$lq9;
       
       
       //post ex
       
       //booked
       $trx1 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status!='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr1 = mysqli_query($mysql,$trx1);
       while($row = mysqli_fetch_assoc($trxr1)) 
       { 
           $tr1++;
           $it1=$row['order_id'];
       }
       $trx_book_total=$tr1;
       
       //Shipment - In Transit
       $trx2 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - In Transit' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr2 = mysqli_query($mysql,$trx2);
       while($row = mysqli_fetch_assoc($trxr2)) 
       { 
           $tr2++;
           $it2=$row['order_id'];
       }
       $trx_trans_total=$tr2;
       
       //Shipment - Delivered
       $trx3 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Delivered' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr3 = mysqli_query($mysql,$trx3);
       while($row = mysqli_fetch_assoc($trxr3)) 
       { 
           $tr3++;
           $it3=$row['order_id'];
       }
       $trx_del_total=$tr3;
       
       //Return - In Transit
       $trx4 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - In Transit' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr4 = mysqli_query($mysql,$trx4);
       while($row = mysqli_fetch_assoc($trxr4)) 
       { 
           $tr4++;
           $it4=$row['order_id'];
       }
       $trx_ret_total=$tr4;
       
       //	Shipment - Cancelled
       $trx5 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Cancelled' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr5 = mysqli_query($mysql,$trx5);
       while($row = mysqli_fetch_assoc($trxr5)) 
       { 
           $tr5++;
           $it5=$row['order_id'];
       }
       $trx_can_total=$tr5;
       
       //Return - Confirm
       $trx6 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - Confirm' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr6 = mysqli_query($mysql,$trx6);
       while($row = mysqli_fetch_assoc($trxr6)) 
       { 
           $tr6++;
           $it6=$row['order_id'];
       }
       $trx_rtc_total=$tr6;
       
       //Shipment - Return Confirmation Pending
       $trx7 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Return Confirmation Pending' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr7 = mysqli_query($mysql,$trx7);
       while($row = mysqli_fetch_assoc($trxr7)) 
       { 
           $tr7++;
           $it7=$row['order_id'];
       }
       $trx_rtcp_total=$tr7;
       
       //Return - Delivered to Shipper
       $trx8 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - Delivered to Shipper' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr8 = mysqli_query($mysql,$trx8);
       while($row = mysqli_fetch_assoc($trxr8)) 
       { 
           $tr8++;
           $it8=$row['order_id'];
       }
       $trx_rts_total=$tr8;
       
       //Shipment - Booked
       $trx9 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Booked' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $trxr9 = mysqli_query($mysql,$trx9);
       while($row = mysqli_fetch_assoc($trxr9)) 
       { 
           $tr9++;
           $it9=$row['order_id'];
       }
       $trx_cbook_total=$tr9;
       
       
       //Karachi
       
       //book
       $khi1 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $khir1 = mysqli_query($mysql,$khi1);
       while($row = mysqli_fetch_assoc($khir1)) 
       { 
           $kh1++;
           $ik1=$row['order_id'];
       }
       $khi_book_total=$kh1;
       
       //Payment Recieved
       $khi2 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status LIKE 'Payment%' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $khir2 = mysqli_query($mysql,$khi2);
       while($row = mysqli_fetch_assoc($khir2)) 
       { 
           $kh2++;
           $ik2=$row['order_id'];
       }
       $khi_pay_total=$kh2;
       
       //Dispatched
       $khi3 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Dispatched' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $khir3 = mysqli_query($mysql,$khi3);
       while($row = mysqli_fetch_assoc($khir3)) 
       { 
           $kh3++;
           $ik3=$row['order_id'];
       }
       $khi_dis_total=$kh3;
       
       //Returned
       $khi4 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Returned' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $khir4 = mysqli_query($mysql,$khi4);
       while($row = mysqli_fetch_assoc($khir4)) 
       { 
           $kh4++;
           $ik4=$row['order_id'];
       }
       $khi_ret_total=$kh4;
       
       //Delivered
       $khi5 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Delivered' AND Date Between '$check' AND '$check1' GROUP by order_num DESC";
       $khir5 = mysqli_query($mysql,$khi5);
       while($row = mysqli_fetch_assoc($khir5)) 
       { 
           $kh5++;
           $ik5=$row['order_id'];
       }
       $khi_del_total=$kh5;
   }
   
   
   else
   {
       //pr
       $pr="Select Count(PR_ID) as pr_total from purchase_request";
       $result = mysqli_query($mysql, $pr);
       $data = mysqli_fetch_assoc($result);
       
       //pr
       $pr1="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Approved'";
       $result1 = mysqli_query($mysql, $pr1);
       $data1 = mysqli_fetch_assoc($result1);
       
       $pr2="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Rejected'";
       $result2 = mysqli_query($mysql, $pr2);
       $data2 = mysqli_fetch_assoc($result2);
       
       $pr3="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Pending'";
       $result3 = mysqli_query($mysql, $pr3);
       $data3 = mysqli_fetch_assoc($result3);
       
       $pr4="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Changes_Required'";
       $result4 = mysqli_query($mysql, $pr4);
       $data4 = mysqli_fetch_assoc($result4);
       
       $pr5="Select Count(PR_ID) as pr_total from purchase_request WHERE PR_Status='Delayed'";
       $result5 = mysqli_query($mysql, $pr5);
       $data5 = mysqli_fetch_assoc($result5);
      
       //uploads
       $fil1=$check.'00:00:00';
       $fil2=$check1.'23:59:59';
       
       //bags
       $up1="Select Count(Shopify_ID) as up_total from Bags WHERE Shopify_ID!=''";
       $upr1 = mysqli_query($mysql, $up1);
       $upd1 = mysqli_fetch_assoc($upr1);
       
       //beanies
       $up2="Select Count(Shopify_ID) as up_total from Beanies WHERE Shopify_ID!=''";
       $upr2 = mysqli_query($mysql, $up2);
       $upd2 = mysqli_fetch_assoc($upr2);
       
       //belts
       $up3="Select Count(Shopify_ID) as up_total from belts WHERE Shopify_ID!=''";
       $upr3 = mysqli_query($mysql, $up3);
       $upd3 = mysqli_fetch_assoc($upr3);
       
       
       //bottoms
       $up4="Select Count(Shopify_ID) as up_total from bottoms WHERE Shopify_ID!=''";
       $upr4 = mysqli_query($mysql, $up4);
       $upd4 = mysqli_fetch_assoc($upr4);
       
       //caps
       $up5="Select Count(Shopify_ID) as up_total from caps WHERE Shopify_ID!=''";
       $upr5 = mysqli_query($mysql, $up5);
       $upd5 = mysqli_fetch_assoc($upr5);
       
       //Cleaning kits
       $up6="Select Count(Shopify_ID) as up_total from `Cleaning kits` WHERE Shopify_ID!=''";
       $upr6 = mysqli_query($mysql, $up6);
       $upd6 = mysqli_fetch_assoc($upr6);
       
       //Hoodies
       $up7="Select Count(Shopify_ID) as up_total from Hoodies WHERE Shopify_ID!=''";
       $upr7 = mysqli_query($mysql, $up7);
       $upd7 = mysqli_fetch_assoc($upr7);
       
       //Kids
       $up8="Select Count(Shopify_ID) as up_total from Kids WHERE Shopify_ID!=''";
       $upr8 = mysqli_query($mysql, $up8);
       $upd8 = mysqli_fetch_assoc($upr8);
       
       //Mufflers
       $up9="Select Count(Shopify_ID) as up_total from Mufflers WHERE Shopify_ID!=''";
       $upr9 = mysqli_query($mysql, $up9);
       $upd9 = mysqli_fetch_assoc($upr9);
       
       //sandals
       $up10="Select Count(Shopify_ID) as up_total from sandals WHERE Shopify_ID!=''";
       $upr10 = mysqli_query($mysql, $up10);
       $upd10 = mysqli_fetch_assoc($upr10);
       
       //shirts
       $up11="Select Count(Shopify_ID) as up_total from shirts WHERE Shopify_ID!=''";
       $upr11 = mysqli_query($mysql, $up11);
       $upd11 = mysqli_fetch_assoc($upr11);
       
       //shorts
       $up12="Select Count(Shopify_ID) as up_total from shorts WHERE Shopify_ID!=''";
       $upr12 = mysqli_query($mysql, $up12);
       $upd12 = mysqli_fetch_assoc($upr12);
       
       //shoes total
       $up13="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!=''";
       $upr13 = mysqli_query($mysql, $up13);
       $upd13 = mysqli_fetch_assoc($upr13);
       
       //shoes SK
       $up14="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!=''AND SKU LIKE 'SK-%'";
       $upr14 = mysqli_query($mysql, $up14);
       $upd14 = mysqli_fetch_assoc($upr14);
       
       //shoes WP
       $up15="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU LIKE 'WP-%'";
       $upr15 = mysqli_query($mysql, $up15);
       $upd15 = mysqli_fetch_assoc($upr15);
       
       //shoes others
       $up16="Select Count(Shopify_ID) as up_total from shoes WHERE Shopify_ID!='' AND SKU NOT LIKE 'SK-%' AND SKU NOT LIKE 'WP-%'";
       $upr16 = mysqli_query($mysql, $up16);
       $upd16 = mysqli_fetch_assoc($upr16);
       
         
       //Socks
       $up17="Select Count(Shopify_ID) as up_total from Socks WHERE Shopify_ID!=''";
       $upr17 = mysqli_query($mysql, $up17);
       $upd17 = mysqli_fetch_assoc($upr17);
       
       //Slippers
       $up18="Select Count(Shopify_ID) as up_total from Slippers WHERE Shopify_ID!=''";
       $upr18 = mysqli_query($mysql, $up18);
       $upd18 = mysqli_fetch_assoc($upr18);
       
       //Tie
       $up19="Select Count(Shopify_ID) as up_total from Tie WHERE Shopify_ID!=''";
       $upr19 = mysqli_query($mysql, $up19);
       $upd19 = mysqli_fetch_assoc($upr19);
       
       //TOPS
       $up20="Select Count(Shopify_ID) as up_total from TOPS WHERE Shopify_ID!=''";
       $upr20 = mysqli_query($mysql, $up20);
       $upd20 = mysqli_fetch_assoc($upr20);
       
       //tshirts
       $up21="Select Count(Shopify_ID) as up_total from tshirts WHERE Shopify_ID!=''";
       $upr21 = mysqli_query($mysql, $up21);
       $upd21 = mysqli_fetch_assoc($upr21);
       
       
       // orders
       $ord1="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Date > '2022-03-20' AND Status!='' GROUP by order_num DESC";
       $ordr1 = mysqli_query($mysql, $ord1);
       while($row = mysqli_fetch_assoc($ordr1)) 
       { 
           $co++;
           $i1=$row['order_id'];
       }
       $or_total=$co;
       
       $ord2="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Status='None' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr2 = mysqli_query($mysql, $ord2);
       while($row = mysqli_fetch_assoc($ordr2)) 
       { 
           $c1++;
           $i2=$row['order_id'];
       }
       $or_unbook_total=$c1;
       
       //confirmed
       $ord3="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Confirmed_By !='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr3 = mysqli_query($mysql, $ord3);
       while($row = mysqli_fetch_assoc($ordr3)) 
       { 
           $c2++;
           $i3=$row['order_id'];
       }
       $or_conf_total=$c2;
       
       //cancel
       $ord4="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Cancel_By !='' AND Status='Cancel' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr4 = mysqli_query($mysql, $ord4);
       while($row = mysqli_fetch_assoc($ordr4)) 
       { 
           $c3++;
           $i4=$row['order_id'];
       }
       $or_canc_total=$c3;
       
       //hold
       $ord5="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Hold_By !='' AND Status='Hold' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr5 = mysqli_query($mysql, $ord5);
       while($row = mysqli_fetch_assoc($ordr5)) 
       { 
           $c4++;
           $i5=$row['order_id'];
       }
       $or_hold_total=$c4;
       
       //Book
       $ord6="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Confirmed_By !='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr6 = mysqli_query($mysql, $ord6);
       while($row = mysqli_fetch_assoc($ordr6)) 
       { 
           $c5++;
           $i6=$row['order_id'];
       }
       $or_book_total=$c5;
       
       //Pick
       $ord16="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr16 = mysqli_query($mysql, $ord16);
       while($row = mysqli_fetch_assoc($ordr16)) 
       { 
           $c6++;
           $as=$row["order_id"];
          
       }
       
    
       $or_pick_total=$c6;
       
       //not picked
       $ord7="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Status='Booked' AND Picked_By ='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr7 = mysqli_query($mysql, $ord7);
       while($row = mysqli_fetch_assoc($ordr7)) 
       { 
           $c7++;
           $i8=$row['order_id'];
       }
       $or_pick_left=$c7;
       
       //received
       $ord8="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !=''  AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr8 = mysqli_query($mysql, $ord8);
       while($row = mysqli_fetch_assoc($ordr8)) 
       { 
           $c8++;
           $i9=$row['order_id'];
       }
       $or_rece_total=$c8;
       
       
       $ord17="SELECT *,GROUP_CONCAT(Items) FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By ='' AND Status='Picked' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr17 = mysqli_query($mysql, $ord17);
       while($row = mysqli_fetch_assoc($ordr17)) 
       { 
           $c9++;
           $i10=$row['order_id'];
       }
       $or_rece_left=$c9;
       
       
       //pack
       $ord10="SELECT *,GROUP_CONCAT(Items) as con FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By !='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr10 = mysqli_query($mysql, $ord10);
       while($row = mysqli_fetch_assoc($ordr10)) 
       { 
           $c10++;
           $i11=$row['order_id'];
       }
       $or_pack_total=$c10;
       
       $ord11="SELECT *,GROUP_CONCAT(Items) from orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By ='' AND Status='Recieved' AND Date > '2022-03-20' GROUP by order_num DESC";
       $ordr11 = mysqli_query($mysql, $ord11);
       while($row = mysqli_fetch_assoc($ordr11)) 
       { 
           $c11++;
           $i12=$row['order_id'];
       }
       $or_pack_left=$c11;
       
       
       //Items
       
       //pick
       $ord12="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Date > '2022-03-20'";
       $ordr12 = mysqli_query($mysql, $ord12);
       while($row = mysqli_fetch_assoc($ordr12)) 
       { 
           $c12++;
           $i12=$row['order_id'];
       }
       $or_ipick_total=$c12;
       
       //not found
       $ord13="SELECT * FROM orders WHERE Booked_By !='' AND Status ='Not_Found' AND Date > '2022-03-20'";
       $ordr13 = mysqli_query($mysql, $ord13);
       while($row = mysqli_fetch_assoc($ordr13)) 
       { 
           $c13++;
           $i13=$row['order_id'];
       }
       $or_inot_total=$c13;
       
       //QC
       $ord14="SELECT * FROM orders WHERE Booked_By !='' AND Status LIKE 'QC_Rejected%' AND Date > '2022-03-20'";
       $ordr14 = mysqli_query($mysql, $ord14);
       while($row = mysqli_fetch_assoc($ordr14)) 
       { 
           $c14++;
           $i14=$row['order_id'];
       }
       $or_iqc_total=$c14;
       
       //rec
       $ord15="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Date > '2022-03-20'";
       $ordr15 = mysqli_query($mysql, $ord15);
       while($row = mysqli_fetch_assoc($ordr15)) 
       { 
           $c15++;
           $i15=$row['order_id'];
       }
       $or_irece_total=$c15;
       
       //not rec
       $ord16="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By ='' AND Status='Picked' AND Date > '2022-03-20'";
       $ordr16 = mysqli_query($mysql, $ord16);
       while($row = mysqli_fetch_assoc($ordr16)) 
       { 
           $c16++;
           $i16=$row['order_id'];
       }
       $or_inrece_total=$c16;
       
       //not packed
       $ord17="SELECT * FROM orders WHERE Booked_By !='' AND Picked_By !='' AND Recieved_By !='' AND Packed_By='' AND Status='Recieved' AND Date > '2022-03-20'";
       $ordr17 = mysqli_query($mysql, $ord17);
       while($row = mysqli_fetch_assoc($ordr17)) 
       { 
           $c17++;
           $i17=$row['order_id'];
       }
       $or_inpack_total=$c17;
       
       
       //courier
       
       //post ex
       
       $post1 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status !='' AND  Date > '2022-03-20' GROUP by order_num DESC";
       $postr1 = mysqli_query($mysql,$post1);
       while($row = mysqli_fetch_assoc($postr1)) 
       { 
           $po1++;
           $ip1=$row['order_id'];
       }
       $post_book_total=$po1;
       
       
       //unbooked
       
       $post2 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Unbooked' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr2 = mysqli_query($mysql,$post2);
       while($row = mysqli_fetch_assoc($postr2)) 
       { 
           $po2++;
           $ip2=$row['order_id'];
       }
       $post_unbook_total=$po2;
       
       //delivered
       $post3 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Delivered' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr3 = mysqli_query($mysql,$post3);
       while($row = mysqli_fetch_assoc($postr3)) 
       { 
           $po3++;
           $ip3=$row['order_id'];
       }
       $post_del_total=$po3;
       
       //out for del
       $post4 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Out For Delivery' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr4 = mysqli_query($mysql,$post4);
       while($row = mysqli_fetch_assoc($postr4)) 
       { 
           $po4++;
           $ip4=$row['order_id'];
       }
       $post_out_total=$po4;
       
       //PostEx Warehouse
       $post5 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='PostEx Warehouse' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr5 = mysqli_query($mysql,$post5);
       while($row = mysqli_fetch_assoc($postr5)) 
       { 
           $po5++;
           $ip5=$row['order_id'];
       }
       $post_ware_total=$po5;
       
       //Attempted
       $post6 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Attempted' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr6 = mysqli_query($mysql,$post6);
       while($row = mysqli_fetch_assoc($postr6)) 
       { 
           $po6++;
           $ip6=$row['order_id'];
       }
       $post_att_total=$po6;
       
       //Un-Assigned By Me
       $post7 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Un-Assigned By Me' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr7 = mysqli_query($mysql,$post7);
       while($row = mysqli_fetch_assoc($postr7)) 
       { 
           $po7++;
           $ip7=$row['order_id'];
       }
       $post_un_total=$po7;
       
       //Expired
       $post8 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Expired' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr8 = mysqli_query($mysql,$post8);
       while($row = mysqli_fetch_assoc($postr8)) 
       { 
           $po8++;
           $ip8=$row['order_id'];
       }
       $post_ex_total=$po8;
       
       //Delivery Under Review
       $post9 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Delivery Under Review' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr9 = mysqli_query($mysql,$post9);
       while($row = mysqli_fetch_assoc($postr9)) 
       { 
           $po9++;
           $ip9=$row['order_id'];
       }
       $post_delr_total=$po9;
       
       //Picked By PostEx
       $post10 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Picked By PostEx' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr10 = mysqli_query($mysql,$post10);
       while($row = mysqli_fetch_assoc($postr10)) 
       { 
           $po10++;
           $ip10=$row['order_id'];
       }
       $post_pick_total=$po10;
       
       // Out For Return
       $post11 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status='Out For Return' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr11 = mysqli_query($mysql,$post11);
       while($row = mysqli_fetch_assoc($postr11)) 
       { 
           $po11++;
           $ip11=$row['order_id'];
       }
       $post_outr_total=$po11;
       
       //En-Route 
       
       $post12 = "SELECT *,GROUP_CONCAT(Items) as con FROM post_ex_courier WHERE Courier_Tracking!= '' AND Courier_Status LIKE 'En-Route%' AND Date > '2022-03-20' GROUP by order_num DESC";
       $postr12 = mysqli_query($mysql,$post12);
       while($row = mysqli_fetch_assoc($postr12)) 
       { 
           $po12++;
           $ip12=$row['order_id'];
       }
       $post_enroute_total=$po12;
       
       
       
        //leopard
   
       //book
       $leo1 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status !='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor1 = mysqli_query($mysql,$leo1);
       while($row = mysqli_fetch_assoc($leor1)) 
       { 
           $lq1++;
           $li1=$row['order_id'];
       }
       $leo_book_total=$lq1;
       
       //Pickup Request not Send
       $leo2 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Pickup Request not Send' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor2 = mysqli_query($mysql,$leo2);
       while($row = mysqli_fetch_assoc($leor2)) 
       { 
           $lq2++;
           $li2=$row['order_id'];
       }
       $leo_enroute_total=$lq2;
       
       //Delivered
       $leo3 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Delivered' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor3 = mysqli_query($mysql,$leo3);
       while($row = mysqli_fetch_assoc($leor3)) 
       { 
           $lq3++;
           $li3=$row['order_id'];
       }
       $leo_del_total=$lq3;
       
       //Assign to Courier
       $leo4 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Assign to Courier' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor4 = mysqli_query($mysql,$leo4);
       while($row = mysqli_fetch_assoc($leor4)) 
       { 
           $lq4++;
           $li4=$row['order_id'];
       }
       $leo_ass_total=$lq4;
       
       //Cancelled
       $leo5 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Cancelled' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor5 = mysqli_query($mysql,$leo5);
       while($row = mysqli_fetch_assoc($leor5)) 
       { 
           $lq5++;
           $li5=$row['order_id'];
       }
       $leo_can_total=$lq5;
       
       //Refused
       $leo6 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Cancelled' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor6 = mysqli_query($mysql,$leo6);
       while($row = mysqli_fetch_assoc($leor6)) 
       { 
           $lq6++;
           $li6=$row['order_id'];
       }
       $leo_ref_total=$lq6;
       
       //	Returned to shipper
       $leo7 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Returned to shipper' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor7 = mysqli_query($mysql,$leo7);
       while($row = mysqli_fetch_assoc($leor7)) 
       { 
           $lq7++;
           $li7=$row['order_id'];
       }
       $leo_ret_total=$lq7;
       
       //Arrived at Station
       $leo8 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Arrived at Station' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor8 = mysqli_query($mysql,$leo8);
       while($row = mysqli_fetch_assoc($leor8)) 
       { 
           $lq8++;
           $li8=$row['order_id'];
       }
       $leo_arr_total=$lq8;
       
       //Being Return
       $leo9 = "SELECT *,GROUP_CONCAT(Items) as con FROM leopard_courier WHERE Courier_Tracking !='' AND Status ='Being Return' AND Date > '2022-03-20' GROUP by order_num DESC";
       $leor9 = mysqli_query($mysql,$leo9);
       while($row = mysqli_fetch_assoc($leor9)) 
       { 
           $lq9++;
           $li9=$row['order_id'];
       }
       $leo_bret_total=$lq9;
       
       
       //post ex
       
       //booked
       $trx1 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status!='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr1 = mysqli_query($mysql,$trx1);
       while($row = mysqli_fetch_assoc($trxr1)) 
       { 
           $tr1++;
           $it1=$row['order_id'];
       }
       $trx_book_total=$tr1;
       
       //Shipment - In Transit
       $trx2 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - In Transit' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr2 = mysqli_query($mysql,$trx2);
       while($row = mysqli_fetch_assoc($trxr2)) 
       { 
           $tr2++;
           $it2=$row['order_id'];
       }
       $trx_trans_total=$tr2;
       
       //Shipment - Delivered
       $trx3 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Delivered' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr3 = mysqli_query($mysql,$trx3);
       while($row = mysqli_fetch_assoc($trxr3)) 
       { 
           $tr3++;
           $it3=$row['order_id'];
       }
       $trx_del_total=$tr3;
       
       //Return - In Transit
       $trx4 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - In Transit' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr4 = mysqli_query($mysql,$trx4);
       while($row = mysqli_fetch_assoc($trxr4)) 
       { 
           $tr4++;
           $it4=$row['order_id'];
       }
       $trx_ret_total=$tr4;
       
       //	Shipment - Cancelled
       $trx5 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Cancelled' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr5 = mysqli_query($mysql,$trx5);
       while($row = mysqli_fetch_assoc($trxr5)) 
       { 
           $tr5++;
           $it5=$row['order_id'];
       }
       $trx_can_total=$tr5;
       
       //Return - Confirm
       $trx6 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - Confirm' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr6 = mysqli_query($mysql,$trx6);
       while($row = mysqli_fetch_assoc($trxr6)) 
       { 
           $tr6++;
           $it6=$row['order_id'];
       }
       $trx_rtc_total=$tr6;
       
       //Shipment - Return Confirmation Pending
       $trx7 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Return Confirmation Pending' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr7 = mysqli_query($mysql,$trx7);
       while($row = mysqli_fetch_assoc($trxr7)) 
       { 
           $tr7++;
           $it7=$row['order_id'];
       }
       $trx_rtcp_total=$tr7;
       
       //Return - Delivered to Shipper
       $trx8 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Return - Delivered to Shipper' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr8 = mysqli_query($mysql,$trx8);
       while($row = mysqli_fetch_assoc($trxr8)) 
       { 
           $tr8++;
           $it8=$row['order_id'];
       }
       $trx_rts_total=$tr8;
       
       //Shipment - Booked
       $trx9 = "SELECT *,GROUP_CONCAT(Items) as con FROM trax_courier WHERE Courier_Tracking!='' AND Status='Shipment - Booked' AND Date > '2022-03-20' GROUP by order_num DESC";
       $trxr9 = mysqli_query($mysql,$trx9);
       while($row = mysqli_fetch_assoc($trxr9)) 
       { 
           $tr9++;
           $it9=$row['order_id'];
       }
       $trx_cbook_total=$tr9;
       
       
       //Karachi
       
       //book
       $khi1 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Date > '2022-03-20' GROUP by order_num DESC";
       $khir1 = mysqli_query($mysql,$khi1);
       while($row = mysqli_fetch_assoc($khir1)) 
       { 
           $kh1++;
           $ik1=$row['order_id'];
       }
       $khi_book_total=$kh1;
       
       //Payment Recieved
       $khi2 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status LIKE 'Payment%' AND Date > '2022-03-20' GROUP by order_num DESC";
       $khir2 = mysqli_query($mysql,$khi2);
       while($row = mysqli_fetch_assoc($khir2)) 
       { 
           $kh2++;
           $ik2=$row['order_id'];
       }
       $khi_pay_total=$kh2;
       
       //Dispatched
       $khi3 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Dispatched' AND Date > '2022-03-20' GROUP by order_num DESC";
       $khir3 = mysqli_query($mysql,$khi3);
       while($row = mysqli_fetch_assoc($khir3)) 
       { 
           $kh3++;
           $ik3=$row['order_id'];
       }
       $khi_dis_total=$kh3;
       
       //Returned
       $khi4 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Returned' AND Date > '2022-03-20' GROUP by order_num DESC";
       $khir4 = mysqli_query($mysql,$khi4);
       while($row = mysqli_fetch_assoc($khir4)) 
       { 
           $kh4++;
           $ik4=$row['order_id'];
       }
       $khi_ret_total=$kh4;
       
       //Delivered
       $khi5 = "SELECT *,GROUP_CONCAT(Items) as con FROM karachi_courier WHERE Courier_Tracking!='' AND Status='Delivered' AND Date > '2022-03-20' GROUP by order_num DESC";
       $khir5 = mysqli_query($mysql,$khi5);
       while($row = mysqli_fetch_assoc($khir5)) 
       { 
           $kh5++;
           $ik5=$row['order_id'];
       }
       $khi_del_total=$kh5;
       
   }
   
   
   
   
   
   ?>
<?php include ("../include/header.php"); ?>
<!-- End breadcrumb -->
<form action="" method="POST" class="PR">
    <div class='container'>
      <div class="row">
         <div class="col-md-6" style="padding: 0px;">
            <h2>Purchase Request</h2>
         </div>
         <div class="col-md-2" style="padding: 0px;">
            <input placeholder="YYYY-DD-MM" type="date" name="from" style="padding: 5px 30px !important;">
         </div>
         <div class="col-md-2" style="padding: 0px;">
            <input  placeholder="YYYY-DD-MM" type="date" name="To"  style="padding: 5px 30px !important;">
         </div>
         <div class="form-group" style="display: flex;">
            <button name="filter" class="btn btn-info" style="
    padding: 7px 55px;
    border-radius: 0;
">Filter</button>
         </div>
      </div>
   </div>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="pr_total"><?php echo $data['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Generated</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $data1['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Approved</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $data2['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Rejected</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $data3['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Pending</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $data4['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Changes Req</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $data5['pr_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PR Delayed</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <br>
   <br>
   <h2>Uploading</h2>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $upd1['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Bags</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $upd2['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Beanies</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $upd3['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Belts</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $upd4['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Bottoms</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $upd5['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Caps</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $upd6['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Cleaning kits</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $upd7['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Hoodies</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $upd8['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Kids</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $upd9['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Mufflers</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $upd17['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Socks</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $upd11['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Shirts</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $upd12['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Shorts</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $upd19['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Ties</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $upd20['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Tops</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $upd21['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded T-Shirts</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">None</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">None</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">None</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h4>Foot Wear</h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $upd13['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Shoes</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $upd14['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Shoes SK</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $upd15['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploade Shoes WP</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $upd16['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Shoes Others</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $upd10['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Sandals</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $upd18['up_total']; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Uploaded Slippers</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h2>Orders</h2>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $or_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Orders</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $or_unbook_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Pending</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $or_conf_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Confirmed</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $or_canc_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Canceled</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $or_hold_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Hold</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $or_book_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Booked</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $or_pick_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Picked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $or_pick_left; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Picked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $or_rece_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Received</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $or_rece_left; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Received</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $or_pack_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Packed</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $or_pack_left; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Packed</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h4>Item Level </h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $or_ipick_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Picked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $or_iqc_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">QC Rejected</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $or_inot_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Found</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $or_irece_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Received</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $or_inrece_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Received</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $or_inpack_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Not Packed</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h2>Courier </h2>
   <br>
   <h4>Post-EX</h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $post_book_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Booked Parcel</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $post_unbook_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">UnBooked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $post_del_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Delivered</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $post_out_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Out For Delivery</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $post_ware_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">PostEx Warehouse</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_att_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Attempted</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_un_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Un-Assigned By Me</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_ex_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Expired</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_delr_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Delivery Under Review</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_pick_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Picked By PostEx</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_outr_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Out For Return</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $post_enroute_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> En-Route to PostEx warehouse</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h4>Leopard </h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $leo_book_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Booked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $leo_enroute_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Pickup Request not Send</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $leo_del_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Delivered</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $leo_ass_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Assign to Courier</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $leo_can_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Cancelled</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $leo_ref_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Refused</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $leo_ret_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Returned to shipper</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $leo_arr_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Arrived at Station</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $leo_bret_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Being Return</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h4>Trax</h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
         <div class="col-md-12">
            <div class="card card-bgimg br-7">
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $trx_book_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Booked</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $trx_trans_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Shipment - In Transit</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $trx_del_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Shipment - Delivered</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $trx_ret_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Return - In Transit</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $trx_can_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Shipment - Cancelled</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $trx_rtc_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Return - Confirm</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $trx_rtcp_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Shipment - Return Confirmation Pending</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $trx_rts_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Return - Delivered to Shipper</span></div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                     <div class="card-body text-center">
                        <h5 class="text-white">Total</h5>
                        <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pack"><?php echo $trx_cbook_total; ?></h2>
                        <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Shipment - Booked</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
   <h4>Karachi</h4>
   <table width="100%" style="background-color: #0066ff;color: white;">
      <div class="row">
      <div class="col-md-12">
         <div class="card card-bgimg br-7">
            <div class="row">
               <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                  <div class="card-body text-center">
                     <h5 class="text-white">Total</h5>
                     <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="orders"><?php echo $khi_book_total; ?></h2>
                     <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white">Booked</span></div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                  <div class="card-body text-center">
                     <h5 class="text-white">Total</h5>
                     <h2 class="mb-2 mt-3 fs-2 text-white mainvalue" id="confirm"><?php echo $khi_pay_total; ?></h2>
                     <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Payment Recieved </span></div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                  <div class="card-body text-center">
                     <h5 class="text-white">Total</h5>
                     <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="canceled"><?php echo $khi_dis_total; ?></h2>
                     <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Dispatched</span></div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                  <div class="card-body text-center">
                     <h5 class="text-white">Total</h5>
                     <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="hold"><?php echo $khi_ret_total; ?></h2>
                     <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Returned</span></div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-6 col-sm-6 pr-0 pl-0">
                  <div class="card-body text-center">
                     <h5 class="text-white">Total</h5>
                     <h2 class="mb-2 mt-3 fs-2 text-white mainvalue"  id="pick"><?php echo $khi_del_total; ?></h2>
                     <div><i class="si si-graph mr-1 text-danger"></i><span class="text-white"> Delivered</span></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </table>
</form>
<?php include ("../include/footer.php"); ?>