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
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Все объекты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Добавить</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="category-table" class="table table-bordered realization-theader " cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>
                                  Изображение
                                </th>
                                <th>
                                </th>
                            </tr>
                          </thead>
            </table>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Добавить объект</h5>
                <form action="{{ route('objects.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <div class="form-group">
                    <label for="category">Категория</label>
                    <select class="form-control select2" name="categories[]" multiple="multiple">
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_ru}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                       <label for="image">Изображение</label>
                       <input type="file" class="form-control" name="images[]" id="category-img" multiple="multiple">
                    </div>
                    <div class="form-group image-preview col-md-6">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Сохранить</button>
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

      var table;
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
        table = $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('objects.browse') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            },
            columns: [
                {
                    data: 'images',
                    render: function (data, type, full) {
                      var src = '{{ asset('storage/') }}'
                      if(full.images != null){
                        var images = full.images.slice(0, 4);
                        var sum = '';
                       for (var i = 0; i< images.length; i++){
                          sum = sum + '<img src="'+src+'/'+images[i]+'" style="width:50px">'
                       }
                       return sum;
                      }else{
                        return '';
                      }
                    },
                    orderable:false
                },
                {
                    orderable:false,
                    data: null, render: function (data, type, full, meta) {
                      var url = '{{ route('objects.edit', null) }}';
                      var href='{{ route('objects.destroy', null) }}';
                    return '<a href="'+url+'/'+data.id+'" title="Изменить" class="btn btn-sm btn-primary edit pull-right"> <span class="">Изменить</span></a>' + '<a href="'+href+'/'+data.id+'" onclick="return confirm(\'Хотите Удалить\')" title="Удалить" class="btn btn-sm btn-danger delete pull-right"> <span class="">Удалить</span></a>';
                    },
                    width: '10%'
                }
            ],
            "language": {!!json_encode(config('datatables.datatable', [])) !!}
        });
      }

      
  </script>
 
  
@endsection
