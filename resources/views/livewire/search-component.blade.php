<main style=" min-height: 1500px;" >
        <div id="cate" >
        <div class="filter">
            <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filters<span class="fa fa-filter pl-1"></span></button>
        </div>
        <div id="mobile-filter">
           
            <div class="border-bottom pb-2 ml-2">
                <h4 id="burgundy">Filters</h4>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">ALL CATEGORIES</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    @foreach ($categories as $category)
                    <div class="form-group">
                        
                        <label ><a class="nolink" href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></label>
                    </div> 
                    @endforeach                            
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">t-shirt</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group">
                        <input type="checkbox" id="UNIQLO">
                        <label for="UNIQLO">UNIQLO</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="Asket">
                        <label for="Asket">Asket</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="Twillory">
                        <label for="Twillory">Twillory</label>
                    </div>                                
                                               
                                                
                </form>
                
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">trousers</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group">
                        <input type="checkbox" id="DRAKE'S">
                        <label for="DRAKE'S">DRAKE'S</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="ARKET">
                        <label for="cookies">ARKET</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="DICKIES">
                        <label for="DICKIES">DICKIES</label>
                    </div>                                
                                                  
                                                
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">shoes</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group">
                        <input type="checkbox" id="Suede Loafers">
                        <label for="Suede Loafers">Suede Loafers </label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="Gucci">
                        <label for="Gucci"> Gucci</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="Magnanni">
                        <label for="Magnanni"  > Magnanni</label>
                    </div>                                
                                             
                                                
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">price</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group">
                       <label>min</label> <input type="number" min="0">
                       <label>max</label><input type="number" min="0">
                       <button class="btn">filter</button>
                    </div>
                                               
                                                                        
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">shoes</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <ul class="list-style ">
                        <li class="list-item"><a class="filter-link active" href="#">s</a></li>
                        <li class="list-item"><a class="filter-link " href="#">M</a></li>
                        <li class="list-item"><a class="filter-link " href="#">l</a></li>
                        <li class="list-item"><a class="filter-link " href="#">xl</a></li>
                    </ul>                        
                                             
                                                
                </form>
            </div>
       
        </div>
    </div>
  <!----allproduct-->

  <div class="small-container">
      <div class="row row-2">
          <h2>all products</h2>
          <select wire:model="sorting">
                <option value="default">default sorting</option>
                <option value="price">sort by price(low to high)</option>
                <option value="price-desc">sort by price(high to low)</option>
                <option value="date">sort by newness </option>
            </select>

      </div>
      @if($products->count()>0)
      <div class="row">
      @foreach ($products as $product)
          <div class="col-4">
            <img src="{{ asset('images') }}/{{$product->image}}" >
           <h4><a href="{{route('product.details',['slug'=>$product->slug])}}" class="filter-link">{{$product->name}}</a></h4>
            <p>${{$product->regular_price}}</p>
             <button class="btn" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">add to card</button>
          </div>
          @endforeach
      </div>
    @else
    <p style="padding-top:30px;">No Products</p>
   @endif
    <div >
        {{$products->links("pagination::bootstrap-4")}}
        <!--
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
-->
    </div>
    </div>

    </main>