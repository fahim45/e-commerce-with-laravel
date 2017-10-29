<div class="menu">
<div class="container">
    <div class="menu_box">
        <ul class="megamenu skyblue">
            <li class="active grid"><a class="color2" href="{{ url('/') }}">Home</a></li>
            @foreach($categories as $category)
            <li><a class="color4" href="{{ url('/product-category/'.$category->id) }}">{{ $category->category_name }}</a></li>
            @endforeach
            <div class="clearfix"> </div>
        </ul>
    </div>
</div>
</div>