@extends('layouts.app')

@section('content')

  <section class="blog-archive-hero py-[100px] text-center">
      <h1 class="font-alt text-[80px] md:text-[100px] text-darkblue">{{ __('Blog', 'sage-main')}}</h1>
  </section>

  <section class="blog-posts px-5">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-8 grid-g lg:gap-x-0 mx-auto">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
    </div>
  </section><!-- /.blog-posts -->

  @php($navArgs = array( 'prev_text' => __('Next', 'sage-main'), 'next_text' => __('Previous', 'sage-main'), ))
  {!! get_the_posts_navigation($navArgs) !!}

@endsection

