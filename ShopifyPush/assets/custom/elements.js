console.log("ELEMENTS ATTACHED")
//Gender

var gender =     `       <div class="form-group row" id="Sub_category"><label class="col-md-3 col-from-label">Gender</label>
<div class="col-md-8">
    <select class="form-control  " name="gender" id="category_id" onchange="SendData()"  required>
      <option value="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="Unisex">Unisex</option> </select>
</div> </div>`;

//Size on Label

var sizeLabel =`   <div class="form-group row">
<label class="col-md-3 col-from-label">Size on Label</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="sizeLabel" onchange="SendData()" placeholder="Size on Label ">
</div>
</div>`;

//Collar

var collar = `  <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Collar</label>
<div class="col-md-8">
    <select class="form-control  " name="collar" id="category_id" onchange="SendData()"  required>
      <option value="">Select Collar</option>
                                            <option value="Polo Collar">Polo Collar</option>
                                             </select>
</div>
</div>`;

//Sleeve Style

var sleeveStyle = `       <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Sleeve Style</label>
<div class="col-md-8">
    <select class="form-control  " name="sleeveStyle" id="category_id" onchange="SendData()" required>
      <option value="">Select Sleeve type</option>
                                            <option value="Half">Half</option>
                                            <option value="Full">Full</option>
                                             </select>
</div>
</div>`;


//Fit Type

var fitType = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Fit Type</label>
<div class="col-md-8">
    <select class="form-control  " name="fitType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Fit Type</option>
                                            <option value="Slim">Slim</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Wide/loose</option">Wide/loose</option> </select>
</div>
</div>`;


//Sleeve Type

var sleeveType = `  <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Sleeve Length</label>
<div class="col-md-8">
    <select class="form-control  " name="sleeveType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Fit Type</option>
                                            <option value="Short Sleeve">Short Sleeve</option>
                                            <option value="Full Sleeves">Full Sleeves</option>
                                            <option value="Wide/loose">Wide/loose</option> </select>
</div>
</div>`;

//Chest (p2p)

var chest = ` <div class="form-group row">
<label class="col-md-3 col-from-label">Chest(P2P)</label>
<div class="col-md-8">
    <input type="number" class="form-control" name="chest" onchange="SendData()" placeholder="Chest(P2P) ">
</div>
</div>`;

// length

var length = `  <div class="form-group row">
<label class="col-md-3 col-from-label">Length</label>
<div class="col-md-8">
    <input type="number" class="form-control" name="length" onchange="SendData()" placeholder="Length">
</div>
</div>`;

// Sleeve Length

var sleeveLength = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Sleeve Length</label>
<div class="col-md-8">
    <select class="form-control  " name="sleeveLength" id="category_id" onchange="SendData()"  required>
      <option value="">Select Fit Type</option>
                                            <option value="Short Sleeve">Short Sleeve</option>
                                            <option value="Full Sleeves">Full Sleeves</option>
                                            <option value="Wide/loose">Wide/loose</option> </select>
</div>
</div>`;

// Neck Style

var neckStyle = `                  <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Neck style</label>
<div class="col-md-8">
    <select class="form-control  " name="neckStyle" id="category_id" onchange="SendData()"  required>
      <option value="">Select Neck style</option>
                                            <option value="Round Neck">Round Neck</option>
                                            <option value="V Neck">V Neck </option>
                                            
                                             </select>
</div>
</div>`;

//Hoodie Type

var hoodieType = `       <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="hoodieType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Type</option>
                                            <option value="Pullover">Pullover</option>
                                            <option value="Zip-Up Hoodies">Zip-Up Hoodies</option>
                                            <option value="Fitted Hoodies">Fitted Hoodies</option>
                                            <option value="Sleeveless Hoodies">Sleeveless Hoodies</option>
                                             </select>
</div>
</div>`;


// Sleeve Size

