@extends('auth.base')

@section('title')
<title>Авторизация</title>
@endsection
@section('content')
<h4 class="uk-text-center">Авторизация</h4>
    <form action="{{ route('login') }}" method="POST" class="uk-form-stacked">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label" for="email">Email</label>
            <div class="uk-form-controls uk-width-medium">
                <input class="uk-input" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="uk-text-danger uk-text-small">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="password">Пароль</label>
            <div class="uk-form-controls uk-width-medium">
                <input class="uk-input" id="password" name="password" type="password" value="{{ old('password') }}" required autocomplete="new-password">
                @error('password')
                <span class="uk-text-danger uk-text-small">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-controls">
                <label>
                    <input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                </label>
            </div>
        </div>
        <div class="uk-margin-small">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">
                    Войти
                </button>
            </div>
        </div>
    </form>
@endsection