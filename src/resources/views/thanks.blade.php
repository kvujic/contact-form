@php
$no_header = true;
@endphp

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-content">
    <div class="thanks-background">Thank you</div>
    <div class="thanks-message">
        <p>お問い合わせありがとうございました</p>
        <a class="home-button" href="/">HOME</a>
    </div>
</div>
@endsection