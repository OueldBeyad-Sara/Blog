@extends('front.layouts.pages-layout')
@section('pageTitle', @isset($pageTitle) ? $pageTitle : 'About')
@section('content')

<div class="row">
    <div class="col-lg-8 ">
        <div class="breadcrumbs mb-4"> <a href="{{route('home')}}">Home</a>
            <span class="mx-1">/</span>  <a href="about.html">About</a>
        </div>
    </div>
    <div class="col-lg-8 mx-auto mb-5 mb-lg-0">
        <img loading="lazy" decoding="async" src="front/images/bloggy.jpg" class="img-fluid w-100 mb-4" alt="Author Image">
        <h1 class="mb-4">Oueld Beyad Sara</h1>
        <div class="content">
            <p>Welcome to my blog! My name is Oueld Beyad Sara, and I'm a passionate software engineering student.
              
              I've always had a keen interest in technology, and software engineering has been a fascinating journey for me. I'm constantly learning and exploring new concepts, languages, and tools in the field of software development.
              
              Through this blog, I aim to share my experiences, insights, and knowledge with fellow aspiring software engineers, tech enthusiasts, and anyone interested in the world of programming.
              
              You can expect to find a wide range of topics on my blog, including programming languages like Python, Java, and JavaScript, web development frameworks, algorithms, data structures, and much more. I'll also be sharing tutorials, tips, and tricks that I've learned along the way.
            <blockquote>
                <p>"Programming is not about typing, it's about thinking."</p>
            </blockquote>
            <p>Join me on this exciting adventure as we dive into the realm of software engineering together. Feel free to reach out to me with any questions, suggestions, or topics you'd like me to cover.

              Thank you for visiting my blog, and I hope you find it informative and inspiring!</p>
        </div>
    </div>
<div class="col-lg-4">
<div class="widget-blocks">
<div class="row">
<div class="col-lg-12">
<div class="widget">
<div class="widget-body">
<img loading="lazy" decoding="async" src="front/images/bloggy.jpg" alt="About Me" class="w-100 author-thumb-sm d-block" style="height: 250px">
<h2 class="widget-title my-3">Oueld Beyad Sara</h2>
<p class="mb-3 pb-2">I am Oueld Beyad Sara, a software engineer student, and I am the admin of this blog website</p>
</div>
</div>
</div>
<div class="widget-blocks">
  @if (recommended_posts())
  <div class="col-lg-12 col-md-6">
    <div class="widget">
      <h2 class="section-title mb-3">Recommended</h2>
<div class="widget-body">
  <div class="widget-list">
    @foreach (recommended_posts() as $item)
    <a class="media align-items-center" href="{{ route('read_post',$item->post_slug) }}">
      <img loading="lazy" decoding="async" src="/storage/images/post_images/{{$item->featured_image}}" alt="Post Thumbnail" class="w-100">
      <div class="media-body ml-3">
        <h3 style="margin-top:-5px">{{$item->post_title}}</h3>
        <p class="mb-0 small">{!! Str::ucfirst(words($item->post_content,7)) !!}</p>
      </div>
    </a>
    @endforeach
  </div>
</div>
</div>
</div>
@endif
</div>
@if (categories())
  <div class="col-lg-12 col-md-6">
    <div class="widget">
      <h2 class="section-title mb-3">Categories</h2>
      <div class="widget-body">
        <ul class="widget-list">
          @foreach (categories() as $item)
          <li><a href="{{route('category_posts',$item->slug)}}">{!! Str::ucfirst(words($item->subcategory_name)) !!}<span class="ml-auto">({{$item->posts->count()}})</span></a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  @endif
</div>
</div>
</div>
</div>

@endsection