 $(document).ready(function() {
        $.ajax({
          url: "https://backup.thriftops.com/ShopifyPush/api/gip.php",
          type: "POST",
          data: {url: window.location.href},
          success: function(response) {
            console.log(response);
            console.log("WORKINGGG")
          }
        });
      });