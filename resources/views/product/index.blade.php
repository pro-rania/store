@extends('dashbord')
@section('body')
<a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> Table Products</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="search" class="form-control float-right" placeholder="Search">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body table-responsive p-0">
          <div id="result">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>name product</th>
                <th>name category</th>
                <th>price</th>
                <th>description</th>
                <th>image</th>
                <th>edit</th>
                <th>delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $index=>$product)
              <tr>
                <td>{{ $index }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('images/'.$product->image) }}" width="100"></td>
                <td><a href="{{ route('product.edit',['id'=>$product->id]) }}" class="btn btn-success">edit</a></td>
                <form action="{{ route('product.remove',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                  @method('delete')
                  @csrf
                  <td><button class="btn btn-danger">delete</button></td>
                </form>
              </tr>
              @endforeach
              {{ $products->links() }}
            </tbody>          
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection