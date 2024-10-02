@extends('layouts.app')

@section('hero')
  @include('partials.page-header')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile

@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection