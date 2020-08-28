@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    #plural_name_spaces
@stop

@section('content')

	<div class="module-header">
		<div class="row align-middle">
			<div class="small-12 large-6 columns">
				<p class="module-title">#plural_name_spaces</p>
			</div>
			<div class="small-12 large-6 columns">
				<ul class="button-list">
					<li>
						<a href="{{ route('mc-admin.#strtolower_plural_name.create') }}" class="button warning">Create#name_spaces</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
	            <div class="table-block-header">
		            @include('#plural_name::Admin.sub-menu')
	            </div>
                <div class="table-block-content">
	                <table class="data-table">
	                    <thead>
	                    <tr>
	                        <th>Name</th>
	                        <th>Status</th>
	                        <th>Last Updated</th>
	                        <th></th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                        @if ($#strtolower_plural_name->count() > 0)
		                        @foreach ($#strtolower_plural_name as $#strtolower_name)
			                        <tr>
			                            <td data-label="Name">
				                            @if($#strtolower_name->trashed())
				                                {{ $#strtolower_name->present()->getName }}
			                                @else
				                                <a href="{{ route('mc-admin.#strtolower_plural_name.edit', $#strtolower_name->id) }}">{{ $#strtolower_name->present()->getName }}</a>
				                            @endif
			                            </td>
			                            <td data-label="Status">{!! $#strtolower_name->present()->getPublishedLabel !!}</td>
				                        <td data-label="Last Updated"><span class="secondary">{{ $#strtolower_name->present()->getUpdatedAt }}</span></td>
			                            <td>
			                                @if($#strtolower_name->trashed())
			                                    <a href="{{ route('mc-admin.#strtolower_plural_name.confirm-restore', $#strtolower_name->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
			                                @else
				                                <a href="{{ route('mc-admin.#strtolower_plural_name.edit', $#strtolower_name->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
				                                <a href="{{ route('mc-admin.#strtolower_plural_name.confirm-delete', $#strtolower_name->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
			                                @endif
			                            </td>
			                        </tr>
		                        @endforeach
	                        @else
		                        <tr class="no-results">
			                        <td colspan="4" class="text-center">There are no {{ $filter }} #strtolower_plural_name_spaces available.</td>
		                        </tr>
	                        @endif
	                    </tbody>
	                </table>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="small-12 text-right columns">
			@include('Admins::Admin.partials.pagination', ['paginator' => $#strtolower_plural_name->appends(request()->except('pages'))])
		</div>
	</div>

@stop