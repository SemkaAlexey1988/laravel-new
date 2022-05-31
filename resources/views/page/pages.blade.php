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
      @if(count($pages) > 0)
      <div class="pages-table_wrap">
        <div class="pages-table">
          <div class="grid-block pages-list_head manage-pages__content">
            <div class="grid-block_columm_1">Name</div>
            <div class="grid-block_columm_2">Link</div>
            <div class="grid-block_columm_3">Index date</div>
            <div class="grid-block_columm_4">Color</div>
            <div class="grid-block_columm_5">Code</div>
            <div class="grid-block_columm_6"></div>
            <div class="grid-block_columm_7"></div>
          </div>
          <div class="grid-block pages-list manage-pages__content">
            @foreach ($pages as $page)
            <div class="grid-block_columm_1">{{$page->name}}</div>
            <div class="grid-block_columm_2">{{$page->link}}</div>
            <div class="grid-block_columm_3">{{$page->date}}</div>
            <div class="grid-block_columm_4">{{$page->color}}</div>
            <div class="grid-block_columm_5">{{$page->code}}</div>
            <div class="grid-block_columm_6">
            <a href="{{route('pageEdit', $page->id)}}" class="w-100 btn btn-outline-primary">Edit</a>
            </div>
            <div class="grid-block_columm_7">
              <form method="POST" action="{{route('pageDestroy', $page->id)}}" enctype="multipart/form-data" class="crud-form">
                @csrf 
                <div class="hidden">
                  <input type="hidden" class="form-control" value="{{$page->id}}" required name="id" />
                </div>
                <button type="submit" class="w-100 btn btn-danger">Delete</button>
              </form>      
            </div>   
              @endforeach   
          </div>
        </div>  
      </div>  
      @endif 
</div>


@endsection