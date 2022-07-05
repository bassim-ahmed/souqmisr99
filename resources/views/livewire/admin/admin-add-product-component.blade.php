<main style=" min-height: 700px;">
<div>
<h2 class="float-left">add new Product</h2>
<a class="float-right nolink" href="{{route('admin.products')}}" >All Products</a>
<div>
    <br>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<form style="clear:both; padding:20px;"  wire:submit.prevent="addProduct"> 
  <div class="form-group" >
    <label >Product name</label>
    <input type="text" class="form-control"  placeholder="Enter product name" wire:model="name" wire:keyup="generateSlug">
    @error ('name') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>product Slug</label>
    <input type="text" class="form-control"  placeholder="Enter product slug"  wire:model="slug" >
    @error ('slug') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Short Description</label>
    <div wire:ignore>
    <textarea class="form-control" placeholder="Enter Short Description"  wire:model="short_description" id="short_description"> </textarea>
    @error ('short_description') <p>{{$message}}<p> @enderror
</div>
  </div>
  <div class="form-group">
    <label> Description</label>
    <div wire:ignore>
    <textarea class="form-control" placeholder="Enter  Description"  wire:model="description" id="description"> </textarea>
    @error ('description') <p>{{$message}}<p> @enderror
</div>
  </div>
  <div class="form-group">
    <label>Regular Price</label>
    <input type="text" class="form-control"  placeholder="Enter Regular Price"  wire:model="regular_price" >
    @error ('regular_price') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Sale Price</label>
    <input type="text" class="form-control"  placeholder="Enter sale Price"  wire:model="sale_price" >
    @error ('sale_price') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>SKU</label>
    <input type="text" class="form-control"  placeholder="SKU"   wire:model="SKU">
    @error ('SKU') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Stock</label>
    <select class="form-control"  wire:model="stock_status" >
     <option value="In Stock">In Stock</option>
     <option value="Out Of Stock">Out of Stock</option>
    </select>
    @error ('stock_status') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>size</label>
    <input type="text" class="form-control "  wire:model="size" placeholder="s,m,l,xl" > 
    @error ('size') <p>{{$message}}<p> @enderror
    
  </div>
  <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control"  placeholder="Quantity" min="1"  wire:model="quantity" >
    @error ('quantity') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Product Image</label>
    <input type="file" class="form-control-file"  wire:model="image" >
    @if($image)
    <img src="{{$image->temporaryUrl()}}" width="120">
    @endif
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control"  wire:model="category_id" wire:change="changeSubcategory">
      
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
     
    </select>
    @error ('category_id') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Subcategory</label>
    <select class="form-control"  wire:model="scategory_id">
    <option value="0"> select Category</option>
        @foreach ($scategories as $scategory)
        <option value="{{$scategory->id}}">{{$scategory->name}}</option>
        @endforeach
     
    </select>
    @error ('scategory_id') <p>{{$message}}<p> @enderror
  </div>
  <button type="submit" >Submit</button>
</form>




</main> 
@push ('scripts')
<script>
   $(function(){
         tinymce.init({
           selector:'#short_description',
           setup:function(editor){
            editor.on('change',function(e){
            tinyMCE.triggerSave();
            var sd_data=$('#short_description').val();
            @this.set('short_description',sd_data);

            })
           }
          
         });
         tinymce.init({
           selector:'#description',
           setup:function(editor){
            editor.on('change',function(e){
            tinyMCE.triggerSave();
            var d_data=$('#description').val();
            @this.set('description',d_data);

            });
           }
          
         });
   });
</script>
@endpush