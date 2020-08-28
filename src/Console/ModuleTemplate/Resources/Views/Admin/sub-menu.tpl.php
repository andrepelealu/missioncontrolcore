<div class="row align-right">
	<div class="small-12 medium-6 large-3 columns">
		<select id="filter" name="filter">
			<option value=" " {{ request()->is('#strtolower_plural_name') ? 'selected' : '' }}>All #plural_name</option>
			<option value="published"  {{ request()->input('filter') == 'published' ? 'selected' : '' }}>Published #plural_name</option>
			<option value="hidden"  {{ request()->input('filter') == 'hidden' ? 'selected' : '' }}>Hidden #plural_name</option>
			<option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted #plural_name</option>
		</select>
	</div>
</div>