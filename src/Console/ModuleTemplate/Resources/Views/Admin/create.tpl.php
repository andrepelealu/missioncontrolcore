@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create#name_spaces
@stop

@section('content')

	<div class="module-header">
		<div class="row align-middle">
			<div class="small-12 columns">
				<p class="module-title">Create#name_spaces</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="small-12 columns">
            {!! Form::open(['route' => 'mc-admin.#strtolower_plural_name.store']) !!}
                @include('#plural_name::Admin.form', ['submit' => 'Create#name_spaces'])
            {!! Form::close() !!}
		</div>
    </div>

@stop
