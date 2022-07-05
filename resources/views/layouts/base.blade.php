<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>souqmisr99</title>
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" >
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.3.0/nouislider.min.css" integrity="sha512-P+BVVN34FSHX7HEagbLN6J22r8DSpzSZ/lGoWyigJFld+tlu351vchq7LKPy2vorOYtrbdTTrHpf2eOHbRdKbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    @livewireStyles
 
	
</head>
<body>
    <section class="header" >
		<section id="sec-1" class="bg-dark py-1 text-white">
			<div class="container">
			  <div class="row">
				<div class="col-12 col-md-8">
				  <div class="row fs-9" >
					<div class="col-12 col-lg"><i class="fa-solid fa-mobile-screen-button mr-2"></i>021122586931</div>
					<div class="col-12 col-lg"><i class="fa-solid fa-envelope  mr-2"></i> support@construct.com</div>
					<div class="col-12 col-lg"><i class="fa-solid fa-clock  mr-2"></i> Mon-Sat 9:00-19:00</div>
				  </div>
				</div>
				<div class="col-12 col-md-4 d-flex justify-content-md-end">
				  <div class="d-flex ">
					<ul class="d-flex  noDots" >
					
				 @if(Route::has('login'))
                   @auth
				     @if(Auth::user()->utype === 'ADM')
				      <li>
						<select onChange="window.location.href=this.value" >
						  <option title="My Account" disable selected> ({{Auth::user()->name}})</option>
						<option title="Dashboard" value="{{ route('admin.dashboard') }}">Dashboard</option>
						<option title="Categories" value="{{ route('admin.categories') }}">categories</option>
						<option title="Categories" value="{{ route('admin.products') }}">All Products</option>
						<option title="All Coupon" value="{{ route('admin.coupons') }}">All Coupon</option>
						<option title="All Order" value="{{ route('admin.orders') }}">All Orders</option>
						<option  value="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout.form').submit();" >LogOut</option>
					
					 
				     	</select>
						 <form id="logout.form" method="POST" action="{{ route('logout') }}">
						 @csrf
					  </form>
					</li>
						 @elseif(Auth::user()->utype === 'USR')
						<li><select onChange="window.location.href=this.value" >
						<option title="My Account" disable selected> ({{Auth::user()->name}})</option>
						<option title="Dashboard" value="{{ route('user.dashboard') }}">Dashboard</option>
						<option title="My order" value="{{ route('user.orders') }}">My order</option>
						<option  value="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout.form').submit();" >LogOut</option>
					  </optgroup>
				     	</select>
						 <form id="logout.form" method="POST" action="{{ route('logout') }}">
						 @csrf
					  </form>
					</li>
				      @endif
                   @else
				    <li class="menu-item text-white " ><a class="nav-link text-white" title="Register or Login" href="{{route('login')}}">Login</a></li>
				    <li class="menu-item" ><a  class="nav-link text-white" title="Register or Login" href="{{route('register')}}">Register</a></li>
				   @endif
				 @endif

				 </ul>
				</div>
				</div>
			  </div>
			</div>
		  </section>
		<nav class="navbar navbar-expand-lg navbar-light bg-primary">
			<a class="navbar-brand text-white" href="#">souqmisr99</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse " id="navbarNav">
			  <ul class="navbar-nav">
				<li class="nav-item active text-white">
				  <a class="nav-link" href="/" class="text-white">Home </a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="/shop" class="text-white">Shop</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="/cart" class="text-white">Cart</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="/checkout" class="text-white">Checkout</a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link" href="#" class="text-white">Contact Us</a>
				  </li>
-->
			  </ul>

			</div>
		      @livewire('header-search-component')
			  <!--
			  <ul class="nav justify-content-end">
				<li class="nav-item">
				  <a class="nav-link active text-white" href="#">WISHLIST</a>
				</li>
			  </ul>
-->
		  </nav>

	</section>

{{$slot}}

    <footer class="page-footer font-small bg-primary pt-4 text-white">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
      
          <!-- Grid row -->
          <div class="row">
      
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">
      
              <!-- Content -->
              <h5 class="text-uppercase">Footer Content</h5>
              <p>Here you can use rows and columns to organize your footer content.</p>
      
            </div>
            <!-- Grid column -->
      
            <hr class="clearfix w-100 d-md-none pb-3">
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase text-white">MY ACCOUNT</h5>
      
              <ul class="list-unstyled text-light">
                <li>
                  <a href="/shop" class="text-light">Shop</a>
                  
                </li>
                <li>
                  <a href="/cart" class="text-light">Cart</a>
                </li>
                <li>
                  <a href="/checkout" class="text-light">Checkout</a>
                </li>
              
              </ul>
      
            </div>
            <!-- Grid column -->
      
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
      
              <!-- Links -->
              <h5 class="text-uppercase">INFORMATION</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-light">Contact Us</a>
                </li>
                <li>
                  <a href="#!" class="text-light">Site Map</a>
                </li>
                <li>
                  <a href="#!" class="text-light">Specials</a>
                </li>
                <li>
                  <a href="#!" class="text-light">Order List</a>
                </li>
              </ul>
      
            </div>
            <!-- Grid column -->
      
          </div>
          <!-- Grid row -->
      
        </div>
        <!-- Footer Links -->
      
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="#" class="text-light"> bassim ahmed</a>
        </div>
        <!-- Copyright -->
		
      </footer>



    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.3.0/nouislider.min.js" integrity="sha512-beMPGsaAH5DPxTsD4dYkAULAH3hezSP2EpHAwXjfUYYwbSRYorjjXvZRZi7l9P9YMWKwGd+np6LhAdGB7CXTFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.tiny.cloud/1/z7l7kx8q74xotu5k8fisd8qnhh585hwjwwn96rtkoo8gtgbe/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @livewireScripts
	@stack ('scripts')
	<script>
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$(document).ready(function(e){
	      $('.search-panel .dropdown-menu').find('a').click(function(e) {
				e.preventDefault();
				var param = $(this).attr("href").replace("#","");
				var concept = $(this).text();
				$('.search-panel span#search_concept').text(concept);
				$('.input-group #search_param').val(param);
		   	});
	      });
var a = document.getElementByTagName('a').item(0);
$(a).on('keyup', function(evt){
  console.log(evt);
  if(evt.keycode === 13){
    
    alert('search?');
  } 
}); 



</script>
</body>
</html>