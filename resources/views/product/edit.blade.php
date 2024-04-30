@extends('dashbord')
@section('body')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Edit</h3>
    </div>
    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf

      <label class="ml-3">Select category</label><br>
      <select class="form-select col-11 ml-4" aria-label="Default select example" name="category_id">
        @foreach ($category as $item)
          <option value="{{ $item->id }}" @if ($item->id==$product->category_id) selected="selected" @endif>{{ $item->name }}</option>
        @endforeach
      </select>

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $product->name }}">
        </div>
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">price</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{ $product->price }}">
        </div>
        @error('price')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{ $product->description }}">
        </div>
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">image</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="image" value="{{ $product->image }}">
        </div>
        @error('image')
          <span class="text-danger">{{ $message }}</span>
        @enderror

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
    </form>
  </div>
@endsection