
<div class="row">
	<div class="small-12 medium-8 columns"></div>
	<div class="small-12 medium-4 columns">
		<div class="content-block">
			<p class="content-block-title"> #name Details</p>
			<div class="content">
				<div class="row">
					<div class="small-12 columns">
						{!! Form::label('published', 'Published', ['class' => $errors->first('published', 'is-invalid-label')])!!}
						{!! Form::select('published', ['1' => 'Published', '0' => 'Hidden'], null, ['class' => $errors->first('published', 'is-invalid-input')])!!}
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						{!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
						{!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
						{!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="button-block text-right">
	<div class="row">
		<div class="small-12 columns">
			{!! Form::submit($submit, ['class' => 'button success']) !!}
		</div>
	</div>
</div>