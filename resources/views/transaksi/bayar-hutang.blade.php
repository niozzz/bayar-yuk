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
                                <a class="btn btn-danger" href="/transaksi/hutang">Kembali</a>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content text-center">
                                <p class="text-left text-danger">Gambar bukti tidak wajib diisi</p>
                                <form action="/transaksi/bayar-hutang/update/{{$piutang-> id_tpiutang}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="gambar_bukti" name="gambar_bukti" class="form-control mb-3">
                                    
                                    <button type="submit" class="btn btn-success btn-lg">Bayar</button>
                                </form>
                                    
                                <br/>
                                
                                
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