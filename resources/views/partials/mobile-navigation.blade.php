<div class="mobile-nav-toggle js-toggleNav">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>

<div class="overlay" id="mobile-nav">
    <div class="mobile-nav-toggle js-closeNav">
        <span class="bar white"></span>
        <span class="bar white"></span>
        <span class="bar white"></span>
    </div>
    <ul class="menu">
        @foreach($categories as $category)
            <li class="cat js-closeNav"><a href="#{{$category->title}}">{{ $category->title }}</a></li>
        @endforeach
        <li class="devider"></li>
        <li class="js-popup">Kontakt</li>
        <li class="js-popup">Impressum</li>
        <li><a href="https://www.facebook.com/KIOSKROYAL" target="_blank">Facebook</a></li>
    </ul>
</div>