@extends('app')

@section('title')
    Backend
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            {{-- Flash message --}}
            @include('flash::message')
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <h1>Backend</h1>
            <p class="lead">Welcome back {{ Auth::user()->username }}.</p>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
            <a href="{{ route('home') }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show site</a>
        </div>
    </div>
    <div class="container" style="padding-bottom:20px;">
        {{------------------ Admins ------------------}}
        @include('partials.backend.admins')

        {{------------------ Categories ------------------}}
        @include('partials.backend.categories')
        @include('partials.backend.modals.category')

        {{------------------ Projects ------------------}}
        @include('partials.backend.modals.project')

        {{------------------ Images ------------------}}
        @include('partials.backend.images')

        {{------------------ Footer ------------------}}
        <footer class="row text-center">
            <small style="color: #CCC;">Made with <span style="color: #cd7777;">&hearts;</span> by Christian Korndörfer &middot; <a href="http://chko.org" target="_blank">chko.org</a> &middot; <a href="http://twitter.com/schnubor">@schnubor</a></small>
        </footer>
    </div>
@endsection