@extends('admin.base')
@section('title')
Редактировать запись
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Редактировать запись</h4>
	</div>
</div>
<form action="{{ route('admin.posts.update', $post->id) }}" method="post" class="uk-form-stacked">
	@csrf
	@method('put')
	<div class="uk-grid-medium" uk-grid>
		<div class="uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="pagetitle" class="uk-form-label">Заголовок</label>
					<input type="text" name="pagetitle" class="uk-input" id="pagetitle" placeholder="Озеро Байкал" value="{{ old('pagetitle') ?? $post->pagetitle }}" required>
					@error('pagetitle')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="category_id" class="uk-form-label">Категория</label>
					<select name="category_id" id="category_id" class="uk-select">
						<option value="" @empty($post->category_id) selected @endempty>Без категории</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}" @if($category->id === $post->category_id) selected @endif>{{ $category->pagetitle }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="introtext" class="uk-form-label">Описание</label>
					<textarea name="introtext" id="introtext" rows="2" class="uk-textarea">{{ old('introtext') ?? $post->introtext }}</textarea>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="tags" class="uk-form-label">Теги</label>
					<input type="text" name="tags" class="uk-input" id="tags" placeholder="озеро, байкал, сибирь" value="{{ old('tags') ?? $post->tagListNormalized}}">
					@error('tags')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label class="uk-form-label">Статус</label>
					<label class="uk-margin-right"><input class="uk-radio" type="radio" name="published" value="1" @if($post->published === true)checked @endif> Опубликована</label>
					<label><input class="uk-radio" type="radio" name="published" value="0" @if($post->published === false)checked @endif> Заблокирована</label>				
				</div>
			</div>
		</div>
		<div class="uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="alias" class="uk-form-label">Псевдоним</label>
					<input type="text" name="alias" class="uk-input" id="alias" placeholder="ozero-baikal" value="{{ old('alias') ?? $post->alias }}">
				</div>
					@error('alias')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="longtitle" class="uk-form-label">Meta Title</label>
					<input type="text" name="longtitle" class="uk-input" id="longtitle" placeholder="Отдых на озеро Байкал" value="{{ old('longtitle') ?? $post->longtitle }}">
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="description" class="uk-form-label">Meta Description</label>
					<textarea name="description" id="description" rows="2" class="uk-textarea">{{ old('description') ?? $post->description }}</textarea>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="published_at" class="uk-form-label">Дата публикации</label>
					<input type="datetime-local" id="published_at" name="published_at" value="{{ $post->published_at->format('Y-m-d H:i') }}" class="uk-input">
				</div>
			</div>
		</div>
		<div class="uk-width-1-1">
			<div class="uk-margin">				
				<a class="uk-button uk-button-default" onclick='javascript:window.open("{{ route('admin.galleries.show', $post->id) }}")' >Галерея</a>						
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<textarea name="content" id="content" rows="10" class="uk-textarea">{{ old('content') ?? $post->content }}</textarea>
				</div>
			</div>	
			<div class="uk-margin">
				<div uk-grid>
					<div class="uk-width-expand@m">
						<a href="{{ route('admin.posts.index') }}" class="uk-button uk-button-primary">Назад</a>
						<button class="uk-button uk-button-default">Сохранить</button>
					</div>
					<div class="uk-width-auto">
						<a onclick="destroyPost('{{ $post->id }}', '{{ $post->pagetitle }}');" class="uk-button uk-button-danger">Удалить</a>
					</div>
				</div>

			</div>		
		</div>
	</div>
</form>
<form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" id="destroy">
	@csrf
	@method('delete')	
    <input type="hidden" value="1">
</form>
@endsection
@section('js')
<link rel="stylesheet" href="/css/codemirror.min.css" />
<script src="/js/codemirror.min.js"></script>
<script src="/js/xml.min.js"></script>
<script src="/js/emmet.min.js"></script>
<script>
	let cm = CodeMirror.fromTextArea(content, {
		mode : 'text/html',
		profile: 'xhtml',
		lineNumbers: true,
		lineWrapping: true
	});

    function destroyPost(id, name){
        let confirmDestroy = confirm('Удалить запись ' + name + '?');
        let destroyForm = document.getElementById('destroy');
        if (confirmDestroy) {
            destroyForm.submit();
        }
    }   	
</script>
@include('admin.posts.notify')
@endsection