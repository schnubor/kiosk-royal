<div class="mobile-nav-toggle js-toggleNav">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>

<div class="overlay js-closeNav" id="mobile-nav">
    <ul class="menu">
        @foreach($categories as $category)
            <li class="cat js-closeNav"><a href="#{{$category->title}}">{{ $category->title }}</a></li>
        @endforeach
        <li class="devider"></li>
        <li class="js-kontakt"><span>Kontakt</span></li>
        <li class="js-imprint"><span>Impressum</span></li>
        <li><a href="https://www.facebook.com/KIOSKROYAL" target="_blank">Facebook</a></li>
    </ul>
</div>