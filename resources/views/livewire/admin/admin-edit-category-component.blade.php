<main style=" min-height: 700px;">
<div>
<h2 class="float-left">Edit category</h2>
<a class="float-right nolink" href="{{route('admin.categories')}}" >All Category</a>
<div>
    <br>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<form style="clear:both; padding:20px;" wire:submit.prevent="updateCategory"> 
  <div class="form-group" >
    <label >Category name</label>
    <input type="text" class="form-control"  placeholder="Enter category name" wire:model="name" wire:keyup="generateslug">
    @error ('name') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Category Slug</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter category slug" wire:model="slug" >
    @error ('slug') <p>{{$message}}<p> @enderror
  </div>
  <div class="form-group">
    <label>Parent Category</label>
    <select class="custom-select my-1 mr-sm-2" wire:model="category_id">
   <option value=""> None</option>
   @foreach($categories as $category)
   <option value="{{$category->id}}"> {{$category->name}}</option>

   @endforeach
</select>
  </div>
  <button type="submit" >Update</button>
</form>




</main>
