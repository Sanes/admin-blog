@extends('admin.base')
@section('title')
Категории
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Категории</h4>
	</div>
	<div class="uk-width-auto">
		<ul class="uk-iconnav">
	        <li class="uk-text-uppercase"><a href="{{ route('admin.categories.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span>Добавить</a></li>
		</ul>              
	</div>
</div>
@if($categories->count() > 0)
<div class="uk-overflow-auto">
	<table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-text-small">
		<thead>
			<tr>
				<th>Заголовок</th>
				<th>Псевдоним</th>
				<th class="uk-text-right">Записи</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="uk-width-expand uk-text-nowrap" colspan="2">
					Без категории
				</td>
				<td class="uk-text-right uk-table-link"><a href="{{ route('admin.posts.index', ['filter[category_id]' => 'null']) }}" class="uk-link-reset">{{ \App\Models\Post::where('category_id', null)->count() }}</a></td>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td class="uk-width-expand uk-text-nowrap uk-table-link">
					<a href="{{ route('admin.categories.edit', $category->id) }}" class="uk-link-reset" uk-tooltip="title:{{ $category->introtext }}; pos:top-left;">{{ $category->pagetitle }}</a>
				</td>
				<td class="uk-text-nowrap">{{ $category->alias }}</td>
				<td class="uk-text-right uk-table-link"><a href="{{ route('admin.posts.index', ['filter[category_id]' => $category->id ?? 'null']) }}" class="uk-link-reset">{{ $category->posts_count }}</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@else
<div class="uk-text-center uk-padding">
    Ничего не найдено.
</div>
@endif
@endsection
@section('js')
@include('admin.categories.notify')
@endsection