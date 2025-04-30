@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <div class="register-form__heading">
        <h2>Register</h2>
    </div>

    <div class="register-form__enclosure">
        <form class="register-form" action="/register" method="POST">
            @csrf
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label class="register-form__label--item">お名前</label>
                </div>
                <div class="register-form__group-content">
                    <input type="text" name="name" placeholder="例.山田  太郎" value="{{ old('name') }}">
                </div>
                <div class="register-form__error">
                    @error('name')
                    <div class="register-error__message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label class="register-form__label--item">メールアドレス</label>
                </div>
                <div class="register-form__group-content">
                    <input type="email" name="email" placeholder="例.test@example.com" value="{{ old('email') }}">
                </div>
                <div class="register-form__error">
                    @error('email')
                    <div class="register-error__message">                 {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__group">
                <div class="register-form__group-title">
                    <label class="register-form__label--item">パスワード</label>
                </div>
                <div class="register-form__group-content">
                    <input type="password" name="password" placeholder="例.coachtech1306">
                </div>
                <div class="register-form__error">
                    @error('password')
                    <div class="register-error__message">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="register-form__button">
                <button class="register-form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection