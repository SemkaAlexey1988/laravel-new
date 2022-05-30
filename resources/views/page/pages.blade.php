@extends('layout', [
  'title'=> 'List pages',
  'description'=> 'List pages',
  'keywords'=> 'pages' 
])

@section('css')

@endsection
@section('js')
@endsection
@section('content')
<div class="manage-pages">
  <div class="manage-pages__header flex-block">
    <h1 class="flex-block__2-3">List of pages</h1>
    <div class="product-create flex-block__1-3">
      <a href="{{route('pageCreate')}}" class="w-100 btn btn-outline-primary">Add page</a>
    </div>
</div>

  <div class="grid-block pages-list manage-pages__content">
        @if(count($pages) > 0)
        @foreach ($pages as $page)
        <div class="grid-block_columm_1">
          <h2>{{$page->name}}</h2>
          <ul>
            <li><span><strong>Link:</strong></span> {{$page->link}}</li>
            <li><span><strong>Date:</strong></span> {{$page->date}}</li>
            <li><span><strong>Color:</strong></span> {{$page->color}}</li>
            <li><span><strong>Code:</strong></span> {{$page->code}}</li>
          </ul>
        </div>
        <div class="grid-block_columm_2">
        <a href="{{route('pageEdit', $page->id)}}" class="w-100 btn btn-outline-primary">Edit</a>
        </div>
        <div class="grid-block_columm_3">
          <form method="POST" action="{{route('pageDestroy', $page->id)}}" enctype="multipart/form-data" class="crud-form">
            @csrf 
            <div class="hidden">
              <input type="hidden" class="form-control" value="{{$page->id}}" required name="id" />
            </div>
            <button type="submit" class="w-100 btn btn-danger">Delete</button>
          </form>      
        </div>   
          @endforeach
        @endif
       
  </div>
</div>


@endsection