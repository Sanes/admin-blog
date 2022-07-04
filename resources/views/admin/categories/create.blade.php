@extends('admin.base')
@section('title')
Добавить категорию
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Добавить категорию</h4>
	</div>
</div>
<form action="{{ route('admin.categories.store') }}" method="post" class="uk-form-stacked">
	@csrf
	<div class="uk-grid-medium" uk-grid>
		<div class="uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="pagetitle" class="uk-form-label">Заголовок</label>
					<input type="text" name="pagetitle" class="uk-input" id="pagetitle" placeholder="Путешествия" value="{{ old('pagetitle') }}" required>
					@error('pagetitle')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="alias" class="uk-form-label">Псевдоним</label>
					<input type="text" name="alias" class="uk-input" id="alias" placeholder="travels" value="{{ old('alias') }}">
				</div>
					@error('alias')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
			</div>
			<div class="uk-margin">
				<label for="introtext" class="uk-form-label">Описание</label>
				<textarea name="introtext" id="introtext" rows="3" class="uk-textarea" placeholder="Делюсь впечатлениями о красивых местах">{{ old('introtext') }}</textarea>
			</div>
			<div class="uk-margin">
				<button class="uk-button uk-button-default">Добавить</button>
				<a href="{{ route('admin.categories.index') }}" class="uk-button uk-button-primary">Назад</a>
			</div>
		</div>
	</div>
</form>
@endsection
@section('js')
@endsection