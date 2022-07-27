@extends('admin.base')
@section('title')
Изменить категорию
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Изменить категорию</h4>
	</div>
</div>
<form action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" method="post" class="uk-form-stacked">
	@csrf
	@method('put')
	<div class="uk-grid-medium" uk-grid>
		<div class="uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="pagetitle" class="uk-form-label">Заголовок</label>
					<input type="text" name="pagetitle" class="uk-input" id="pagetitle" placeholder="Путешествия" value="{{ old('pagetitle') ?? $category->pagetitle }}" required>
					@error('pagetitle')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="alias" class="uk-form-label">Псевдоним</label>
					<input type="text" name="alias" class="uk-input" id="alias" placeholder="travels" value="{{ old('alias') ?? $category->alias }}">
				</div>
					@error('alias')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
			</div>
			<div class="uk-margin">
				<label for="introtext" class="uk-form-label">Описание</label>
				<textarea name="introtext" id="introtext" rows="3" class="uk-textarea" placeholder="Делюсь впечатлениями о красивых местах">{{ old('introtext') ?? $category->introtext }}</textarea>
			</div>
			<div class="uk-margin" uk-margin>
				<div uk-form-custom="target: true" class="uk-width-expand">
					<input type="file" name="image">
					<input class="uk-input" type="text" placeholder="Выберите изображение" disabled>
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="clear"><input type="checkbox" class="uk-checkbox uk-margin-small-right" value="1" name="clear" id="clear">Удалить изображение</label>
				</div>
			</div>
			<div class="uk-margin">
				<a href="{{ route('admin.categories.index') }}" class="uk-button uk-button-default">Назад</a>
				<button class="uk-button uk-button-default">Сохранить</button>
				<a onclick="destroyCategory('{{ $category->id }}', '{{ $category->pagetitle }}');" class="uk-button uk-button-danger">Удалить</a>
			</div>
		</div>
		<div class="uk-width-1-2@m">
			<img src="{{ $category->getFirstOrDefaultMediaUrl('categories') }}" alt="">
		</div>
	</div>
</form>
<form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" id="destroy">
	@csrf
	@method('delete')	
    <input type="hidden" value="1">
</form>
@endsection
@section('js')
<script> 
    function destroyCategory(id, name){
        let confirmDestroy = confirm('Удалить категорию ' + name + '?');
        let destroyForm = document.getElementById('destroy');
        if (confirmDestroy) {
            destroyForm.submit();
        }
    }   
</script>
@endsection