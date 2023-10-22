<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script>

	$(window).load(function() {
		// Animate loader off screen
		$(".loader").fadeOut("slow");;
	});
</script>

<style>
    
    .loader{
    position: fixed;
    top: 0px;
    left: 0px;
    width: 0px;
    height: 5px;
    margin: 0px;
    background: #d00000;
    animation: loader 3s;
    animation-fill-mode: both;
    -webkit-user-select:none;
    z-index: 9999;
}
@keyframes loader{
    0%{
        width: 0%;
    }
    25%{
        width: 22%;
    }
    /*50%{*/
    /*    width: 55%;*/
    /*}*/
    75%{
        width: 83%;
    }
  99%{
        width: 100%;
    100%{
        width: 0%;
    }
    
}
</style>

<div class="loader"></div>