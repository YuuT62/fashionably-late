@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
<form  class="header-form" action="/login" method="get">
    @csrf
    <div class="header__button">
        <button class="header__button-submit">
            <a href="/login">login</a>
        </button>
    </div>
</form>
@endsection

@section('content')
<div class="register-form__content">
    <div class="register-form__header">
        <h2>Register</h2>
    </div>
    <form  class="register-form" action="/register" method="post">
        @csrf
        <div class="register-form__name">
            <h3 class="register-form__name-title">お名前</h3>
            <div class="register-form__name-text">
                <input class="register-form__name-input" type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎">
            </div>
            <div class="form__error">
                @error('name')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="register-form__mail">
            <h3 class="register-form__mail-title">メールアドレス</h3>
            <div class="register-form__mail-text">
                <input class="register-form__mail-input" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            </div>
            <div class="form__error">
                @error('email')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="register-form__pass">
            <h3 class=register-form__pass-title>パスワード</h3>
            <div class="register-form__pass-text">
                <input class="register-form__pass-input" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="form__error">
                @error('password')
                <span>※</span>
                {{ $message }}
                @enderror
        </div>

        <div class="register-form__button">
            <button class="register-form__button-submit">登録</button>
        </div>
    </form>
</div>
@endsection