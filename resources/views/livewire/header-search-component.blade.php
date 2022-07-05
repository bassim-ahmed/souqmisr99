	<form class="form-inline center" action="{{url('/search')}}" type="get">
				<div class="container">
					<div class="row">    
					 <div class="col-xs-8 col-xs-offset-2">
					  <div class="input-group">
					   <div class="input-group-btn search-panel">
                       <input type="hidden" name="product_cat" value="{{$product_cat}}" id="product_cate">
                       <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product_cate_id">
					   <!--
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

						  <span id="search_concept">All</span> <span class="caret"></span>
						</button>
						<ul class="dropdown-menu scrollable-dropdown" role="menu">
                            @foreach ($categories as $category)
                            <li><a href="#">{{$category->name}}</a></li>
                            @endforeach
						
						</ul>
					   </div>
-->
					   <input type="text" class="form-control" name="search"  placeholder="Search" value="{{$search}}">
					   <span class="input-group-btn">
						   <button class="btn btn-default" type="submit">
						     search
						   </button>
					   </span>
					  </div>
					 </div>
					</div>
				  </div>
			  </form>
