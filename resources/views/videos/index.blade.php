@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        @include('navs.horizontal',['active'=>'videos'])
      </div>
      <div class="col-md-10">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Видеоролики</a>
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
                                  Видео
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
                <h5 class="card-title">Добавить видео</h5>
                <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="category">Категория</label>
                    <select class="form-control select2" name="categories[]" multiple="multiple">
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name_ru}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                       <label for="image">Видео URL</label>
                       <input type="text" class="form-control" id="category-img" placeholder="https://www.youtube.com">
                    </div>
                    <div class="form-group col-md-2">
                      <input type="hidden" name="video" id="video">
                    </div>
                    <div class="form-group col-md-5">
                      <iframe width="100%" height="300" id="category-img-tag" type="text/html"
                        src="{{ asset('no_video.png') }}" frameborder="0" allowfullscreen>
                      </iframe>
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
          <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> Изменить видео</h5>
                <form action="" method="POST" enctype="multipart/form-data">
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
                    <label for="category">Категория</label>
                    <select class="form-control select2" id="select2-edit" name="categories[]" multiple="multiple">
                      @foreach($categories as $key=> $category)
                        <option value="{{$category->id}}" {{old('categories.'.$key) == $category->id ? 'selected' : ''}}>{{$category->name_ru}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                       <label for="image">Видео URL</label>
                       <input type="text" class="form-control" id="category-edit-img" placeholder="https://www.youtube.com/dcKGN_lTdyM">
                    </div>
                    <div class="form-group col-md-2">
                      <input type="hidden" name="video" id="video2" value="{{old('video')}}">
                    </div>
                    <div class="form-group col-md-5">
                      <iframe width="100%" height="300" id="category-edit-img-tag" type="text/html"
                        src="{{ asset('no_video.png') }}" frameborder="0" allowfullscreen>
                      </iframe>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="text_ru">Cведения</label>
                    <textarea required class="form-control richTextBox" name="text_ru" id="text_ru">
                      {{old('text_ru')}}
                    </textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="text_uz">Маълумот</label>
                    <textarea class="form-control richTextBox " name="text_uz" id="text_uz">
                      {{old('text_uz')}}
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="text_en">Information</label>
                    <textarea class="form-control richTextBox " name="text_en" id="text_en">
                      {{old('text_en')}}
                    </textarea>
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

      var table;
      function editCategory(id){
          var edit = "#edit";
            $('.edit-nav').removeClass('d-none');
            $('.nav-tabs a:last').tab('show');
            var data = table.rows().data()[id];
            var href='{{route('videos.update', null)}}';
            $(edit).find('form').attr('action',href+'/'+data.id);
            $(edit).find('#name_ru').val(data.name_ru);

            $(edit).find('#name_uz').val(data.name_uz);

            $(edit).find('#name_en').val(data.name_en);

            if(data.text_ru != null){
               tinymce.get('text_ru').setContent(data.text_ru);
            }
            if(data.text_uz != null){
              tinymce.get('text_uz').setContent(data.text_uz);
            }
           
            if(data.text_en != null){
              tinymce.get('text_en').setContent(data.text_en);
            }
            if(data.video != null){
              $('#category-edit-img-tag').attr('src', 'https://www.youtube.com/embed/'+data.video);
              $('#video2').val(data.video);
            }
            var array_ids=[];
            for(var i = 0; i<data.categories.length; i++) {
                array_ids.push(data.categories[i].id);
            }
            $(edit).find('#select2-edit').val(array_ids);
            $(edit).find('#select2-edit').trigger('change');
            
      }
      window.onload = function () {


           @if ($errors->edit->any())
                $('.edit-nav').removeClass('d-none');
                $('.nav-tabs a:last').tab('show');
                var id = parseInt('{{Session::get('id')}}');
                var href='{{route('videos.update', Session::get('id'))}}';
                $(edit).find('form').attr('action',href);

                $('#category-edit-img-tag').attr('src', 'https://www.youtube.com/embed/{{old('video')}}');
                $('#video2').val('{{old('video')}}');

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
                    url: '{{ route('videos.browse') }}',
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
                        data: 'video',
                        render: function (data, type, full) {
                          if(full.video != null){
                            return '<iframe src="https://www.youtube.com/embed/'+full.video+'" width="100%" height="150px" frameborder="0" allowfullscreen></iframe>';
                          }else{
                            return '';
                          }
                        },
                        orderable:false,
                        width: '20%'
                    },
                    {
                        orderable:false,
                        data: null, render: function (data, type, full, meta) {
                          var href='{{ route('videos.destroy', null) }}';
                        return '<a onclick="editCategory('+meta.row+')" title="Изменить" class="btn btn-sm btn-primary edit pull-right"> <span class="">Изменить</span></a>' + '<a href="'+href+'/'+data.id+'" onclick="return confirm(\'Хотите Удалить\')" title="Удалить" class="btn btn-sm btn-danger delete pull-right"> <span class="">Удалить</span></a>';
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
      url = input.value;
      var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
      $('#category-img-tag').attr('src', 'https://www.youtube.com/embed/'+videoid[1]);
      $('#video').val(videoid[1]);
    }
    function readURL2(input) {
      url = input.value;
      var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
      $('#video2').val(videoid[1]);
      $('#category-edit-img-tag').attr('src', 'https://www.youtube.com/embed/'+videoid[1]);   
    }

    $("#category-img").change(function(){
        readURL(this);
    });
    $("#category-edit-img").change(function(){
        readURL2(this);
    });
   
</script>
  
@endsection
