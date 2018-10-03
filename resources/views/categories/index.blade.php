@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        @include('navs.horizontal',['active'=>'category'])
      </div>
      <div class="col-md-10">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Все категории</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Добавить</a>
          </li>
          <li class="nav-item d-none edit-nav">
            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Изменить</a>
          </li>
        </ul>


        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <table id="category-table" class="table table-bordered realization-theader " cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>
                                  Название
                                </th>
                                <th>
                                  Номи
                                </th>
                                <th>
                                  Name
                                </th>
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
                <h5 class="card-title">Добавить категорию</h5>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="name_ru">Название</label>
                    <input type="text" class="form-control" id="name_ru" {{-- aria-describedby="emailHelp" --}} placeholder="Названия"  name="name_ru" value="{{old('name_ru')}}" required>
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                  </div>
                  <div class="form-group">
                    <label for="name_uz">Номи</label>
                    <input type="text" class="form-control" name="name_uz" id="name_uz" placeholder="Nomi" value="{{old('name_uz')}}">
                  </div>
                  <div class="form-group">
                    <label for="name_en">Name</label>
                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Name" value="{{old('name_en')}}">
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" data-name="Slug" value="" data-slug-origin="name_ru">
                  </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                       <label for="image">Изображение</label>
                       <input type="file" class="form-control" name="image" id="category-img">
                    </div>
                    <div class="form-group col-md-2">
                    </div>
                    <div class="form-group col-md-5">
                      <img src="{{ asset('noimage.png') }}" id="category-img-tag" class="" width="99%" />
                    </div>
                    <div class="form-group col-md-1">
                    </div>
                  </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="image">Каталог</label>
                            <input type="file" class="form-control" name="images[]" id="category-img" multiple="multiple">
                        </div>
                        <div class="form-group image-preview col-md-6">
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="text_ru">Cведения</label>
                    <textarea required class="form-control richTextBox" name="text_ru" id="richtext">
                      {{old('text_ru')}}
                    </textarea>
                  </div>

                  <div class="form-group">
                    <label for="text_uz">Маълумот</label>
                    <textarea class="form-control richTextBox" name="text_uz" id="richtext">
                      {{old('text_uz')}}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="text_en">Information</label>
                    <textarea class="form-control richTextBox" name="text_en" id="richtext">
                      {{old('text_en')}}
                    </textarea>
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
  <script type="text/javascript" src="{{ asset('js/slugify.js') }}"></script>
  <script>

      var table;
      window.onload = function () {
            @if($errors->any())
                $('#myTab a[href="#profile"]').tab('show');

            @endif
           @if ($errors->edit->any())
                $('.edit-nav').removeClass('d-none');
                $('.nav-tabs a:last').tab('show');
                var id = parseInt('{{Session::get('id')}}');
                var href='{{route('categories.update', Session::get('id'))}}';
                $(edit).find('form').attr('action',href);
                $('.category-edit-tag').attr('src', '{{old('photo')}}');
            @endif
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
                    url: '{{ route('categories.browse') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                columns: [
                    {
                        data: "name_ru"
                    },
                    {
                        data: "name_uz"
                    },
                    {
                        data: "name_en"
                    },
                    {
                        data: 'image',
                        render: function (data, type, full) {
                          if(full.image != null){
                          var src = '{{ asset('storage/') }}'
                            return '<img src="'+src+'/'+full.image+'" style="width:100px">';
                          }else{
                            return '';
                          }
                        },
                        orderable:false
                    },
                    {
                        orderable:false,
                        data: null, render: function (data, type, full, meta) {
                        var url = '{{ route('categories.edit', null) }}';
                          var href='{{ route('categories.destroy', null) }}';
                        return '<a href="'+url+'/'+data.id+'" title="Изменить" class="btn btn-sm btn-primary edit pull-right"> <span class="">Изменить</span></a>' + '<a href="'+href+'/'+data.id+'" onclick="return confirm(\'Хотите Удалить\')" title="Удалить" class="btn btn-sm btn-danger delete pull-right"> <span class="">Удалить</span></a>';
                        },
                        width: '10%'
                    }
                ],
                "language": {!!json_encode(config('datatables.datatable', [])) !!}
            });
      }


  </script>
  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {


            var reader = new FileReader();

            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#category-img").change(function(){
        readURL(this);
    });
</script>
<script>
    $(function(){
        $('#name_ru').slugIt();
    });
</script>

@endsection
