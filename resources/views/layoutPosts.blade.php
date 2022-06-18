@include ('header')
<section id="singles">
    <div class="bgTitle">
      <h2 class="page_title">{{$posts[0]->category_title}}</h2>
    </div>

    <div class="blog">
        <div class="container">
            @foreach($posts as $post)
            <div class="row m-5 pb-5 border-bottom ">
                <div class="col-md-4 px-5">
                    <a href="{{route('PostDetail',['id'=>$post->post_ID])}}">
                        <img class="img-fluid" src="{{$post->post_imgURL}}" alt="">
                    </a>
                </div>
                    <div class="col-md-8">
                        <h3>
                            {{$post->post_title}}
                        </h3>
                        <p>{{$post->post_decs}}</p>
                        <a href="{{route('PostDetail',['id'=>$post->post_ID])}}">XEM THÊM</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</section>
@include('footer')