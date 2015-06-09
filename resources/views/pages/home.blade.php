@extends('app')

@section('title')
    L5 Boilerplate
@endsection

@section('content')
    <div class="container">
        <div class="text-left">
            <div class="h1">L5 BOILERPLATE</div>
            <div class="lead">{{ Inspiring::quote() }}</div>
            <a href="{{ route('backend') }}" class="btn btn-default"><i class="fa fa-fw fa-chevron-right"></i> Backend</a>
        </div>
    </div>
@endsection
