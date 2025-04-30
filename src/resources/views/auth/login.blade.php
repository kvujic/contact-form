@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login-form">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>

    <div class="login-form__enclosure">
        <form class="login-form" action="/login" method="POST">
            @csrf
            <div class="login-form__group">
                <div class="login-form__group-title">
                    <label class="login-form__label--item">メールアドレス</label>
                </div>
                <div class="login-form__group-content">
                    <input type="email" name="email" placeholder="例.test@example.com" value="{{ old('email') }}">
                </div>
                <div class="login-form__error">
                    @error('email')
                    <div class="login__error-message">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="login-form__group">
                <div class="login-form__group-title">
                    <label class="login-form__label--item">パスワード</label>
                </div>
                <div class="login-form__group-content">
                    <input type="password" name="password" placeholder="例.coachtech1306" value="{{ old('password') }}">
                </div>
                <div class="login-form__error">
                    @error('password')
                    <div class="login__error-message">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="login-form__button">
                <button class="login-form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection