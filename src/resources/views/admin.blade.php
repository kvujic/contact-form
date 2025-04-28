@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@section('content')
<div class="admin-wrapper">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <form class="admin-search" action="/admin/search" method="GET">
        @csrf
        <div class="admin-search__item">
            <input class="admin-search__text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="">
            <select class="admin-search__select-gender" name="gender">
                <option value="" disabled>性別</option>
                <option value="">全て</option>
                @foreach($genders as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <select class="admin-search__select-category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
            <input class="admin-search__select-date" type="date" name="date" placeholder="年/月/日" value="">
            <div class="admin-search__buttons">
                <button class="admin-search__button--search" type="submit">検索</button>
                <button class="admin-search__button--reset" type="reset">リセット</button>
            </div>
        </div>
    </form>
        <form class="admin-export" action="{{ route('admin') }}" method="GET">
            <div class="admin-export__item">
                <button class="admin-export__button" type="submit">エクスポート</button>
            </div>
            <div class="admin-pagination">
                {{ $contacts->links() }}
            </div>
        </form>
    </form>
    <table class="admin-table">
        <thead class="admin-table__header">
            <tr class="admin-table__row">
                <th class="admin-table__label">お名前</th>
                <th class="admin-table__label">性別</th>
                <th class="admin-table__label">メールアドレス</th>
                <th class="admin-table__label">お問い合わせの種類</th>
                <th class="admin-table__label"></th>
            </tr>
        </thead>
        <tbody class="admin-table__body">
            @foreach($contacts as $contact)
            <tr class="admin-table__row">
                <td class="admin-table__item">{{ $contact->last_name }}{{ $contact->first_name }}</td>
                <td class="admin-table__item">
                    @if($contact->gender == 1)
                        男性
                    @elseif($contact->gender == 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td class="admin-table__item">{{ $contact->email }}</td>
                <td class="admin-table__item">
                    {{ $contact->category->content }}
                </td>
                <td class="admin-table__item">{{ $contact->detail }}</td>
                <td class="admin-table__item">
                    <div class="admin-table__button-detail">
                        <button class="admin-table__button-modal">詳細
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection