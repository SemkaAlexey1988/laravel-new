@extends('layout', [
  'title'=> 'Add page',
  'description'=> 'Add page',
  'keywords'=> 'pages' 
])

@section('css')

@endsection
@section('js')
@endsection
@section('content')
<div class="add-product">
  <div class="container">
    <h1>Page add</h1>
        <div class="row row-cols-1 row-cols-md-12 mb-12 text-center">
        <div class="col">
          <div class="card mb-4 rounded-3 shadow-sm">

          <form method="POST" action="{{route('pageAddData')}}" enctype="multipart/form-data" class="crud-form">
              @csrf 
                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" placeholder="{{ __('Name') }}" required name="name" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Link</label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" placeholder="{{ __('Link') }}" name="link" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Date</label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" placeholder="{{ __('Date') }}" name="date" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Color</label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" placeholder="{{ __('Color') }}" name="color" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Code</label>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" class="form-control" placeholder="{{ __('Code') }}" name="code" />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
          </form>
          </div>
        </div>
        </div>
  </div>
</div>


@endsection