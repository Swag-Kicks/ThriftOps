
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<a href="#" id="check">Check</a>

<script>
    $(document).ready(function()
    {
        $(document).on('click', '#check', function(e)
        {
            e.stopImmediatePropagation();

            var xhr = new XMLHttpRequest();
            var url = "https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json";

            // Prepare the request
            xhr.open("POST", url, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("X-Shopify-Access-Token", "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");3

            // Convert the request body to JSON
            var jsonBody = JSON.stringify({
            "order": {
              "line_items": [
                {
                  "variant_id": "41514195747002",
                  "quantity": 1
                },
                {
                  "variant_id": "41121008419002",
                  "quantity": 1
                }
              ],
              "customer": {
                "first_name": "King",
                "last_name": "Faraz"
              },
              "billing_address": {
                "first_name": "King",
                "last_name": "Faraz",
                "address1": "test",
                "phone": "03123456789",
                "city": "karahi",
                "country": "Pakistan"
              },
              "shipping_address": {
                "first_name": "King",
                "last_name": "Faraz",
                "address1": "test",
                "phone": "03123456789",
                "city": "karahi",
                "country": "Pakistan"
              },
              "financial_status": "pending"
            }
          });

            // Send the AJAX request
            xhr.send(jsonBody);

            // Handle the response
            xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                // Process the response data here
                console.log(response);
            }
            };
         });
    });
    
    
    
</script>

// <script>
//     $(document).ready(function(){
//         $(document).on('click', '#check', function(e){
//             e.stopImmediatePropagation();
//             // ajax
            
//             var settings = {
//           "url": "https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json",
//           "method": "POST",
//           "crossDomain": true,
//          "dataType": "jsonp",
//           "timeout": 0,
//           "headers": {
//             "X-Shopify-Access-Token": "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",
//             "Content-Type": "application/json"
//           },
//           "data": JSON.stringify({
//             "order": {
//               "line_items": [
//                 {
//                   "variant_id": "41514195747002",
//                   "quantity": 1
//                 },
//                 {
//                   "variant_id": "41121008419002",
//                   "quantity": 1
//                 }
//               ],
//               "customer": {
//                 "first_name": "King",
//                 "last_name": "Faraz"
//               },
//               "billing_address": {
//                 "first_name": "King",
//                 "last_name": "Faraz",
//                 "address1": "test",
//                 "phone": "03123456789",
//                 "city": "karahi",
//                 "country": "Pakistan"
//               },
//               "shipping_address": {
//                 "first_name": "King",
//                 "last_name": "Faraz",
//                 "address1": "test",
//                 "phone": "03123456789",
//                 "city": "karahi",
//                 "country": "Pakistan"
//               },
//               "financial_status": "pending"
//             }
//           }),
//         };
        
//         $.ajax(settings).done(function (response) {
//           console.log(response);
//         });
        
//         //xhr javascript
//     //     var myHeaders = new Headers();
//     //     myHeaders.append("X-Shopify-Access-Token", "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");
//     //     myHeaders.append("Content-Type", "application/json");
//     //     myHeaders.append("Cookie", "_master_udr=eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaEpJaWxtWkdFNE9ERmtOQzA0WlRaaUxUUmhaV010T0RJNVpTMWxZamhsWWpJMU5HUmhZemNHT2daRlJnPT0iLCJleHAiOiIyMDI1LTA0LTE4VDE4OjM4OjAxLjM5M1oiLCJwdXIiOiJjb29raWUuX21hc3Rlcl91ZHIifX0%3D--8fbfa7be93513c5bab937fa7df9806d427eed213; _secure_admin_session_id=6e43684edc3e79c529a7be8f3163be30; _secure_admin_session_id_csrf=6e43684edc3e79c529a7be8f3163be30");
        
//     //     var raw = JSON.stringify({
//     //       "order": {
//     //         "line_items": [
//     //           {
//     //             "variant_id": "41514195747002",
//     //             "quantity": 1
//     //           },
//     //           {
//     //             "variant_id": "41121008419002",
//     //             "quantity": 1
//     //           }
//     //         ],
//     //         "customer": {
//     //           "first_name": "King",
//     //           "last_name": "Faraz"
//     //         },
//     //         "billing_address": {
//     //           "first_name": "King",
//     //           "last_name": "Faraz",
//     //           "address1": "test",
//     //           "phone": "03123456789",
//     //           "city": "karahi",
//     //           "country": "Pakistan"
//     //         },
//     //         "shipping_address": {
//     //           "first_name": "King",
//     //           "last_name": "Faraz",
//     //           "address1": "test",
//     //           "phone": "03123456789",
//     //           "city": "karahi",
//     //           "country": "Pakistan"
//     //         },
//     //         "financial_status": "pending"
//     //       }
//     //     });
        
//     //     var requestOptions = {
//     //       method: 'POST',
//     //       headers: myHeaders,
//     //       body: raw,
//     //       redirect: 'follow'
//     //     };
        
//     //     fetch("https://www-swag-kicks-com.myshopify.com/admin/api/2023-01/orders.json", requestOptions)
//     //       .then(response => response.text())
//     //       .then(result => console.log(result))
//     //       .catch(error => console.log('error', error));
//     });
// });
    
    
    
// </script>