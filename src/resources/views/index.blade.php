@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="contact-form">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form class="form" action="/confirm" method="POST">
        @csrf
        <div class="contact-form__group">

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-name">
                        <input type="text" name="last_name" placeholder="例.山田" value="{{ old('last_name') }}">
                        <input type="text" name="first_name" placeholder="例.太郎" value="{{ old('first_name') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                    @error('first_name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-gender">
                        <div class="form__input--radio">
                            <label><input type="radio" name="gender" value="1" checked>男性</label>
                            <label><input type="radio" name="gender" value="2">女性</label>
                            <label><input type="radio" name="gender" value="3">その他</label>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('gender')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-email">
                        <input type="email" name="email" placeholder="例.test@example.com" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-tel">
                        <input type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                        <span class="hyphen">-</span>
                        <input type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                        <span class="hyphen">-</span>
                        <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('tel')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-address">
                        <input type="text" name="address" placeholder="例.東京都世田谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('address')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-building">
                        <input type="text" name="building" placeholder="例.千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </div>
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-category">
                        <select class="form__input--option" name="category">
                            <option value="" disabled selected>選択してください</option>
                            {{-- @foreach($categories as $category) --}}
                            <option value="{{ old('category_id') }}"></option>
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
                <div class="form__error">
                    @error('category_id')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__group--item">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--item-textarea">
                        <div class="form__input--details">
                            <textarea name="detail" cols="30" rows="4" placeholder="お問い合わせ内容をご記載ください"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form__error">
                    @error('detail')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </div>
    </form>
</div>
@endsection