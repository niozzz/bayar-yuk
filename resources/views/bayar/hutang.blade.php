@extends('template.dashboard')

@section('content')
     <!-- Dropzone.js -->
<link
    href="{{asset('template_dashboard')}}/vendors/dropzone/dist/min/dropzone.min.css"
    rel="stylesheet">

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Bayar Hutang</h3>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Dropzone multiple file uploader</h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content text-center">
                                <p class="text-left">Drag multiple files to the box below for multi upload or click to select
                                    files.</p>
                                <form action="form_upload.html" class="dropzone"></form>
                                    
                                <br/>
                                
                                <button type="button" class="btn btn-success btn-lg">Bayar</button>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- /page content -->

        <!-- Dropzone.js -->
        <script
            src="{{asset('template_dashboard')}}/vendors/dropzone/dist/min/dropzone.min.js"></script>
@endsection