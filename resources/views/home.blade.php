@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
        @include('navs.horizontal',['active'=>'home'])
    </div>
    <div class="col-md-10">
      <div class="card bg-light">
        
        <div class="card-body">
            <h5 class="card-title">Собщение</h5>
            <table id="message-table" class="table table-bordered realization-theader " cellspacing="0"
                             width="100%">
                          <thead>
                          <tr>
                              <th>
                                Название
                              </th>
                              <th>
                                Телефон
                              </th>
                              <th>
                                Текст
                              </th>
                              <th>
                                
                              </th>
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
  <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

  <script>
    var table;
      window.onload = function () {
           table = $('#message-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('messages.browse') }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}'
                }
            },
            columns: [
                {
                    data: "name"
                },
                {
                    data: "phone"
                },
                {
                    data: "text"
                },
                {
                    orderable:false,
                    data: null, render: function (data, type, full, meta) {
                      var href='{{ route('messages.destroy', null) }}';
                    return '<a href="'+href+'/'+data.id+'" onclick="return confirm(\'Хотите Удалить\')" title="Удалить" class="btn btn-sm btn-danger delete pull-right"> <span class="">Удалить</span></a>';
                    },
                    width: '10%'
                }
            ],
            "language": {!!json_encode(config('datatables.datatable', [])) !!}
        });
      }
  </script>
  
@endsection