var sleeveSize = `  <div class="form-group row">     <label class="col-md-3 col-from-label">Sleeve Size</label>
<div class="col-md-8">
    <select class="form-control  " name="sleeveSize" id="category_id" onchange="SendData()"  required>
      <option value="">Select Sleeve Size</option>
                                            <option value="Short Sleeve">Short Sleeve</option>
                                            <option value="Full Sleeve">Full Sleeve</option>
                                            <option value="Sleeveless">Sleeveless</option>
                                             </select>
</div></div>`;

// Jacket Type

var jacketType = `  <div class="form-group row">    <label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="jacketType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Type</option>
                                            <option value="Leather">Leather</option>
                                            <option value="Suit">Suit</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Track">Track</option>
                                            <option value="Long Coat">Long Coat</option>
                                            
                                             </select>
</div> </div>`;


// Waist

var waist = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Waist</label>
<div class="col-md-8">
    <input type="number" class="form-control" name="waist"  onchange="SendData()" placeholder="Waist in Inches ">
</div>
</div>`;

var inseam = `  <div class="form-group row">
<label class="col-md-3 col-from-label">Inseam</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="inseam" onchange="SendData()" placeholder="Inseam ">
</div>
</div>`;

var rise = `<div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Rise</label>
<div class="col-md-8">
    <select class="form-control  " name="rise" id="category_id" onchange="SendData()"  required>
      <option value="">Select Rise</option>
                                            <option value="Low Rise">Low Rise</option>
                                            <option value="Mid Rise Waist">Mid Rise Waist</option>
                                            <option value="High Rise Waist">High Rise Waist</option>
                                            
                                            
                                             </select>
</div>
</div>`;

var jeansFitType = `   <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Fit Type</label>
<div class="col-md-8">
    <select class="form-control  " name="jeansFitType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Fit Type</option>
                                            <option value="Skin Fit">Skin Fit</option>
                                            <option value="Wide Fit">Wide Fit</option>
                                            <option value="Flare">Flare</option>
                                            <option value="Bell Bottoms">Bell Bottoms</option>
                                            
                                            
                                             </select>
</div>
</div>`;

var jeansType = `   <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="jeansType" id="category_id" onchange="SendData()"  required>
      <option value="">Select Type</option>
                                            <option value="Ripped Jeans">Ripped Jeans</option>
                                            <option value="Capri">Capri</option>
                                            <option value="Cullots">Cullots</option>
                                            <option value="Flared Leg Cut">Flared Leg Cut</option>
                                           
                                            
                                             </select>
</div>
</div>`;

//Track Suite neck
var trackNeck = `   <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Neck</label>
<div class="col-md-8">
    <select class="form-control  " name="trackNeck" id="category_id" onchange="SendData()"  required>
      <option value="">Select Neck</option>
                                            <option value="Mock Collars">Mock Collars</option>
                                            <option value="Hoodies">Hoodies</option>
                                            <option value="Round Neck">Round Neck</option>

                                            
                                            
                                             </select>
</div>
</div>`;

//Romper Neck

var romperNeck = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Neck Style</label>
<div class="col-md-8">
    <select class="form-control  " name="romperNeck" id="category_id" onchange="SendData()"  required>
      <option value="">Select Neck Style</option>
                                            <option value="Scoop">Scoop</option>
                                            <option value="One-shoulder">One-shoulder</option>
                                            <option value="V Neck">V Neck</option>
                                            <option value="Square">Square</option> </select>
</div>
</div>`;

// Dress Type

var dressType=`      <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="dressType" id="category_id"  onchange="SendData()" required>
      <option value="">Select Type</option>
                                            <option value="Flowy">Flowy</option>
                                            <option value="Bodycon">Bodycon</option>
                                            <option value="A line">A line</option>
                                             </select>
</div>
</div>`;

//Size(Global)

var Size = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Size</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="Size"  onchange="SendData()" placeholder="Size ">
</div>
</div>`;

//Type(Global)
var Type = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="Type" onchange="SendData()" placeholder="Type ">
</div>
</div>`;


