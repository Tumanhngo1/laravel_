
    
        <div class='widget-title'>
            <h3 class='title'>
            Most Popular
            </h3>
        </div>
        <div class='widget-content'>
            @foreach($populars as $popular)
            <article class='popular-post post'>
                <div class='post-image-wrap'>
                <a class='post-image' href='/users/{{$popular->slug}}'>
                <span class='post-thumb' >
                    <img src="/storage/app/{{$popular->image}}" alt="">
                </span>
                </a>
                </div>
                <div class='post-header'>
                <div class='post-meta'>
                <time class='post-date published' datetime='2018-06-27T15:01:00-07:00'>{{$popular->created_at->diffForHumans()}}</time>
                </div>
                <h2 class='post-title'>
                <a href='/users/{{$popular->slug}}'>{{ $popular->title }}</a>
                </h2>
                </div>
            </article>
            @endforeach
        {{-- <article class='popular-post post'>
            <div class='post-image-wrap'>
            <a class='post-image' href='https://amalia-templateify.blogspot.com/2018/06/how-to-make-environments-more-welcoming.html'>
            <span class='post-thumb' data-image='https://3.bp.blogspot.com/-o66RR9jXcRQ/WzRRT9ZlkCI/AAAAAAAACQ0/5bfpNkbXqe4VtIPTPOVV5U5K7EF7D44YwCK4BGAYYCw/w120/pexels-photo-707581.jpeg'></span>
            </a>
            </div>
            <div class='post-header'>
            <div class='post-meta'>
            <time class='post-date published' datetime='2018-06-27T20:23:00-07:00'>June 27, 2018</time>
            </div>
            <h2 class='post-title'>
            <a href='https://amalia-templateify.blogspot.com/2018/06/how-to-make-environments-more-welcoming.html'>How to make environments more welcoming</a>
            </h2>
            </div>
        </article>
        <article class='popular-post post'>
            <div class='post-image-wrap'>
            <a class='post-image' href='https://amalia-templateify.blogspot.com/2018/06/tips-to-take-advantage-of-small-spaces.html'>
            <span class='post-thumb' data-image='https://4.bp.blogspot.com/-7j8_E-oQ05I/WzRQfhS_swI/AAAAAAAACQo/3ix94lJYcMsOLYYkHzEbJ0g_XJ1O_eduwCK4BGAYYCw/w120/pexels-photo-1078758.jpeg'></span>
            </a>
            </div>
            <div class='post-header'>
            <div class='post-meta'>
            <time class='post-date published' datetime='2018-06-27T20:08:00-07:00'>June 27, 2018</time>
            </div>
            <h2 class='post-title'>
            <a href='https://amalia-templateify.blogspot.com/2018/06/tips-to-take-advantage-of-small-spaces.html'>Tips to take advantage of small spaces</a>
            </h2>
            </div>
        </article> --}}
        </div>
   
