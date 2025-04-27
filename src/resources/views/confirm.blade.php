@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <div class="confirm-table">
        <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['last_name'] }}</span>
                    <span>{{ $contact['first_name'] }}</span>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                    @php
                    $genderText = ['1'=>'男性', '2'=>'女性', '3'=>'その他'];
                    @endphp
                    {{ $genderText[$contact['gender']] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                    {{ $contact['email'] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                    {{ $contact['tel'] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                    {{ $contact['address'] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">
                    {{ $contact['building'] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__text">
                    {{ $categories[$contact['category_id']] }}
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                    {{ $contact['detail'] }}
                </td>
            </tr>
        </table>
    </div>

    <div class="buttons">
        <form class="form" action="/thanks" method="POST">
            @csrf
            @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="confirm__button">
                <button class="confirm__button-submit" type="submit">送信</button>
            </div>
        </form>

        <form class="form" action="/" method="GET">
            @csrf
            @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <div class="fixes__button">
                <button class="fixes-contents" type="submit">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection