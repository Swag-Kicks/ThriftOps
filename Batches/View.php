<?php
include_once("../include/mysql_connection.php");  


$id=$_REQUEST['var1'];

if(isset($id))
{
    $sql = "SELECT * FROM SKU WHERE Batch_ID='$id'";
    $result = mysqli_query($mysql, $sql);
   
}


?>
 <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<head>
	
	<style>
	::-webkit-scrollbar {
    width: 6px;
}
 
::-webkit-scrollbar-track {
    border-radius: 1em;
    background: #ffffff;
}
::-webkit-scrollbar-thumb {
    border-radius: 3.5em;
    background: #d00000;
}
	    .row {
    padding: 0;
    margin: 0;
         }
		h1, h3 ,h4 {
		font-weight:bold;
		margin:0;
		font-family: system-ui;
		font-size: 14px;
		color: black;
		}
		body.qrbody {
		padding: 10px;
		font-family: "Lucida Console", "Courier New", monospace;
		font-size: 14px;
		display: inline-flex;
		flex-direction: column;
	
		}
		img {
            width: 10em;
        }
		h2{
		    font-family: system-ui;
		    font-size: 14px;
            word-wrap: break-word;
		}
		
        .qr-body{
        display:flex;
        }
       .text-qr {
            margin-top: 35px;
            margin-left: -16px;
        }
		.site{
			font-size: 14px;
		}
		
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js">
	</script>
</head>
<body>
    
    <form action="" method="POST" class="View">
        <div class="row">
	
    <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
        ?>
        <?php
                                      
                                            
        $SKU=$row["SKU"];
    	//vendor
    	$sql3= "SELECT Name FROM Vendor Where Vendor_ID='".$row['Vendor_ID']."'";
    	$result3= mysqli_query($mysql, $sql3);
        $row3 = mysqli_fetch_array($result3);
    	$ven=$row3['Name'];
	
	echo "<div class='col-sm-4'><main class='qr-body'>
    	    <div id='qrcode'>
    	     <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$SKU&choe=UTF-8'/>
    	    </div>
    	    <div class='text-qr'>
    	       
    	        <h1 id='skuval'>$SKU</h1>
    	        <h2>$ven</h2>
    	        <h2>Batch #$id</h2>
		        <h4 class='site' style='margin:0;'>Swag-kicks.com</h4>
		    </div>
		  </main></div>";
	
        ?>
        <?php
        $i++;
        }   
        
        ?>
        <?php
        }
        else{
            echo "No result found";
            }   
        ?></div>
    </form>
</body>
</html>
