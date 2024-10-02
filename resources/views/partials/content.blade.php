<article class="blog-posts__item mx-0 md:mx-5 p-4 sm:p-6 bg-eggshell border border-dashed border-black rounded-[30px] relative z-10">
  @if (has_post_thumbnail())
  <a href="{{ get_permalink() }}">
     <div class="thumbnail relative aspect-video overflow-hidden rounded-[30px]">
          {!! the_post_thumbnail('medium_large') !!} 
      </div><!-- /.thumbnail -->
  </a>
  @endif
  <h2 class="py-6 font-bold text-2xl"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
  <div class="mb-6">
      {{ the_excerpt() }}
  </div><!-- /.mb-6 -->
  <a href="{{ get_permalink() }}" class="btn mb-3">{{ __('Read more', 'sage-main') }}</a>
</article>