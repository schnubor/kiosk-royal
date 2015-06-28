@extends('app')

@section('title')
    Kiosk Royal
@endsection

@section('content')
    <header>
        <div class="header-content text-center">
            <div class="container1280">
                <img src="/images/logo.svg" alt="Kiosk Royal" class="logo">
                <h1>Grafik und Illustration aus Berlin</h1>
            </div>
        </div>
        <div class="arrow">
            <img src="/images/arrow.svg" alt="scroll down">
        </div>
    </header>

    {{-- Projects --}}
    @foreach($categories as $category)
        <section class="category" style="color: {{ $category->color }};">
            <h2>{{ $category->title }}</h2>
            @foreach($category->projects as $project)
                <section class="project" style="background-color: {{ $project->bgcolor }}; color: {{ $project->color }};">
                    {{ $project->title }}
                </section>
            @endforeach
        </section>
    @endforeach

    <footer>
        <ul>
            <li>Kontakt</li>
            <li>Impressum</li>
            <li>Facebook</li>
        </ul>
    </footer>
@endsection
