<script>   
       var session = localStorage.getItem('lastpage', window.location.href)


if(session !== null && session !== undefined ){
 
window.location.href=session;

}
   </script>