<?php

include_once("../include/mysql_connection.php");

if(isset($_POST['id']))
{
    $id=$_POST['id'];

    $sql4="Select * from `addition` Where SKU LIKE '%$id%'";
    $result4 = mysqli_query($mysql, $sql4);
    while($row = mysqli_fetch_array($result4))
    {
        //items sku
        $Title=$row['Title'];
        $SK=$row['SKU'];
        $Image=$row['Image_1'];
        $Cndition=$row['Cndition'];
        $Size=$row['Size'];
        $Price=$row['Price'];
        $Shop=$row['Shopify_ID'];
        
        
        $input="<div class='row mb-3'>
            <div class='profile-title'>
            <div class='media'> <img class='img-cstm' alt='' title='' src='$Image'>
            <div class='media-body' style='margin-left:30px;'>
            <div class='row'>
               <h5 class='col-md-10 mb-4'><b>$Title</b> </h5>
               <h4 class='col-md-2 mb-4 ta-right'><input class='form-check-input' type='checkbox' value='$Shop' name='check[]' /></h4>
                
              
            </div>
            <h6 class='product-price f-right'>Rs.$Price</h6>
            <div class='quantity-control' data-quantity=''>
    <button class='quantity-btn' data-quantity-minus=''><svg viewBox='0 0 409.6 409.6'>
        <g>
          <g>
            <path d='M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z' />
          </g>
        </g>
      </svg></button>
    <input type='number' class='quantity-input' data-quantity-target='' value='0' step='1' min='1' max='50' id='addquantity[]' name='addquantity[]'>
    <button class='quantity-btn' data-quantity-plus=''><svg viewBox='0 0 426.66667 426.66667'>
        <path d='m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0' /></svg>
    </button>
  </div>
                           
            <p class='linehight-1'><b>EUR $Size</b></p>
            <p class='linehight-1'><b>$SK</b></p>
            <p class='linehight-1'><b>$Cndition</b></p>

            
            </div>
            </div>
            </div>
            </div>";
            echo $input;
    }
    // $input.="<li class='text-center'> <a class='f-w-700' href='javascript:void(0)'>See All </a></li>";
    
}
              ?>
              
              
              <script>
    (function () {
  "use strict";
  var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
    return function (arg) {
      if (this.length > 1) {
        this.each(function () {
          var $this = $(this);

          if (!$this.data(ident)) {
            $this.data(ident, func($this, arg));
          }
        });

        return this;
      } else if (this.length === 1) {
        if (!this.data(ident)) {
          this.data(ident, func(this, arg));
        }

        return this.data(ident);
      }
    };
  });
})();

(function () {
  "use strict";
  function Guantity($root) {
    const element = $root;
    const quantity = $root.first("data-quantity");
    const quantity_target = $root.find("[data-quantity-target]");
    const quantity_minus = $root.find("[data-quantity-minus]");
    const quantity_plus = $root.find("[data-quantity-plus]");
    var quantity_ = quantity_target.val();
    $(quantity_minus).click(function () {
      quantity_target.val(--quantity_);
    });
    $(quantity_plus).click(function () {
      quantity_target.val(++quantity_);
    });
  }
  $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
  $("[data-quantity]").Guantity();
})();

</script>