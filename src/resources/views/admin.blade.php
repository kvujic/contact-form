@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('content')
<div class="admin-wrapper">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form class="admin-search__group-select" action="/admin" method="GET">
        <div class="admin-search__item">
            <input class="admin-search__text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="">
            <div class="admin-search__select-gender">
                <select class="admin-search__select-inner" name="gender">
                    <option value="" disabled selected>性別</option>
                    <option value="">全て</option>
                    @foreach($genders as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="admin-search__select-category">
                <select class="admin-search__select-inner" name="category_id">
                    <option value="" disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <input class="admin-search__select-date" type="date" name="date" placeholder="年/月/日" value="">
            <div class="admin-search__buttons">
                <button class="admin-search__button--search" type="submit">検索</button>
                <button class="admin-search__button--reset" type="reset">リセット</button>
            </div>
        </div>
    </form>
    <form class="admin-search__group-sub" action="{{ route('admin') }}" method="GET">
        <div class="admin-search__item">
            <button class="admin-export__button" type="submit">エクスポート</button>
            <div class="admin-pagination">
                {{ $contacts->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
        </div>
    </form>
    <table class="admin-table">
        <thead class="admin-table__header">
            <tr class="admin-table__row">
                <th class="admin-table__label-name">お名前</th>
                <th class="admin-table__label-gender">性別</th>
                <th class="admin-table__label-email">メールアドレス</th>
                <th class="admin-table__label-category">お問い合わせの種類</th>
                <th class="admin-table__label-button"></th>
            </tr>
        </thead>
        <tbody class="admin-table__body">
            @foreach($contacts as $contact)
            <tr class="admin-table__row">
                <td class="admin-table__item-name">{{ $contact->last_name }}&nbsp;{{ $contact->first_name }}</td>
                <td class="admin-table__item-gender">
                    @if($contact->gender == 1)
                    男性
                    @elseif($contact->gender == 2)
                    女性
                    @else
                    その他
                    @endif
                </td>
                <td class="admin-table__item-email">{{ $contact->email }}</td>
                <td class="admin-table__item-category">
                    {{ $contact->category->content }}
                </td>
                <td class="admin-table__item-button">
                    <div class="admin-table__button-detail">
                        <button id="openModal">詳細
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection