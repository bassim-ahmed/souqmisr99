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
                    <div class="form-group {{count($category->subCategories) > 0 ? 'has-child-cate' : ''}}">
                        
                        <label ><a class="nolink" href="{{route('product.category',['category_slug'=>$category->slug])}}">{{$category->name}}</a></label>
                        @if(count($category->subCategories) > 0)
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >+</a>
                            <ul class="list-group list-group-flush collapse"  id="collapseExample" >
                                @foreach($category->subCategories as $scategory)
                             <li class="category-item list-group-item"> <a href="{{route('product.category',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}" class="no-link"><small>{{$scategory->name }}</small>  </a>       </li>
                                @endforeach
                            </ul>
                        
                        @endif
                    </div> 
                    @endforeach                            
                </form>
            </div>
            <!--
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
-->
<div class="py-2 border-bottom ml-3 mb-5">
                <h6 class="font-weight-bold">price <span>${{$min_price}}-${{$max_price}}</span></h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <div id="slider" wire:ignore></div>
            </div>>
            <!--
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
-->
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
    @push('scripts')
<script>
var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [1, 1000],
    connect: true,
    range: {
        'min': 1,
        'max': 1000
    },
    pips:{
        mode:'steps',
        stepped:true,
        density:4
    }

});
    slider.noUiSlider.on('update',function(value){
      @this.set('min_price',value[0]);
      @this.set('max_price',value[1]);
    })




    </script>


@endpush