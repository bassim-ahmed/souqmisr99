<main style=" min-height: 700px;">
<h2 class="float-left">All Products</h2>
<a class="float-right nolink" href="{{route('admin.addproduct')}}" >Add new Product</a>
<div>
@if(Session::has('message'))
         <div>
            {{Session::get('message')}}
         </div>
          @endif
<table >
  <tr>
    <th>Id</th>
    <th>Image</th>
    <th>Name</th>
    <th>size</th>
    <th>Stock</th>
    <th>Price</th>
    <th>Sale_price  </th>
    <th>Category</th>
    <th>Date</th>
    <th>Action</th>
  </tr>
  @foreach ($products as $product)
  <tr>
    <td>{{$product->id}}</td>
    <td> <img src="{{ asset('images') }}/{{$product->image}}"  width="60"></td>
    <td>{{$product->name}}</td>
    <td>{{$product->size}}</td>
    <td>{{$product->stock_status}}</td>
    <td>{{$product->regular_price}}</td>
    <td>{{$product->sale_price}}</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->created_at}}</td>

    <td>
    <a href="{{route('admin.editproduct',['product_slug' => $product->slug])}}" class="nolink">Edit</a>
    <a href="#"onclick="confirm('Are you sure,You want to Delete this product? ') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})"class="nolink">delete</a>

    </td>
  </tr>
@endforeach
</table>
</div>
<div >
        {{$products->links("pagination::bootstrap-4")}}

    </div>
</main>