//Width(Global)
var Width = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Size</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="Width" onchange="SendData()" placeholder="Width ">
</div>
</div>`;

//Height(Global)
var Height = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Height</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="Height" onchange="SendData()" placeholder="Height ">
</div>
</div>`;



//Sneaker Type

var sneakerType=`<div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="sneakerType" id="category_id" onchange="SendData()"  required>
      <option value="">Select type</option>
                                            <option value="Slip-on Sneakers">Slip-on Sneakers</option>
                                            <option value="Classic Canvas Converse">Classic Canvas Converse</option>
                                            <option value="Printed Sneakers">Printed Sneakers</option>
                                            <option value="High Top Sneakers">High Top Sneakers</option> </select>
</div>
</div>`

// Color(Global)

var Color = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Color</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="Color" onchange="SendData()" placeholder="Color ">
</div>
</div>`

//Heel Size

var heelSize = `   <div class="form-group row">
<label class="col-md-3 col-from-label">Heel Size</label>
<div class="col-md-8">
    <input type="text" class="form-control" name="heelSize" onchange="SendData()" placeholder="Heel Size ">
</div>
</div>`

//Heel Type

var heelType = `  <div class="col-md-8">
<select class="form-control  " name="heelType" id="category_id" onchange="SendData()"   required>
  <option value="">Select Heel Type</option>
                                        <option value="Block Heels">Block Heels</option>
                                        <option value="kitten Heels">kitten Heels</option>
                                        <option value="pencil Heels">pencil Heels</option>
                                        <option value="Middi Block Heel">Middi Block Heel</option> </select>
</div>`;


//Watch Type

var watchType = ` <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="watchType" id="category_id" onchange="SendData()"  required>
      <option value="">Select type</option>
                                            <option value="Analogue">Analogue</option>
                                            <option value="Digital">Digital</option>
                                            <option value="Smart">Smart</option>
                                            
                                            
                                             </select>
</div>
</div>`;

//HeadPhones Connectivity

var headConnect = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Connectivity</label>
<div class="col-md-8">
    <select class="form-control  " name="headConnect" id="category_id" onchange="SendData()"  required>
      <option value="">Select Connectivity</option>
                                            <option value="Wire">Wire</option>
                                            <option value="Wireless">Wireless</option>
                                            
                                            
                                             </select>
</div>
</div>`;

//HeadPhones Type

var headType = `  <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="headType" id="category_id" onchange="SendData()"  required>
      <option value="">Select type</option>
                                            <option value="In Ear">In Ear</option>
                                            <option value="Over-Ear">Over-Ear</option>
                                            <option value="On-Ear">On-Ear</option>
                                            <option value="Earbuds">Earbuds</option>

                                            
                                            
                                             </select>
</div>
</div>`;

//Tie 

var tiePattern = `<div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Pattern</label>
<div class="col-md-8">
    <select class="form-control  " name="tiePattern" id="category_id" onchange="SendData()"  required>
      <option value="">Select Pattern</option>
                                            <option value="Solid">Solid</option>
                                            <option value="Printed">Printed</option>
                                            <option value="Striped">Striped</option>
                                            
                                            
                                             </select>
</div>
</div>`;


var tietype = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="tietype" id="category_id" onchange="SendData()"  required>
      <option value="">Select type</option>
                                            <option value="Bow">Bow</option>
                                            <option value="Skinny tie">Skinny tie</option>
                                            <option value="Broad Tie">Broad Tie</option>
                                            
                                            
                                             </select>
</div>
</div>`;


var socksType = ` <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Type</label>
<div class="col-md-8">
    <select class="form-control  " name="socksType" id="category_id" onchange="SendData()"  required>
      <option value="">Select type</option>
                                            <option value="Casual">Casual</option>
                                            <option value="Dress">Dress</option>
                                            <option value="Athletic">Athletic</option>
                                            
                                            
                                             </select>
