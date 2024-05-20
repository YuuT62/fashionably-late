@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
<form  class="header-form" action="/register" method="get">
    @csrf
    <div class="header__button">
        <button class="header__button-submit">
            <a href="/register">register</a>
        </button>
    </div>
</form>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__header">
        <h2>Login</h2>
    </div>
    <form  class="login-form" action="/login" method="post">
        @csrf
        <div class="login-form__mail">
            <h3 class="login-form__mail-title">メールアドレス</h3>
            <div class="login-form__mail-text">
                <input class="login-form__mail-input" type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            </div>
            <div class="form__error">
                @error('email')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="login-form__pass">
            <h3 class=login-form__pass-title>パスワード</h3>
            <div class="login-form__pass-text">
                <input class="login-form__pass-input" type="password" name="password" placeholder="例: coachtech1106">
            </div>
            <div class="form__error">
                @error('password')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
        <div class="login-form__button">
            <button class="login-form__button-submit">ログイン</button>
        </div>
    </form>
</div>
@endsection