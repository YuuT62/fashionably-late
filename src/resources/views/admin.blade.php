@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<form  class="header-form" action="/logout" method="post">
    @csrf
    <div class="header__button">
        <button class="header__button-submit">
            <a href="">logout</a>
        </button>
    </div>
</form>
@endsection


@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
        <div class="admin__search">
            <form class="admin-form__search" action="/search" method="get">
                @csrf
                <div class="admin__search-box">
                    <input type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                </div>
                <div class="admin__search-gender">
                    <select name="gender">
                        <option value="" selected disabled>性別</option>
                        <option value="">全て</option>
                        <option value="0">男性</option>
                        <option value="1">女性</option>
                        <option value="2">その他</option>
                    </select>
                </div>
                <div class="admin__search-select">
                    <select name="category_id">
                        <option value="" selected disabled>お問い合わせの種類</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="admin__search-date">
                    <input type="date" id="date" name="date">
                </div>
                <div class="admin__search-button">
                    <button class="admin__search-button--submit">検索</button>
                </div>
            </form>
            <form class="admin-form-reset" action="/reset">
                <button class="admin__search-button--reset">リセット</button>
            </form>
        </div>
        <div class="admin__other-heading">
            <form class="admin__export">
                <button class="admin__export-button">エクスポート</button>
            </form>
            <div class="admin__page">
                {{ $contacts->appends(request()->input())->links('pagination::default') }}
            </div>
        </div>
    </div>
    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <?php $gender=array('男性','女性','その他'); ?>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
                <th class="admin-table__header"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="admin-table__row">
                <td class="admin-table__item">{{ $contact['last_name'].'　'.$contact['first_name'] }}</td>
                <td class="admin-table__item">{{ $gender[$contact['gender']] }}</td>
                <td class="admin-table__item">{{ $contact['email'] }}</td>
                <td class="admin-table__item">{{ $contact['category']['content'] }}</td>
                <td class="admin-table__item">
                    <input class="" type="checkbox" id="" class="admin-table__item--detail">
                        <label for="" >詳細</label>
                    </input>
                </td>
            </tr>



            <div class="modal-content" id="modal-content">
                <div>
                    <button>X</button>
                </div>
                <div class="modal-group">
                    <div class="modal__group-title">
                        <span>お名前</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>性別</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>メールアドレス</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>電話番号</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>住所</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>建物名</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>お問い合わせの種類</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                    <div class="modal__group-title">
                        <span>メお問い合わせ内容</span>
                    </div>
                    <div class="modal__group-content">
                        <input type="text">
                    </div>
                </div>
                <div class="modal__delete">
                    <button class="modal__delete-button">削除</button>
                </div>
            </div>











            @endforeach
        </table>
    </div>
</div>




@endsection