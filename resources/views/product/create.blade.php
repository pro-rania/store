@extends('dashbord')
@section('body')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Add</h3>
    </div>
    <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
      @method('post')
      @csrf

      <label class="ml-3">Select category</label><br>
      <select class="form-select col-11 ml-4" aria-label="Default select example" name="category_id">
        @foreach ($category as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="name">
        </div>
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">price</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="price">
        </div>
        @error('price')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">description</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="description">
        </div>
        @error('description')
          <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="form-group">
          <label for="exampleInputPassword1">image</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="image">
        </div>
        @error('image')
          <span class="text-danger">{{ $message }}</span>
        @enderror

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
@endsection