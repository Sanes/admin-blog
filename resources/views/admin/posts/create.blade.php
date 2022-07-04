@extends('admin.base')
@section('title')
Добавить запись
@endsection
@section('content')
<div class="uk-grid-small uk-margin" uk-grid>
	<div class="uk-width-expand@m">
	    <h4 class="uk-margin-remove">Добавить запись</h4>
	</div>
</div>
<form action="{{ route('admin.posts.store') }}" method="post" class="uk-form-stacked">
	@csrf
	<div class="uk-grid-medium" uk-grid>
		<div class="uk-width-1-2@m">
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="pagetitle" class="uk-form-label">Заголовок</label>
					<input type="text" name="pagetitle" class="uk-input" id="pagetitle" placeholder="Озеро Байкал" value="{{ old('pagetitle') }}" required>
					@error('pagetitle')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
				</div>
			</div>
			<div class="uk-margin">
				<div class="uk-form-controls">
					<label for="alias" class="uk-form-label">Псевдоним</label>
					<input type="text" name="alias" class="uk-input" id="alias" placeholder="ozero-baikal" value="{{ old('alias') }}">
				</div>
					@error('alias')
					<span class="uk-text-small uk-text-danger">{{ $message }}</span>
					@enderror
			</div>
			<div class="uk-margin">
				<a href="{{ route('admin.posts.index') }}" class="uk-button uk-button-primary">Назад</a>
				<button class="uk-button uk-button-default">Добавить</button>
			</div>
		</div>
	</div>
</form>
@endsection
@section('js')
@endsection