

@extends('template.dashboard')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Riwayat Transaksi Piutang</h3>
        </div>

        
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              
              <h2>Tabel Piutang</h2>
              @if (session('pesan'))
              <p>
                  {{ session('pesan')}}
              </p>
              @endif
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
              
              <table id="datatable" class="table table-striped table-bordered display responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th>Nama Debitur</th>
                    <th>Jumlah Piutang</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    
                  </tr>
                </thead>


                <tbody>
                  
                  
                @foreach ($piutang as $data)
                  @if ($data->status_tpiutang == 'Lunas')
                      
                  <tr>
                    <td>{{$data-> name}}</td>
                    <td>Rp{{number_format($data->jumlah_tpiutang)}},-</td>
                    @php
                        $tanggalTpiutang = strtotime($data-> tanggal_tpiutang);
                        $tanggalTpiutang = date('d/m/Y', $tanggalTpiutang);
                    @endphp
                    <td>{{$tanggalTpiutang}}</td>
                    <td>{{$data -> keterangan_tpiutang}}</td>
                    <td class="text-center">
                        
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalDetail{{$data -> id_tpiutang}}">
                            Detail
                          </button>
                       
                        
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

@foreach ($piutang as $data)
@if ($data->status_tpiutang == 'Lunas')

  <!-- Modal -->
<div class="modal fade" id="modalDetail{{$data-> id_tpiutang}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detail Pembayaran Hutang {{$data -> name}}</h5>
        </div>
        <div class="modal-body">
            @if ($data -> status_tpiutang != 'Belum dikonfirmasi')
                <b>Status</b> : <br>
                {{$data -> status_tpiutang}}
                <br>
                <br>
            @else
            <b>Status</b> : <br>
            Menunggu konfirmasi
            <br><br>
            @endif
            
            

         <b> Gambar Bukti</b> : 
          <br>
          @if (!empty($data -> bukti_tpiutang))
            <img src="{{ url('gambar/bukti/' . $data -> bukti_tpiutang) }}" width="100%">
          @else
            Gambar bukti tidak diupload
          @endif
          
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          
          
        
        </div>
      </div>
    </div>
  </div>
  @endif
  @endforeach


<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection