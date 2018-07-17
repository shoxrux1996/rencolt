@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link" id="home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="switchSection('home-tab')">Home</a>
          <a class="nav-link" id="products-tab" data-toggle="pill" href="#products" role="tab" aria-controls="v-pills-products" aria-selected="false" onclick="switchSection('products-tab')">Products</a>
          <a class="nav-link" id="language-tab" role="tab" aria-controls="v-pills-language"
          aria-selected="false" href="{{ route('language.file') }}">Language</a>

        </div>
      </div>
      <div class="col-md-10">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          </div>
          <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="v-pills-products-tab">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                  </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
  <script src="{{asset('js/jquery.cookie.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script>
      function switchSection(id) {
          $.cookie("admin", id, {expires: 7, path: '/admin'});
          $('#'+id).tab('show');
          
      }

      window.onload = function () {
          if (typeof $.cookie("admin") === "undefined") {
              $.cookie("admin", "home-tab", {expires: 7, path: '/admin'});
          }
          var cookie = $.cookie("admin");
          switchSection(cookie);
          $('#example').DataTable();
      }
  </script>
  
@endsection
