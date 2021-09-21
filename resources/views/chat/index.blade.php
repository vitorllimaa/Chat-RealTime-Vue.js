@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="chat col-9">
            <chat></chat>
        </div>
        <div class="user col-3">
            <user></user>
        </div>
    </div>
</div>

@endsection
