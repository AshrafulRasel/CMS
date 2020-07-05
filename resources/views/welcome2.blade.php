 @extends('layouts.frontend.app')

 @section('content')

 <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Section - 1</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        @isset($feature)


                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url({{ asset('storage/post/'.$feature->image) }});">
                                <!-- Play Button -->

                                

                                <!-- Post Content -->
                                <div class="post-content">
                                     <a href="{{ route('post.details',$feature->slug) }}" class="post-title">{{$feature->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                @if($feature->post_type == 2)
                                <span class="video-duration"><i class="fa fa-play-circle-o fa-3x" style="color: red" aria-hidden="true"></i></span>
                                 @endif
                            </div>


                             
                        </div>
                        @endisset

                        <div class="row">
                            <!-- Single Blog Post -->
                            @foreach($section1 as $sec1)
                                @if ($loop->first) @continue @endif

                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">

                                        <img src="{{ asset('storage/post/'.$sec1->image) }}" alt="">


                                        <!-- Video Duration -->
                                        @if($sec1->post_type == 2)

                                         <span class="video-duration"><i class="fa fa-play-circle-o fa-3x" style="color: red" aria-hidden="true"></i></span>
                                        @endif

                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                         <a href="{{ route('post.details',$sec1->slug) }}" class="post-title">{{ $sec1->title }}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 28</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 17</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            
                        </div>

                        

                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                         

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Section - 2</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            @isset($feature2)

                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                        <img src="{{ asset('storage/post/'.$feature2->image) }}" alt="">

                                    <!-- Video Duration -->
                                @if($feature2->post_type == 2)
                                <span class="video-duration"><i class="fa fa-play-circle-o fa-3x" style="color: red" aria-hidden="true"></i></span>
                                 @endif</div>

                                <!-- Post Content -->
                                <div class="post-content">
                                     <a href="{{ route('post.details',$feature2->slug) }}"  class="post-title">{{$feature2->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 38</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                    </div>
                                </div>
                            </div>
                            @endisset

                           @foreach($section2 as $sec2) 
                            @if ($loop->first) @continue @endif


                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">

                                        <img src="{{ asset('storage/post/'.$sec2->image) }}" alt="">
                                        
                                    
                                </div>
                                <div class="post-content">
                                    @if($sec2->post_type == 2)
                                         <span class="video-duration"><i class="fa fa-play-circle-o" style="color: red" aria-hidden="true"></i></span>
                                        @endif<a href="{{ route('post.details',$sec2->slug) }}" class="post-title">{{$sec2->title}}</a>

                                </div>
                            </div>
                            @endforeach

                            
                        </div>

                        <!-- ***** Single Widget ***** -->
                        

                    </div>
                </div>
            </div>
        </div>
    </section>

 @endsection