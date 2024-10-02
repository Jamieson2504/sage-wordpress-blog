@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
        <section class="hero">
            
            <h1>
                <span>@php the_field('banner_title'); @endphp</span>
            </h1>

        </section>

        <section class="intro px-5 text-center flex justify-center pt-[100px] md:pt-0 pb-[100px]">
        
            <div class="lg:w-2/4 font-body text-[25px] lg:text-4xl">
                <h2>@php the_field('intro_text'); @endphp</h2>
            </div>
        
        </section><!-- /.intro -->

        @php
           $featured_image = get_field('feature_image');
        @endphp
        
        @if($featured_image)
            <section class="image image--parallax pb-[100px] flex justify-center">
                <div class="image__outer bg-eggshell border border-dashed border-black p-4 sm:p-6 relative z-10">
                    <div class="image__inner">
                        <img 
                            src="{{ $featured_image['url'] }}" 
                            alt="{{ $featured_image['alt'] }}"
                            width="{{ $featured_image['width'] }}"
                            height="{{ $featured_image['height'] }}" 
                        />
                    </div><!-- /.image__inner -->
                </div>    
            </section><!-- /.image -->
        @endif


        <section class="blog-posts blog-posts--preview px-5 pb-[100px] text-center">

            <h2 class="font-alt uppercase text-5xl lg:text-7xl text-darkblue mb-12">{{ __('Recent Travels', 'sage-main') }}</h2><!-- /.font-alt uppercase text-3xl -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-0 mx-auto">
                @php
                    // Custom query to fetch the most recent 3 posts
                    $recent_posts = new WP_Query([
                        'post_type' => 'post',   // Fetch posts of type 'post'
                        'posts_per_page' => 3,   // Limit to 3 posts
                        'orderby' => 'date',     // Order by date
                        'order' => 'DESC'        // Most recent first
                    ]);
                    @endphp

                    @if ($recent_posts->have_posts())

                        @while ($recent_posts->have_posts()) @php $recent_posts->the_post(); @endphp
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
                        @endwhile

                    @php wp_reset_postdata(); @endphp
                    @else
                    <p>{{ __('No posts available', 'sage-main') }}.</p>
                    @endif
                </div>

                <a href="/blog" class="underline mt-5 inline-block">{{ __('View more', 'sage-main') }}</a>

        </section>

    @endwhile
@endsection

{{-- @section('sidebar')
  @include('sections.sidebar')
@endsection --}}
