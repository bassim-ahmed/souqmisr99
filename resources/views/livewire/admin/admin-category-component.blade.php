<main style=" min-height: 700px;">
<h2 class="float-left">All categories</h2>
<a class="float-right nolink" href="{{route('admin.addcategory')}}" >Add new Category</a>
<div>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<table >
  <tr>
    <th>Id</th>
    <th>Category Name</th>
    <th>Slug</th>
    <th>Sub Category</th>
    <th>Action</th>
  </tr>
  @foreach ($categories as $category)
  <tr>
    <td>{{$category->id}}</td>
    <td>{{$category->name}}</td>
    <td>{{$category->slug}}</td>
    <td>
   <ul class="list-group" style="list-style:none;">
    @foreach($category->subCategories as $scategory)
    <li >
      {{$scategory->name}}(<a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}">edit</a>)
      (<a  onclick="confirm('Are you sure,You want to Delete this subcategory? ') || event.stopImmediatePropagation()" href="#" wire:click.prevent="deleteSubcategory({{$scategory->id}})">delete</a>)
    </li>
    @endforeach
    
</ul>

    </td>
   
    <td>
 <a href="{{route('admin.editcategory',['category_slug' => $category->slug])}}" class="nolink">Edit</a>
 <a href="#" onclick="confirm('Are you sure,You want to Delete this category? ') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})"class="nolink">delete</a>

    </td>
  </tr>
  
@endforeach

</table>

</div>
<div >
        {{$categories->links("pagination::bootstrap-4")}}

    </div>
</main>
