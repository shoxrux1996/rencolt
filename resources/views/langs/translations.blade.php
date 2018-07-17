@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link" id="home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="switchSection('home-tab')">Home</a>
          <a class="nav-link" id="products-tab" href="{{ route('home') }}" href="#products" role="tab" aria-controls="v-pills-products" aria-selected="false" onclick="switchSection('products-tab')">Products</a>
          <a class="nav-link active" id="language-tab" href="language" data-toggle="pill" role="tab" aria-controls="v-pills-language"
          aria-selected="false" >Language</a>

        </div>
      </div>
      <div class="col-md-10">
        <div class="tab-content" id="v-pills-tabContent">
          {{-- <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
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
          </div> --}}
          <div class="tab-pane active" id="language" role="tabpanel" aria-labelledby="v-pills-language-tab">
	          <div class="card">
			  	<div class="card-header">
				  <h3 class="card-title">Язык:
					@foreach ($languages as $lang)
						@if ($currentLang == $lang->abbr)
							{{ $lang->native }}
						@endif
					@endforeach
					<small>
						 &nbsp; Сменить на: &nbsp;
						<select name="language_switch" id="language_switch">
							@foreach ($languages as $lang)
							<option value="{{ url('admin'."/language/texts/{$lang->abbr}") }}" {{ $currentLang == $lang->abbr ? 'selected' : ''}}>{{ $lang->name }}</option>
							@endforeach
						</select>
					</small>
				  </h3>
				</div>
			    <div class="card-body">
			    	<br>
					<ul class="nav nav-tabs">
						@foreach ($langFiles as $file)
						<li class="nav-item">
							<a class="nav-link {{ $file['active'] ? 'active' : '' }}" href="{{ $file['url'] }}">{{ $file['name'] }}</a>
						</li>
						@endforeach
					</ul>
					<div class="clearfix"></div>
					<br>
					<section class="lang-inputs">
					@if (!empty($fileArray))
						<form method="post" action="{{ url('admin/language/texts', [$currentLang, $currentFile]) }}" id="lang-form" class="" data-required="Required">
							{{csrf_field()}}
							<div class="form-group row">
								<div class="col align-self-end">
									<button type="submit" class="btn btn-success submit float-right"> Сохранить</button>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-2">
									<h4 class="font-weight-bold">Код</h4>
								</div>
								<div class="col-md-5">
									<h4 class="font-weight-bold"> {{ $browsingLangObj->native}}</h4>
								</div>
								<div class="col-sm-10 col-md-5">
									<h4 class="font-weight-bold">{{ $currentLangObj->native }}</h4>
								</div>
							</div>
							{!! $langfile->displayInputs($fileArray) !!}
							<hr>
							<div class="text-center">
								<button type="submit" class="btn btn-success submit"> Сохранить</button>
							</div>

						</form>
					@else
						<em>"File empty"</em>
					@endif
				</section>
			    </div><!-- /.box-body -->
			  </div><!-- /.box -->

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
      $(document).ready(function($) {
			$("#language_switch").change(function() {
				window.location.href = $(this).val();
			})
		});
  </script>
  
@endsection
