<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Sami Hajjaj</title>
	<link rel="shortcut icon" type="image/png" href="/images/sh.png"/>
	<link rel="stylesheet" type="text/css" href="/css/tailwind.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdn.rawgit.com/resir014/Clear-Sans-Webfont/v1.1.1/css/clear-sans.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="/js/sweetalert.min.js"></script>
	{{-- <script src="/js/summernote-ext-addclass.js"></script> --}}
	<style type="text/css">
		body{
	        font-family: "Clear Sans", "Helvetica Neue","sans-serif";
	        -moz-osx-font-smoothing: grayscale;
	        -webkit-font-smoothing: antialiased;
	        text-rendering: optimizeLegibility;
	    }
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		  -webkit-appearance: none; 
		  margin: 0; 
		}
		select {
		  -webkit-appearance: none !important;
		}
	</style>
	<style>
	.dropbtn {
/*	    background-color: #4CAF50;
*/	    color: black;
	    padding: 16px;
	    font-size: 16px;
	    border: none;
	    font-weight: bold;
	}

	.left-nav{
		top:74px;
		max-width: 200px;
	}

	.ml-250{
		margin-left: 250px;
	}

	@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	  .ml-250{
	  	margin-left: 5px;
	  }
	}

	.dropdown {
	    position: relative;
	    display: inline-block;
	}

	.dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f1f1f1;
	    min-width: 160px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	}

	.dropdown-content a {
	    color: black;
	    padding: 12px 16px;
	    text-decoration: none;
	    display: block;
	}

	a{
		text-decoration: none;
		color:inherit;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}
	button:focus {outline:0;}

	#app {
	  border: 2px solid;
	  border-color: grey;
	  padding: 20px;
	  width: 600px;
	  height: auto;
	  background: #fff;
	  border-radius: 4px;
	  /*box-shadow: 0 40px 50px rgba(0, 0, 0, 0.25);*/
	  outline: none;
	  font-size: 1em;
	}
	#app input {
	  outline: none;
	  width: auto;
	  border: 0;
	  float: left;
	  padding: 8px;
	  background: none;
	}
	#app::before {
	  content: '';
	  display: table;
	}
	#app::after {
	  content: '';
	  display: table;
	  clear: both;
	}

	.tag {
	  border-radius: 50px;
	  background: #f8ed62;
	  float: left;
	  margin: 3px;
	  padding: 4px;
	  font-size: 1em;
	  vertical-align: middle;
/*	  box-shadow: 0px 1px 4px #c6c6c6, 0px 2px 17px #d1d1d1;
*/	}
	.tag a {
	  color: #000;
	  padding-right: 10px;
	  padding-left: 5px;
	  padding-top: 5px;
	  padding-bottom: 5px;
	  margin-right: 5px;
	}
	.tag span {
	  padding-right: 10px;
	  padding-left: 0px;
	  padding-top: 5px;
	  padding-bottom: 5px;
	}

	.bg-blue-custom-dark{
		background: #F6FAFD;
	}

	.bg-blue-custom-light{
		background: #FAFBFE;
	}

	.this-black{
		color: #47495A;
	}

	.this-white{
		color: #FBFBFB;
	}
	.blur {
		-webkit-filter: blur(3px);
		-moz-filter: blur(3px);
		-o-filter: blur(3px);
		-ms-filter: blur(3px);
		filter: blur(3px);
	}

/*	.dropdown:hover .dropbtn {background-color: #3e8e41;}
*/	</style>
	{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		$( ".datepick" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	} );
	</script> --}}
	@yield('head')
</head>
<body>
@yield('content')
@yield('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(".dropbtn").click(function(){
		$(this).next().find('a')[0].click();
	});
	// $(window).bind('beforeunload', function(){
	//   return 'Are you sure you want to leave?';
	// });
	// function confirmExit(){
	// 	swal("Are you sure you want to leave this page?", {
	// 	  buttons: ["No", "Yes"],
	// 	});
	// }
	// $(document).ready(function(){
	  // var $input = $("#app input"),
	  //     $appendHere = $(".tagHere"),
	  //     oldKey = 0, newKey,
	  //     TABKEY = 9;
	  // $input.focus();
	  
	  // $input.keydown(function(e){
	  
	  //   if(e.keyCode == "13") {
	  //     if(e.preventDefault) {
	  //       e.preventDefault();
	  //       if($(this).val() == '' || $(this).val() == ' ') {
	  //         return false;
	  //       }
	  //       addTag($(this));
	  //     }
	  //     return false;
	  //   }
	    
	    // if($(thiss).val() == '' && e.keyCode === 8) {
	    //   $(".tag:last-child").remove();
	    // }
	    
	  // })
	  
	  // function addTag(element) {
	  //   var $tag = $("<div />"), $a = $("<a href='#' />"), $span = $("<span />");
	  //   $tag.addClass('tag');
	  //   $('<i class="fa fa-times" aria-hidden="true"></i>').appendTo($a);
	  //   $span.text(element);
	  //   $a.bind('click', function(){
	  //     $(this).parent().remove();
	  //     $(this).unbind('click');
	  //   });
	  //   $a.appendTo($tag);
	  //   $span.appendTo($tag);
	  //   $tag.appendTo($appendHere);
	  //   $("#app input").val('');
	  // }
	//});
</script>
</body>
</html>