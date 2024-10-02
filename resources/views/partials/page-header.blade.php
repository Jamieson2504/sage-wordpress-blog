<section class="post-title text-center pt-[100px] pb-[50px] block px-5">
    <h1 class="font-bold text-5xl mb-[30px]">
      {!! $title !!}
    </h1>
    @include('partials.entry-meta')  

    @if (has_post_thumbnail())
    <div class="post-banner">
        <div class="post-banner__inner">
          {!! the_post_thumbnail() !!}   
        </div><!-- /.post-banner__inner -->
    </div><!-- /.thumbnail -->
    @endif
</section><!-- /.post-title -->