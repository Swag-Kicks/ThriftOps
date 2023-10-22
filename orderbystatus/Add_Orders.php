<?php

 
session_start();
include_once("../include/mysql_connection.php"); 
$cr=$_SESSION['Username'];
// if (isset($_SESSION['id']) && $_SESSION['id'] == true) 
// {
//     $pr="Select * from Users Where Dept_ID=5 AND Username='$cr' OR Dept_ID=3 AND Username='$cr'";
//     $resu2 = mysqli_query($mysql, $pr);
//     $rowq1 =mysqli_fetch_array($resu2);
//     $dept=$rowq1['Dept_ID'];
//     //echo $dept;
//     if($dept=='')
//     {
//         echo '<script>alert("Your Are Not Authorized !");window.location.href="../Dashboard/Home.php";</script>';
//     }   
// }
// else 
// {
//     echo '<script>alert("Login Invalid !");window.location.href="../index.php";</script>';
   
// }


?>
<?php include ("../include/header.php"); ?>
<?php include_once("../include/mysql_connection.php");  ?>
<?php include ("../include/side_admin.php"); ?>
<?php include ("../include/loader.php"); ?>
        <!-- Page body start-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <div class="page-header">
         <div class="row">
            <div class="col-sm-6 p-t-30 p-l-28">
               <h2><b>Create Order</b></h2>
              
               
            </div>
            <div class="col-sm-6">
           
                <a href="Create" name="pick" id="addorder" class="btn btn-primary-light m-l-15 f-right mb-1">Button</a>
            </div>
            
         </div>
      </div>
            <div class="select2-drpdwn">
              <form>
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                              <h4 class="mb-0 col-md-6"><b>Products</b></h4>
                              <div class="col-md-6"><button class="btn btn-primary-light m-l-15 f-right" type="button" id="addorder" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Items</button></div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                       <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://cdn.shopify.com/s/files/1/2344/6005/products/BJ59_NIKE_DART_10_10.5_45.5_29.5_C_8.5_1899_1_1300x.jpg?v=1593500116">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Dart 10</b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               
                                <p class="linehight-1"><b>Eur 44</b></p>
                                <p class="linehight-1"><b>Sku-Sk23222</b></p>
                                <p class="linehight-1"><b>10/10</b></p>
                                <h6 class="product-price">Rs.4002</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://www.tradeinn.com/f/13852/138528890/nike-flex-experience-run-10-running-shoes.jpg">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Runners Flex 2.0 </b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               <div class="modal fade" id="exampleModalCenter15">
                          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="product-box row">
                                  <div class="product-img col-lg-6"><img class="img-fluid" src="../assets/images/ecommerce/01.jpg" alt=""></div>
                                  <div class="product-details col-lg-6 text-start"><a href="product-page.html">
                                      <h4>Nike Dart 10</h4></a>
                                    <div class="product-price">Rs.4002
                                      <del>Rs.6034</del>
                                    </div>
                                    <div class="product-view">
                                      <h6 class="f-w-600">Product Details</h6>
                                      <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                    </div>
                                    <div class="product-size">
                                      <ul>
                                        <li> 
                                          <button class="btn btn-outline-light" type="button">M</button>
                                        </li>
                                        <li> 
                                          <button class="btn btn-outline-light" type="button">L</button>
                                        </li>
                                        <li> 
                                          <button class="btn btn-outline-light" type="button">Xl</button>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="product-qnty">
                                      <h6 class="f-w-600">Quantity</h6>
                                      <fieldset>
                                        <div class="input-group">
                                          <input class="touchspin text-center" type="text" value="5">
                                        </div>
                                      </fieldset>
                                      <div class="addcart-btn"><a class="btn btn-primary me-3" href="cart.html">Add to Cart</a><a class="btn btn-primary" href="product-page.html">View Details</a></div>
                                    </div>
                                  </div>
                                </div>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                                <p class="linehight-1"><b>Eur 42</b></p>
                                <p class="linehight-1"><b>Sku-Sk325123</b></p>
                                <p class="linehight-1"><b>8/10</b></p>
                                <h6 class="product-price">Rs.6002</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="row mb-3">
                          <div class="profile-title">
                            <div class="media"> <img class="img-cstm" alt="" title="" src="https://cdn.shopify.com/s/files/1/2344/6005/products/BJ59_NIKE_DART_10_10.5_45.5_29.5_C_8.5_1899_1_1300x.jpg?v=1593500116">
                              <div class="media-body" style="margin-left:30px;">
                                  <div class="row">
                                       <h5 class="col-md-10 mb-4"><b>Nike Dart 10</b> </h5>
                                        <h5 class="col-md-2 mb-4 ta-right"><button class="btn-close" type="button" aria-label="Close" data-bs-original-title="" title=""></button></h5>
                                      
                                  </div>
                               
                                <p class="linehight-1"><b>Eur 44</b></p>
                                <p class="linehight-1"><b>Sku-Sk23222</b></p>
                                <p class="linehight-1"><b>10/10</b></p>
                                <h6 class="product-price">Rs.4002</h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mt-4">
                            
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Sub Total</label>
                            <div class="col-md-5 f-center" style="text-align: center;">
                                <label class="">4 item(s)</label>
                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">Rs.16008.00</label>
                            </div>
                            <label class="col-md-3 col-from-label">Shipping</label>
                             <div class="col-md-5 text-center">
                               <select class="mx-auto w-50 form-select text-center ">
                                          <option>Adjustment</option>
                                        </select>

                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">0.00</label>
                            </div>
                            <label class="col-md-3 col-from-label">Discount</label>
                             <div class="col-md-5 text-center">
                               <select class="mx-auto w-50 form-select text-center ">
                                          <option>Select</option>
                                        </select>

                            </div>
                            <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">Rs.500</label>
                            </div>
                            <hr>
                             <label class="col-md-3 col-from-label">Total</label>
                             <div class="col-md-5 f-center">
                            </div>
                             <div class="col-md-4 f-right">
                                <label class=" col-from-label f-right">Rs.4002.00</label>
                            </div>
                        </div>

                       
                                            </div>
                </div>    
            
                
               
            </div>

            <div class="col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            <b>Contact Information</b>
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                           <input class="form-control mb-2" type="text" placeholder="Name" >
                           <input class="form-control   mb-2" type="text" placeholder="Number" >
                        <input class="form-control   mb-2" type="text" placeholder="City" >
                        <textarea class="form-control   mb-2" type="text" placeholder="Address"  ></textarea>
                            
                        </div> 
                    
                                            </div>
                </div>
               <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            <b>Note</b>
                        </h5>
                    </div>

                    <div class="card-body">
                        
                        <textarea class="form-control" type="text" placeholder="Write Something"  ></textarea>
                            
                         
                    
                                            </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">
                            <b>Tags</b>
                            <a class="clear">Clear All</a>
                        </h5>
                    </div>

                    <div class="card-body">
                        
                       <div class="input-form1">
                    <ul>
                        <input type="text" placeholder="Add Tags">
                    </ul>
                </div>
                <span class="notetext">Add multiple tags at once by adding <code> , {comma} </code>between text<code>i.e. shirt,pant</code> </span>
                    
                                            </div>
                </div>
              

           

            </div>
             
    </form>
          </div>
          <!-- Container-fluid Ends-->
          <!-- row cycle --><div class="row">
              

