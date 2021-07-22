

@extends('template.dashboard')
@section('content')
<!-- page content -->
<div class="right_col" role="main" style="min-height: 590px;">
    <div class="">
      

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Notifikasi Pertemanan</small></h2>
              <div class="filter">
                
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              

              <div class="col-md-12 col-sm-12 ">
                <div>
                  <div class="x_title">
                    <h2>Daftar Notifikasi</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <ul class="list-unstyled top_profiles scroll-view">
                      @foreach ($teman as $data)
                      @if ( in_array( $data->id, $notifikasi))
                          
                      
                    <li class="media event">
                        <img src="http://127.0.0.1:8000/template_dashboard/production/images/img.jpg" alt="..." class="img-circle" style="
                        width: 50px;
                        height: 50px;
                        padding-top: -;
                        margin-top: 5px;
                        margin-right: 10px;
                        margin-left: 5px;
                        margin-bottom: 5px;
                    ">
                      <div class="media-body">
                        <a class="title" href="#">{{ $data->name }}</a>
                        <p> <small> <strong> {{ $data->nomor_hp }}</strong></small>
                        </p>
                        <p>Assalamu'alaikum, {{ Auth::user()->name }}. Tolong izinkan saya untuk berteman dengan Anda. Kita dapat melakukan transaksi hutang piutang bersama!</p>
                        
                        <div class="pull-right">
                            <form action="/teman/insert-teman" method="POST">
                                @csrf
                                <input type="hidden" id="nomor_hp" name="nomor_hp" value="{{ $data->nomor_hp }}">
                                <button class="btn btn-sm btn-success" type="submit">terima</button>
                            </form>
                        </div>
                      </div>
                    </li>
                    @endif

                    @endforeach
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>



      
    </div>
  </div>
  <!-- /page content -->



@endsection

@section('basic-script')

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

@endsection

@section('new-script')
    
@endsection