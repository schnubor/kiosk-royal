<nav>
    <div class="container1280">
        <div class="logo">
            <img src="/images/logo.svg" alt="Kiosk Royal">
        </div>
        <ul class="menu">
            @foreach($categories as $category)
                <li><a href="#{{$category->title}}">{{ $category->title }}</a></li>
            @endforeach
            <li class="js-popup">Kontakt</li>
        </ul>
    </div>
</nav>