@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
<style type="text/css">
  .custom-images{
    width:250px;
    height:150px; 
    clear:both; 
    display:block; 
    padding:2px; 
    border:1px 
    solid #ddd; 
    margin-bottom:10px;
  }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        @include('navs.horizontal',['active'=>'objects'])
      </div>
      <div class="col-md-10">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="home-tab" href="{{ route('objects.index') }}" role="tab" aria-controls="home" aria-selected="true">Все объекты</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Изменить</a>
          </li>
        </ul>
          <div class="tab-pane active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> Изменить объект</h5>
                <form action="{{ route('objects.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if($errors->edit->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->edit->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                   <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control select2" id="select2-edit" name="categories[]" multiple="multiple">
                      @foreach($categories as $key=> $category)
                        <option value="{{$category->id}}" {{in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''}}>{{$category->name_ru}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-row" style="margin-bottom: 10px; ">

                    <div class="form-group col-md-4">
                       <label for="image">Изображение</label>
                       <input type="file" class="form-control" name="images[]" id="category-edit-img" multiple="multiple">
                    </div>
                    @if(json_decode($product->images) != null)
                      @foreach(json_decode($product->images) as $key => $image)
                        <div class="col-md-4">
                          <img src="{{ asset('storage/'.$image) }}" class="custom-images">
                           <a href="{{ route('object.image.delete', ['id' => $product->id, 'image'=>$key]) }}" onclick="return confirm(\'Хотите Удалить\')" title="Удалить" class="btn btn-sm btn-danger"> <span class="">Удалить</span></a>
                        </div>
                      @endforeach
                   @endif
                  </div>
                  <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
  <script src="{{asset('js/jquery.cookie.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/tinymce.js') }}"></script>
  <script>

      window.onload = function () {
          
           tinymce.init({
              menubar: false,
              selector:'textarea.richTextBox',
              skin: 'voyager',
              min_height: 600,
              resize: 'vertical',
              plugins: 'link, image, code, youtube, giphy, table, textcolor, lists',
              extended_valid_elements : 'input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]',
              file_browser_callback: function(field_name, url, type, win) {
                      if(type =='image'){
                        $('#upload_file').trigger('click');
                      }
                  },
              toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code | removeformat',
              convert_urls: false,
              image_caption: true,
              image_title: true,
              init_instance_callback: function (editor) {
                  if (typeof tinymce_init_callback !== "undefined") {
                      tinymce_init_callback(editor);
                  }
              }
            });

      }

      
  </script>
 
  
@endsection
