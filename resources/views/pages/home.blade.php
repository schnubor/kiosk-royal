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
        <div class="arrow js-arrow">
            <img src="/images/arrow.svg" alt="scroll down">
        </div>
    </header>

    {{-- Navigation --}}
    @include('partials.navigation')
    @include('partials.mobile-navigation')

    {{-- Projects --}}
    @if(!empty($categories))
        @foreach($categories as $category)
            @if(!empty($category->projects->first()->bgcolor))
                <section class="category" id="{{$category->title}}" style="color: {{ $category->color }}; background-color: {{ $category->projects->first()->bgcolor }};">
            @else
                <section class="category" id="{{$category->title}}" style="color: {{ $category->color }}; background-color: white;">
            @endif
                <h2>{{ $category->title }}</h2>
                @if(!empty($category->projects))
                    @foreach($category->projects as $project)
                        <section class="project" style="background-color: {{ $project->bgcolor }}; color: {{ $project->color }};">
                            <div class="container1280">
                                <h3>{{ $project->title }}</h3>
                                <h4>{{ $project->description }}</h4>
                                @foreach($project->images as $image)
                                    <img src="/uploads/{{ $image->filename }}" alt="{{ $image->project->title }}" class="project-image">
                                @endforeach
                            </div>
                        </section>
                    @endforeach
                @endif
            </section>
        @endforeach
    @endif

    {{-- Footer --}}
    <footer id="footer" class="text-center">
        <ul>
            <li class="js-kontakt">Kontakt</li>
            <li class="js-imprint">Impressum</li>
            <li><a href="https://www.facebook.com/KIOSKROYAL" target="_blank">Facebook</a></li>
        </ul>
    </footer>

    {{-- Popups --}}
    @include('partials.kontakt')
    @include('partials.imprint')
@endsection