</div>
</div>`;

var socksLength = `    <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Length</label>
<div class="col-md-8">
    <select class="form-control  " name="socksLength" id="category_id" onchange="SendData()"  required>
      <option value="">Select Length</option>
                                            <option value="No Show Socks">No Show Socks</option>
                                            <option value="Ankle Socks">Ankle Socks</option>
                                            <option value="Micro-Crew Socks">Micro-Crew Socks
                                            </option>
                                            <option value="Mid-Calf Socks">Mid-Calf Socks</option>
                                            <option value="Knee High Socks">Knee High Socks
                                            </option>
                                            
                                            
                                             </select>
</div>
</div>`;


var scarfPattern = `            <div class="form-group row" id="Sub_category">
<label class="col-md-3 col-from-label">Pattern</label>
<div class="col-md-8">
    <select class="form-control  " name="scarfPattern" id="category_id" onchange="SendData()"  required>
      <option value="">Select Pattern</option>
                                            <option value="Solid">Solid</option>
                                            <option value="Printed">Printed</option>
                                            <option value="Self-Design">Self-Design</option>
                                            
                                            
                                             </select>
</div>
</div>`


var itemDesc="";
var titleS = "";
var priceS = "";


function SendData(){
  

   var titleI = $("input[name=title]").val();
   var priceI = $("input[name=price]").val();
    var made = $("input[name=made]").val();
    var material = $("input[name=material]").val();
    var cond = $("select[name=condition]").val();
    var brand = $("input[name=brand]").val();
    var sizeLabelI = $("input[name=sizeLabel]").val();
    var collarI = $("select[name=collar]").val();
     var sleeveStyleI = $("select[name=sleeveStyle]").val();
     var fitTypeI = $("select[name=fitType]").val();
      var sleeveLengthI = $("select[name=sleeveLength]").val();
      var chestI = $("input[name=chest]").val();
        var lengthI = $("input[name=length]").val();
        var WidthI = $("input[name=Width]").val();
        var HeightI = $("input[name=Height]").val();
    var neckStyleI = $("select[name=neckStyle]").val();
             var sleeveTypeI = $("select[name=sleeveType]").val();
             var hoodieTypeI = $("select[name=hoodieType]").val();
             var sleeveSizeI = $("select[name=sleeveSize]").val();
             var jacketTypeI = $("select[name=jacketType]").val();
             var waistI = $("input[name=waist]").val();
             var inseamI = $("input[name=inseam]").val();
             var riseI = $("select[name=rise]").val();
             var jeansFitTypeI = $("select[name=jeansFitType]").val();
             var jeansTypeI = $("select[name=jeansType]").val();
             var trackNeckI = $("select[name=trackNeck]").val();
             var romperNeckI = $("select[name=romperNeck]").val();
             var dressTypeI = $("select[name=dressType]").val();
             var SizeI = $("input[name=Size]").val();
             var TypeI = $("input[name=Type]").val();
             var sneakerTypeI = $("select[name=sneakerType]").val();

             var ColorI = $("input[name=Color]").val();

             var heelSizeI = $("input[name=heelSize]").val();

             var heelTypeI = $("select[name=heelType]").val();
             var watchTypeI = $("select[name=watchType]").val();
             var headConnectI = $("select[name=headConnect]").val();

             var headTypeI = $("select[name=headConnect]").val();
            var tiePatternI =$("select[name=tiePattern]").val();

            var tietypeI =$("select[name=tietype]").val();

            var socksTypeI =$("select[name=socksType]").val();
            var socksLengthI =$("select[name=socksLength]").val();

            var scarfPatternI  =$("select[name=scarfPattern]").val();
            
            var sneakerSizeI =  $("input[name=sneakerSize]").val();
            

//FOR SHOPIFY








var div1 =`<div style="background-color:#F6F2F2;border-radius:8px;">`;
var ul1 =`<ul style="columns:2;-webkit-columns:2;-moz-columns:2">`;





    const Shirts = ` ${div1}
    <h2>Item Details</h2>
    <br/>
    ${ul1}
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
    <li><b>Made in: </b>${made}</li>
  
    <li><b>Collar: </b>${collarI}</li>
   
    </ul>     <br/>
 
     <h2>Size <a href='https://www.swag-kicks.com/pages/size-chart'><h4 style="color:red">(View Size Chart)</h4></a></h2>
    <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li> 
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>
    </ul>     <br/>
    <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    
    
    </div>`;
    

    
    
    const TShirts = ` ${div1}
     <h2>Item Details</h2>     <br/>     ${ul1}
       <br/>
    ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Fit type: </b>${fitTypeI}</li>
    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>
    <li><b>Sleeves Style: </b>${sleeveStyleI}</li>
    <li><b>Neck Style: </b>${neckStyleI}</li>
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>
    
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;   

    const Hoodies = `${div1}
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Hoodie Type: </b>${hoodieTypeI}</li>

    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const TrackTops = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${sizeLabelI}</li>   
    <li><b>Length: </b>${lengthI}</li>
    <li><b>Sleeve Size: </b>${sleeveSize}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Polos = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Collar Type: </b>${collarI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Sleeve Type: </b>${sleeveTypeI}</li>
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>
    <li><b>Fit type: </b>${fitTypeI}</li>

    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Jackets = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Jacket Type: </b>${jacketTypeI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Sleeve Size: </b>${sleeveSizeI}</li>
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>


    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Jeans = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Jeans Type: </b>${jeansTypeI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>waist: </b>${waistI}</li>   
    <li><b>Inseam: </b>${inseamI}</li>
    <li><b>Rise: </b>${riseI}</li>
    <li><b>Fit Type: </b>${jeansFitTypeI}</li>


    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;


    const Shorts = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
  


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>waist: </b>${waistI}</li>   
    <li><b>Inseam: </b>${inseamI}</li>
    <li><b>Rise: </b>${riseI}</li>



    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Trousers = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
  


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>waist: </b>${waistI}</li>   
    <li><b>Inseam: </b>${inseamI}</li>
    <li><b>Rise: </b>${riseI}</li>
    <li><b>Fit Type: </b>${jeansFitTypeI}</li>



    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    
    const Tracksuits = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Neck Type: </b>${trackNeckI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Sleeves Size: </b>${sleeveSize}</li>
    <li><b>Fit Type: </b>${fitTypeI}</li>



    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

        
    const Rompers = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Neck Type: </b>${romperNeckI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
     
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Sleeves Style: </b>${sleeveStyleI}</li>
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>



    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Jumpsuits = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Neck Style: </b>${neckStyle}</li>
   <li><b>Sleeves Style: </b>${sleeveStyleI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>



    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Peplums = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Neck Style: </b>${neckStyleI}</li>
   <li><b>Sleeves Style: </b>${sleeveStyleI}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
     ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   




    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Dresses = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Dress Type: </b>${dressTypeI}</li>
   <li><b>Fit Type: </b>${fitTypeI}</li>
   <li><b>Sleeves Style: </b>${sleeveStyleI}</li>

    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size on Label: </b>${sizeLabelI}</li>   
    <li><b>Chest: </b>${chestI}</li>
    <li><b>Length: </b>${lengthI}</li>
    <li><b>Sleeves Length: </b>${sleeveLengthI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Caps = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>


    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${SizeI}</li>   





    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Hats = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Type: </b>${TypeI}</li>

    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Sneakers = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Sneaker Type: </b>${sneakerTypeI}</li>

    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${sneakerSizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;


    const Sandals = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Sneaker Type: </b>${sneakerType}</li>

    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${SizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Khussa = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${SizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Formals = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
    </ul>     <br/>
     <h2>Size</h2>     <br/>
       ${ul1}
    <li><b>Size: </b>${SizeI}</li>   
    <li><b>Heel Size: </b>${heelSizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Heels = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Heel Type: </b>${heelTypeI}</li>
    </ul>     <br/>
     <h2>Size</h2>     <br/>
         ${ul1}
    <li><b>Heel Size: </b>${heelSizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Boots = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Heel Type: </b>${heelTypeI}</li>
    </ul>     <br/>
     <h2>Size</h2>     <br/>
         ${ul1}
    <li><b>Heel Size: </b>${heelSizeI}</li>   
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Watches = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Color: </b>${ColorI}</li>
   <li><b>Watch Type: </b>${watchTypeI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>

    </div>`;

    const Headphones = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Color: </b>${ColorI}</li>
   <li><b>Connectivity: </b>${headConnectI}</li>
   <li><b>Type: </b>${headTypeI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>

    </div>`;

    const Tie = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Type: </b>${tietypeI}</li>
   <li><b>Pattern: </b>${tiePatternI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Socks = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Type: </b>${socksTypeI}</li>
   <li><b>Length: </b>${socksLengthI}</li>
    </ul>     <br/>
 <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Belts = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Size: </b>${SizeI}</li>
    </ul>     <br/>
 <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Handbags = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Size: </b>${SizeI}</li>
   <li><b>Height: </b>${HeightI}</li>
   <li><b>Width: </b>${WidthI}</li>
    </ul>     <br/>
 <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
    </div>`;

    const Mufflers = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Size: </b>${SizeI}</li>
   <li><b>Length: </b>${lengthI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>
/div>`;

    const Gloves = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Size: </b>${SizeI}</li>
    </ul>     <br/>
     <p>Made in ${made} Imported from USA. Not a fake / Not a first copy / Not a replica. 100% Original & Genuine Tops. All are inspected by our team for originality and quality. Easy 7-Day return policy.Please email Contact@swag-kicks.com to initiate return process.</p>

    </div>`;

    const Scarfs = `<div id="detailS">
     <h2>Item Details</h2>     <br/>     ${ul1}
     
    <li><b>Material: </b>${material}</li>
    <li><b>Condition: </b>${cond}</li>
    <li><b>Brand: </b>${brand}</li>
   <li><b>Made in: </b>${made}</li>
   <li><b>Scarf Pattern: </b>${scarfPatternI}</li>
    </ul>     <br/>
    
    </div>`;
    
    
     



    if (subCatValue == "Shirts" ){
        document.getElementById('iDetails').innerHTML = Shirts
        itemDesc = Shirts
    }
   else if(subCatValue == "T-Shirts"){
    document.getElementById('iDetails').innerHTML = TShirts
      itemDesc = TShirts
   }
   else if(subCatValue == "Hoodies"){
    document.getElementById('iDetails').innerHTML = Hoodies
     itemDesc = Hoodies
   }
   else if(subCatValue == "TrackTops"){
    document.getElementById('iDetails').innerHTML = TrackTops
      itemDesc = TrackTops
   }  
   else if(subCatValue == "Polo"){
    document.getElementById('iDetails').innerHTML = Polos
    itemDesc = Polos
   }
   else if(subCatValue == "Jackets"){
    document.getElementById('iDetails').innerHTML = Jackets
      itemDesc = Jackets
    
   }
   else if(subCatValue == "Jeans"){
    document.getElementById('iDetails').innerHTML = Jeans
     itemDesc = Jeans
   }
   else if(subCatValue == "Shorts"){
    document.getElementById('iDetails').innerHTML = Shorts
    itemDesc = Shorts
   }
   else if(subCatValue == "Trouser"){
    document.getElementById('iDetails').innerHTML = Trousers
     itemDesc = Trousers
   }
   else if(subCatValue == "Tracksuit"){
    document.getElementById('iDetails').innerHTML = Tracksuits
     itemDesc = Tracksuits
   }
   else if(subCatValue == "Romper"){
    document.getElementById('iDetails').innerHTML = Rompers
       itemDesc = Rompers
   }
   else if(subCatValue == "Jumpsuit"){
    document.getElementById('iDetails').innerHTML = Jumpsuits
     itemDesc = Jumpsuits
   }
   else if(subCatValue == "Peplum"){
    document.getElementById('iDetails').innerHTML = Peplums
      itemDesc = Peplums
   }
   else if(subCatValue == "Dress"){
    document.getElementById('iDetails').innerHTML = Dresses
      itemDesc = Dresses
   }
   else if(subCatValue == "Cap"){
    document.getElementById('iDetails').innerHTML = Caps
     itemDesc = Caps
   }
   else if(subCatValue == "Hats"){
    document.getElementById('iDetails').innerHTML = Hats
      itemDesc = Hats
   }
   else if(subCatValue == "Sneakers"){
    document.getElementById('iDetails').innerHTML = Sneakers
       itemDesc = Sneakers
   }
   else if(subCatValue == "Sandals"){
    document.getElementById('iDetails').innerHTML = Sandals
      itemDesc = Sandals
   }
   else if(subCatValue == "Khussa"){
    document.getElementById('iDetails').innerHTML = Khussa
     itemDesc = Khussa
   }
   else if(subCatValue == "Formals"){
    document.getElementById('iDetails').innerHTML = Formals
     itemDesc = Formals
   }
   else if(subCatValue == "Heels"){
    document.getElementById('iDetails').innerHTML = Heels
      itemDesc = Heels
   }
   else if(subCatValue == "Boots"){
    document.getElementById('iDetails').innerHTML = Boots
     itemDesc = Boots
   }
   else if(subCatValue == "Watches"){
    document.getElementById('iDetails').innerHTML = Watches
       itemDesc = Watches
   }
   else if(subCatValue == "Headphones"){
    document.getElementById('iDetails').innerHTML = Headphones
      itemDesc = Headphones
   }
   else if(subCatValue == "Tie"){
    document.getElementById('iDetails').innerHTML = Tie
    itemDesc = Tie
   }
   else if(subCatValue == "Socks"){
    document.getElementById('iDetails').innerHTML = Socks
        itemDesc = Socks
   }
   else if(subCatValue == "Belts"){
    document.getElementById('iDetails').innerHTML = Belts
     itemDesc = Belts
   }
   else if(subCatValue == "Handbags"){
    document.getElementById('iDetails').innerHTML = Handbags
    itemDesc = Handbags
   }
   else if(subCatValue == "Mufflers"){
    document.getElementById('iDetails').innerHTML = Mufflers
      itemDesc = Mufflers
   }
   else if(subCatValue == "Gloves"){
    document.getElementById('iDetails').innerHTML = Gloves
       itemDesc = Gloves
   }
   else if(subCatValue == "Scarfs"){
    document.getElementById('iDetails').innerHTML = Scarfs
      itemDesc = Scarfs

   }
   
   
   
 
   
   
    titleS = titleI
  priceS = priceI
  
    

   
}








function ShopifyPush(){
    
      document.getElementById('Sbutton').disabled = true;
      
    var img1 =imageA[0]
     var img2 = imageA[1]
      var img3 = imageA[2]
        var img4 = imageA[3]
          var img5 = imageA[4]

  
 var form = new FormData();
form.append("title", titleS);
form.append("desc", itemDesc);
form.append("price", priceS);
form.append("image1",img1);
form.append("image2", img2);
form.append("image3", img3);
form.append("image4", img4);
form.append("image5", img5);
var settings = {
  "url": "/ShopifyPush/shopify.php",
  "method": "POST",
  "timeout": 0,
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
 
Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: 'Product Added Successfully',
  showConfirmButton: false,
  timer: 1500
})
setTimeout(function(){
   window.location.reload(1);
}, 1000);
});
    
}





function pushData(d1){
  var form = new FormData();
  form.append("Title", d1);
   form.append("Brand", d1);
    form.append("Made", d1);
  
  var settings = {
    "url": "https://developer.thriftops.com/dontdelete/addproduct/Add.php",
    "method": "POST",
    "timeout": 0,
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form
  };
  
  $.ajax(settings).done(function (response) {
    console.log(response);
  });
      
      
        
      

}