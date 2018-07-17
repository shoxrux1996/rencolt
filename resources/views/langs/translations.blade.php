@extends('layouts.layout')

@section('content')
<section class="content-header">
	  <ol class="breadcrumb">
	    
	    <li class="active">Edit Texts</li>
	  </ol>
	</section>
<!-- Default box -->
  <div class="box">
  	<div class="box-header with-border">
	  <h3 class="box-title">Language:
		@foreach ($languages as $lang)
			@if ($currentLang == $lang->abbr)
				{{ $lang->name }}
			@endif
		@endforeach
		<small>
			 &nbsp; Switch to: &nbsp;
			<select name="language_switch" id="language_switch">
				@foreach ($languages as $lang)
				<option value="{{ url('admin'."/language/texts/{$lang->abbr}") }}" {{ $currentLang == $lang->abbr ? 'selected' : ''}}>{{ $lang->name }}</option>
				@endforeach
			</select>
		</small>
	  </h3>
	</div>
    <div class="box-body">
    	<br>
		<ul class="nav nav-tabs">
			@foreach ($langFiles as $file)
			<li class="{{ $file['active'] ? 'active' : '' }}">
				<a href="{{ $file['url'] }}">{{ $file['name'] }}</a>
			</li>
			@endforeach
		</ul>
		<div class="clearfix"></div>
		<br>
		<section class="lang-inputs">
		@if (!empty($fileArray))
			<form method="post" action="{{ url('admin/language/texts', [$currentLang, $currentFile]) }}" id="lang-form" class="form-horizontal" data-required="Required">
				{{csrf_field()}}
				<button type="submit" class="btn btn-success submit pull-right hidden-xs hidden-sm" style="margin-top: -60px;"> Save</button>
				<div class="form-group hidden-sm hidden-xs">
					<div class="col-sm-2 text-right">
						<h4>Key</h4>
					</div>
					<div class="hidden-sm hidden-xs col-md-5">
						<h4>{{ $browsingLangObj->name}}</h4>
					</div>
					<div class="col-sm-10 col-md-5">
						<h4>{{ $currentLangObj->name }}</h4>
					</div>
				</div>
				{!! $langfile->displayInputs($fileArray) !!}
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-success submit"> Save</button>
				</div>

			</form>
		@else
			<em>"File empty"</em>
		@endif
	</section>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
@endsection

@section('scripts')
	<script>
		$(document).ready(function($) {
			$("#language_switch").change(function() {
				window.location.href = $(this).val();
			})
		});
	</script>
@endsection
