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

    {{-- Navigation --}}
    <nav>
        
    </nav>

    {{-- Projects --}}
    @if(!empty($categories))
        @foreach($categories as $category)
            @if(!empty($category->projects->first()->bgcolor))
                <section class="category" style="color: {{ $category->color }}; background-color: {{ $category->projects->first()->bgcolor }};">
            @else
                <section class="category" style="color: {{ $category->color }}; background-color: white;">
            @endif
                <div class="container1280">
                    <h2>{{ $category->title }}</h2>
                    @if(!empty($category->projects))
                        @foreach($category->projects as $project)
                            <section class="project" style="background-color: {{ $project->bgcolor }}; color: {{ $project->color }};">
                                <h3>{{ $project->title }}</h3>
                                <h4>{{ $project->description }}</h4>
                                @foreach($project->images as $image)
                                    <img src="/uploads/{{ $image->filename }}" alt="{{ $image->project->title }}" class="project-image">
                                @endforeach
                            </section>
                        @endforeach
                    @endif
                </div>
            </section>
        @endforeach
    @endif

    {{-- Footer --}}
    <footer id="footer" class="text-center">
        <ul>
            <li class="js-popup">Kontakt</li>
            <li class="js-popup">Impressum</li>
            <li><a href="https://www.facebook.com/KIOSKROYAL" target="_blank">Facebook</a></li>
        </ul>
    </footer>

    {{-- Popup --}}
    @include('partials.popup')
@endsection
