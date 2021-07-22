@extends('template.dashboard')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Catatan Transaksi Hutang</h3>
        </div>

        
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              
              <h2>Tabel Hutang</h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              
              <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama Kreditur</th>
                    <th>Jumlah Piutang</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>


                <tbody>
                  
                  
                @foreach ($piutang as $data)
                  @if ($data->status_tpiutang != 'Lunas')
                
                  <tr>
                    <td>{{$data-> name}}</td>
                    <td>Rp{{number_format($data->jumlah_tpiutang)}},-</td>
                    @php
                        $tanggalTpiutang = strtotime($data-> tanggal_tpiutang);
                        $tanggalTpiutang = date('d/m/Y', $tanggalTpiutang);
                    @endphp
                    <td>{{$tanggalTpiutang}}</td>
                    <td>{{$data -> keterangan_tpiutang}}</td>
                    <td>{{$data -> status_tpiutang}}</td>
                    <td>
                                                            
                        <a class="btn btn-sm btn-info" href="/transaksi/bayar-hutang/{{$data -> id_tpiutang}}">Bayar</a>
                        
                      </td>
                  </tr>
                    @endif
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>
          </div>
        </div>

        

        

        

        

        
      </div>
    </div>
  </div>
  <!-- /page content -->

                
@endsection