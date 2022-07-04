@extends('admin.base')
@section('title')
Записи
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Записи</h4>
	</div>
	<div class="uk-width-auto">
		<ul class="uk-iconnav">
			<li>
				<a href="#" class="uk-icon-link"  uk-icon="search"></a>
			    <div uk-dropdown="mode: click;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
			</li>
	        <li class="uk-text-uppercase"><a href="{{ route('admin.posts.create') }}"><span class="uk-margin-small-right" uk-icon="icon: plus"></span>Добавить</a></li>
		</ul> 
	</div>
</div>
@if($posts->count() > 0)
<div class="uk-overflow-auto">
	<table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-text-small">
		<thead>
			<tr>
				<th>ID</th>
				<th>Заголовок</th>
				<th>Категория</th>
				<th>Дата</th>
				<th>Статус</th>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td class="uk-table-shrink">{{ $post->id }}</td>
				<td class="uk-width-expand uk-text-nowrap uk-table-link">
					<a href="{{ route('admin.posts.edit', $post->id) }}" class="uk-link-reset">{{ $post->pagetitle }}</a>
				</td>
				<td class="uk-text-nowrap uk-table-link">
					<a href="{{ route('admin.posts.index', ['filter[category_id]' => $post->category->id ?? 'null']) }}" class="uk-link-reset">{{ $post->category->pagetitle ?? 'Без категории' }}</a>
				</td>
				<td class="uk-text-nowrap">{{ $post->published_at->format('d-m-Y H:i')}}</td>
				<td class="uk-text-right">
					@if($post->published === false)
					<span uk-icon="icon: lock; ratio: .85;"></span>
					@elseif($post->published === true && $post->published_at > date(now()))
					<span uk-icon="icon: clock; ratio: .85;"></span>
					@elseif($post->published === true && $post->published_at < date(now()))
					<span uk-icon="icon: check; ratio: .85;"></span>
					@endif
				</td>
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
@include('admin.posts.notify')
@endsection