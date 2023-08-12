<?php 
session_start();

date_default_timezone_set("Asia/Karachi");
error_reporting(0); 
$cr=$_SESSION['Username'];

?>
    <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
    <stripe-pricing-table pricing-table-id="prctbl_1Nclh2FnrC3uu1VjhBVTbQdU"
        publishable-key="pk_live_51LAV69FnrC3uu1VjBbCMIAmJ7Wr7LiaiHPUajU366SVp45pm5Vhwds45VVn2CejiJMBw4r3fwHtD3ScGcR7Llk1e00M1jv0qSn">
    </stripe-pricing-table>
        
   