

const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;
var express = require('express');
var bodyParser = require('body-parser');
var app = express();
app.use(bodyParser.urlencoded({ extended: false }));
const path = require('path');

var axios = require('axios');




var config = {
  method: 'get',
  url: 'https://swagkicks-store.myshopify.com/admin/api/2022-10/products.json',
  headers: { 
    'X-Shopify-Access-Token': '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'
  }
};

app.use(express.static(__dirname + '/public'));



app.get('/',function(req,res){
  res.sendFile(path.join(__dirname+'/index.html'));
});

app.get('/update/:id',function(req,res){
  res.sendFile(path.join(__dirname+'/update.html'));
});


app.get('/getproducts', function(req, res) {
    
axios(config)
.then(function (response) {
  res.send(response.data);
})
.catch(function (error) {
  console.log(error);
});

});


app.post('/update/:id', function(req, res) {
 let pid =  req.params.id

console.log(req.body.title)
var data = JSON.stringify({
  "product": {
    "id": req.params.id,
    "title": req.body.title,
    "tags": req.body.tags,
    "body_html": req.body.desc,

  //   "variants":{
  //   "price": req.body.price
     
  // }

  }
});

var config = {
  method: 'put',
  url: 'https://swagkicks-store.myshopify.com/admin/api/2022-10/products/'+pid+'.json',
  headers: { 
    'X-Shopify-Access-Token': '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', 
    'Content-Type': 'application/json'
  },
  data : data
};

axios(config)
.then(function (response) {
  console.log("updated")
 res.redirect('/')
})
.catch(function (error) {
  console.log(error);
});


});





app.listen(port)
console.log("Server running on port "+port)