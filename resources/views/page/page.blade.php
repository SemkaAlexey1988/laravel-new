@extends('layout', [
  'title'=> 'Product',
  'description'=> 'Product',
  'keywords'=> 'products' 
])

@section('css')

@endsection
@section('js')
@endsection
@section('content')
<div class="page">
  <div class="container">
    <h1>Page</h1>
        <div class="row row-cols-1 row-cols-md-12 mb-12 text-center">
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">{{$page->name}}</h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
        </div>
  </div>
</div>


@endsection