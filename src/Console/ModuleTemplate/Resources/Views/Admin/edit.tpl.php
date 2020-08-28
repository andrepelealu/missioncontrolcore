@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
   Edit#name_spaces
@stop

@section('content')

	<div class="module-header">
		<div class="row align-middle">
			<div class="small-12 columns">
				<p class="module-title">Edit#name_spaces</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="small-12 columns">
            {!! Form::model($#strtolower_name, ['route' => ['mc-admin.#strtolower_plural_name.update', $#strtolower_name->id], 'method' => 'PUT']) !!}
                @include('#plural_name::Admin.form', ['submit' => 'Save#name_spaces'])
            {!! Form::close() !!}
	    </div>
	</div>

@stop