</div><!-- row cycle -->
   </div>
   <!--modal batch end-->
        </div>
        <!-- footer start-->
        

<script>
$('form').keypress(function(e) { 
    return e.keyCode != 13;
});
    let inputForm = document.querySelector('.input-form1')
input = document.querySelector('.input-form1 input')
ul = document.querySelector('.input-form1 ul')

input.addEventListener('focus', () => {
    inputForm.querySelector('ul').classList.toggle('focus')
})

inputForm.addEventListener('click', () => {
    input.focus()
    inputForm.querySelector('ul').classList.add('focus')
})

document.addEventListener('click', (e) => {
    if (e.target != input) inputForm.querySelector('ul').classList.remove('focus')
})

let tags = []

const createNewTag = () => {
    ul.querySelectorAll("li").forEach(li => li.remove());
    tags.slice().reverse().forEach(tag => {
        let LI = `<li>${tag} <i class="fa-solid fa-times" onClick="removeTag(this, '${tag}')"></i></li>`
        ul.insertAdjacentHTML('afterbegin', LI)
    })
}

const addTag = (e) => {
    if (e.key == 'Enter' || e.keyCode == 32) {
        let tag = e.target.value.replace(/\s+/g, ' ')
        if (tag.length > 1 && !tags.includes(tag)) {
            tag.split(',').forEach(tag => {
                tags.push(tag)
             
             
                createNewTag()
            })
        }
        e.target.value = ''
    }

    if (e.target.value.length > 0) return
    if (e.key == 'Backspace') {
        tags = [...tags.slice(0, tags.length - 1)];
        ul.querySelectorAll("li").forEach(li => li.remove())
        createNewTag()
    }
       console.log(tags)
}

const removeTag = (elem, tag) => {
    let index = tags.indexOf(tag);
    tags = [...tags.slice(0, index), ...tags.slice(index + 1)];
    elem.parentElement.remove();
}

input.addEventListener('keyup', (e) => addTag(e))

clearAll = document.querySelector('.clear')

clearAll.addEventListener('click', () => {
    tags = []
    createNewTag()
})
</script>
<?php include ("../include/footer.php"); ?>

