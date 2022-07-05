<section class="slide">
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
				  <div class="carousel-item active">
					<img src="{{ asset('images/main-slider-1-1.jpg') }}" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					  <h5>First slide label</h5>
					  <p>Some representative placeholder content for the first slide.</p>
					</div>
				  </div>
				  <div class="carousel-item">
					<img src="{{ asset('images/main-slider-1-2.jpg') }}" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					  <h5>Second slide label</h5>
					  <p>Some representative placeholder content for the second slide.</p>
					</div>
				  </div>
				  <div class="carousel-item">
					<img src="{{ asset('images/main-slider-1-3.jpg') }}" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					  <h5>Third slide label</h5>
					  <p>Some representative placeholder content for the third slide.</p>
					</div>
				  </div>
				</div>
				<button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</button>
			  </div>

		</section>
      <section class="slide_product">
		  <div class="container mt-4">
			  <div class="row">
				  <div class="col-md-12 text-center text-success">
               <h2>Latest Products </h2>
				  </div>
			  </div>
		  </div>
          <div class="container mt-3"></div>
             <div class="row" style=>
				 <div class="owl-carousel owl-theme">
					@foreach ($products as $product)
					 <div class="item">
						 <div class="card" style="height:800px;">
							 <img src="{{ asset('images') }}/{{$product->image}}" class="card-img-top">
							 <div class="card-body">
							 <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="filter-link">{{$product->name}}</a></h4>
								 <h5>$<span class="text-center">{{$product->regular_price}}</span></h5>
								 <p>{!! $product->short_description !!}</p>
							 </div>
						 </div>
					 </div>
					 @endforeach
					 
				 </div>
			 </div>
	  </section>
	  @if($productsSale->count()>0)
	  <section class="slide_product">
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-12 text-center text-success">
			 <h2>OnSale</h2>
				</div>
			</div>
		</div>
		<div class="container mt-3"></div>
		   <div class="row">
			   <div class="owl-carousel owl-theme">
			   @foreach ( $productsSale as $product)
				   <div class="item">
					   <div class="card"  style="height:800px;">
						   <img src="{{ asset('images') }}/{{$product->image}}" class="card-img-top">
						   <div class="card-body">
						   <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="filter-link">{{$product->name}}</a></h4>
							   <h5>$<span class="text-center"><del>{{$product->regular_price}}<del></span></h5>
							   <h5>$<span class="text-center">{{$product->sale_price}}</span></h5>
							   <p>{!! $product->short_description !!}</p>
							 
						   </div>
					   </div>
				   </div>
				   
				   @endforeach
				
			
			   </div>
		   </div>
	</section>
	@endif
	<!--
	<section class="slide_product">
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-12 text-center text-success">
			 <h2>shoes</h2>
				</div>
			</div>
		</div>
		
		<div class="container mt-3"></div>
		
		   <div class="row">
			   <div class="owl-carousel owl-theme">
				   <div class="item">
					   <div class="card">
						   <img src="{{ asset('images/shoes/1.jpg') }}" class="card-img-top">
						   <div class="card-body">
							   <h3>##########</h3>
							   <h5>$<span class="text-center">23</span></h5>
							   <p>############################################</p>
							   <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						   </div>
					   </div>
				   </div>
				   <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/2.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/3.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/9.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/5.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/6.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/7.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/8.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/9.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
				  <div class="item">
					  <div class="card">
						  <img src="{{ asset('images/shoes/10.jpg') }}" class="card-img-top">
						  <div class="card-body">
							  <h3>##########</h3>
							  <h5>$<span class="text-center">23</span></h5>
							  <p>############################################</p>
							  <button class="btn btn-primary btn-sm bg-secondary">buy now</button>
						  </div>
					  </div>
				  </div>
			   </div>
		   </div>
-->
		   <div id="slider"></div>
	</section>
    