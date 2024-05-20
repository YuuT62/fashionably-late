@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('button')
@endsection


@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="contact-form" action="/confirm" method="post">
        @csrf
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お名前</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text-name" >
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田">
                </div>
                <div class="contact-form__input--text-name" >
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎">
                </div>
            </div>
        </div>
        <div class="contact-form__error-name">
            <div class="contact-form__error--last-name">
                @error('last_name')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
            <div class="contact-form__error--first-name">
                @error('first_name')
                <span>※</span>
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">性別</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--radio">
                    <div class="contact-form__input--radio-button">
                        <input type="radio" name="gender" value="1" id="male" checked="checked">
                            <label for="male">男性</label>
                    </div>
                    <div class="contact-form__input--radio-button">
                        <input type="radio" name="gender" value="2" id="female">
                            <label for="female">女性</label>
                    </div>
                    <div class="contact-form__input--radio-button">
                        <input type="radio" name="gender" value="3" id="other">
                            <label for="other">その他</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form__error">
                @error('gender')
                <span>※</span>
                {{ $message }}
                @enderror
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">メールアドレス</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text" >
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                </div>
            </div>
        </div>
        <div class="contact-form__error">
            @error('email')
            <span>※</span>
            {{ $message }}
            @enderror
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">電話番号</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text-number" >
                    <input type="text" name="first-number" value="{{ old('first-number') }}" placeholder="080">
                    <span>-</span>
                    <input type="text" name="middle-number" value="{{ old('middle-number') }}" placeholder="1234">
                    <span>-</span>
                    <input type="text" name="last-number" value="{{ old('last-number') }}" placeholder="5678">
                </div>
            </div>
        </div>
        <div class="contact-form__error">
            @if ($errors->has('first-number'))
            <span>※</span>
            {{ $errors->first('first-number') }}
            @elseif ($errors->has('middle-number'))
            <span>※</span>
            {{ $errors->first('middle-number') }}
            @elseif ($errors->has('last-number'))
            <span>※</span>
            {{ $errors->first('last-number') }}
            @endif
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">住所</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text" >
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>
        </div>
        <div class="contact-form__error">
            @error('address')
            <span>※</span>
            {{ $message }}
            @enderror
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">建物名</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text" >
                    <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>
        </div>
        <div class="contact-form__error">
                @error('building')
                <span>※</span>
                {{ $message }}
                @enderror
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせの種類</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--select" >
                    <select name="category_id" value="{{ old('category') }}" >
                        <option value="" selected disabled>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="contact-form__error">
                @error('category_id')
                <span>※</span>
                {{ $message }}
                @enderror
        </div>

        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせ内容</span>
                <span class="contact-form__label--required">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--textarea" >
                    <textarea name="content" placeholder="お問い合わせ内容をご記載ください ">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
        <div class="contact-form__error">
                @error('content')
                <span>※</span>
                {{ $message }}
                @enderror
        </div>

        <div class="contact-form__button">
            <button class="contact-form__button-submit">確認画面</button>
        </div>

    </form>
</div>

@endsection