@include ('header')
<section id="singles">
    <div class="bgTitle">
      <h2 class="page_title">{{$post->category_title}}</h2>
    </div>

    <div class="blgs">
      <div class="warpper my-4">
        <div class="container">
          <div class="row">
            <div class="post_title mb-5">
              <h2>{{$post->post_title}}</h2>
            </div>
          </div>
          <div class="row">
              {!!$post->post_content!!}
          </div>
        </div>
      </div>
    </div>
</section>
@include('footer')