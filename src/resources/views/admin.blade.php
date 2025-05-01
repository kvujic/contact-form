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
            <input class="admin-search__text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <div class="admin-search__select-gender">
                <select class="admin-search__select-inner" name="gender">
                    <option value="" disabled selected>性別</option>
                    <option value="{{ request('gender') }}">全て</option>
                    @foreach($genders as $key => $value)
                    <option value="{{ $key }}" {{ request('gender') == $key ? 'selected' : ''}}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="admin-search__select-category">
                <select class="admin-search__select-inner" name="category_id">
                    <option value="" disabled selected>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : ''}}>{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <input class="admin-search__select-date" type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}">
            <div class="admin-search__buttons">
                <button class="admin-search__button--search" type="submit">検索</button>
                <a class="admin-search__button--reset" href="/admin">リセット</a>
            </div>
        </div>
    </form>
    <form class="admin-search__group-link" action="{{ route('admin.export') }}" method="GET">
        <div class="admin-search__item">
            @foreach(request()->query() as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button class="admin-export__button" type="submit">エクスポート</button>
            <div class="admin-pagination">
                {{ $contacts->onEachSide(1)->links('pagination::custom') }}
            </div>
        </div>
    </form>
    
    <livewire:modal />
</div>
@endsection