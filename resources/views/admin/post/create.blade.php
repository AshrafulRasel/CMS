@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2></h2>
        </div>

    <!-- Vertical Layout -->

        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                 <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ADD NEW POST
                    </h2>
                 </div>
                <div class="body">

                        <label for="email_address">Title</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Post Title">
                            </div>
                        </div>

                        <label for="email_address">Post Image</label>
                        <div class="form-line {{ $errors->has('url') ? 'focused error' : '' }}">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="image" id="image" class="form-control" >
                            </div>
                        </div>
                        </div>
 
                         <div class="form-group" id="url" style="display: none;">
                                                 <label for="email_address">Video URL</label>

                            <div class="form-line">
                                <input type="text" name="url" id="" class="form-control" >
                            </div>
                        </div>
 

                        <div class="form-group">
                            <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                            <label for="publish">Publish</label>
                        </div>
                </div>
            </div>
        </div>
                 <div class="col-lg-4  col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Post Types And Section
                        </h2>
                    </div>
                    <div class="body">

                             <div class="form-group">
                                <div class="form-line {{ $errors->has('post_type') ? 'focused error' : '' }}">
                                    <label  for="category">Post Type</label>
                                    <select name="post_type" id="post_type" class="form-control show-tick"  data-live-search="true" >
                                             <option id="post" value="1">Post</option>
                                            <option id="video" value="2">Video</option>

                                     </select>
                                 </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line {{ $errors->has('section') ? 'focused error' : '' }}">
                                    <label  for="tag">Select Section</label>
                                    <select name="section" id="category" class="form-control show-tick"  data-live-search="true"  >
                                              <option value="1">Section-1</option>
                                            <option value="2">Section-2</option>

                                     </select>
                                </div>
                            </div>
                            <a class="btn btn-danger m-t-15 waves-effect" href="{{route('admin.post.index')}}">Back</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                     </div>
                </div>
            </div>

        </div>
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           Body
                        </h2>
                    </div>
                    <div class="body">
                        <textarea id="tinymce" name="body"></textarea>
                     </div>
                </div>
            </div>
        </div>

        </form>


    </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });

            $('select[name="post_type"]').on('change', function (e) { 

                var id = $(this).find(':selected').val();
                if(id == 2){
                    $('#url').css('display', '');
                }else if( id == 1){

                    $('#url').css('display', 'none');


                }
                console.log(id);





          });

    </script>

@endpush