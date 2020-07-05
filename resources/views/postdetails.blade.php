@extends('layouts.frontend.app')
@section('og')
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:image" content="{{ asset('storage/post/'.$post->image) }}" />
<meta property="og:type" content="website" />
@endsection
@section('content')

 <section class="post-details-area mb-80">
        <div class="container">
            
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-2">
                                 <a  class="post-title mb-2">{{ $post->title}}</a>

                                 		@if( $post->post_type == 1)

 
                                        <img src="{{ asset('storage/post/'.$post->image) }}" alt="">
                                        @else


                                            <iframe width="560" height="315" src="{{$post->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                        @endif
                                <hr>

                            </div>

                             {!! html_entity_decode($post->body) !!} 
 


                            




                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
 

                                <div class="addthis_sharing_toolbox" data-url="THE URL" data-title="THE TITLE" data-description="THE DESCRIPTION" data-media="THE IMAGE"></div>
                             <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f017382ef6ca9ac"></script>
                             <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox" data-url="{{url()->current()}}" data-title="{{$post->title}}" data-description="{{$post->body}}" data-media="{{ asset('storage/post/'.$post->image) }}"></div> 
                            </div>

                           

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                 
            </div>
        </div>
    </section>
@endsection