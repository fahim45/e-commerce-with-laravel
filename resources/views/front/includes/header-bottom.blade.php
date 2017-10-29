<div class="header_bottom">
    <div class="container">
        <div class="header_bottom-box">
            <div class="header_bottom_left">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('/front')}}/images/logo.png" alt=""/></a>
                </div>
                <ul class="clock">
                    <i class="clock_icon"> </i>
                    <li class="clock_desc">Justo 24/h</li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="header_bottom_right">
                <div class="search">
                    <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
                    <input type="submit" value="">
                </div>
                <ul class="bag">
                    <a href="{{ url('/show-cart') }}"><i class="bag_left"> </i></a>
                    <a href="#"><li class="bag_right"><p>TK. {{ Session::get('grandTotal') }}</p> </li></a>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>