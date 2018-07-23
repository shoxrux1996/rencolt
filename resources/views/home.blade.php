@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        @include('navs.horizontal',['active'=>'home'])
      </div>
      <div class="col-md-10">
      </div>
    </div>
</div>
@endsection
@section('scripts')
  <script src="{{asset('js/jquery.cookie.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
              toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code',
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
