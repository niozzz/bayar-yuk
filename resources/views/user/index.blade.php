

@extends('template.dashboard')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kelola User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tabel User</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    @if (session('pesan') == 'berhasil')
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg
                            class="bi flex-shrink-0 me-2"
                            width="24"
                            height="24"
                            role="img"
                            aria-label="Success:">
                            <use xlink:href="#check-circle-fill"/>
                        </svg>
                        <div>
                            &nbsp;&nbsp;Berhasil!, data telah berubah.
                        </div>
                    </div>
                    @elseif (session('pesan') == 'tidak berhasil')
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg
                            class="bi flex-shrink-0 me-2"
                            width="24"
                            height="24"
                            role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill"/>
                        </svg>
                        <div>
                            &nbsp;&nbsp;An example danger alert with an icon
                        </div>
                    </div>
                    @endif
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table
                                        id="datatable"
                                        class="table table-striped table-bordered display responsive nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Nomor Hp</th>
                                                <th>Gender</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $nomor = 1;
                                            @endphp
                                            @foreach ($dataProfilUser as $data)
                                                
                                            
                                            <tr>
                                                <td>{{ $nomor++ }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->nomor_hp }}</td>
                                                <td>{{ $data->gender_user }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        
                                                        <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#resetPassword{{ $data->id_user }}">Reset Password</button>
                                                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteData{{ $data->id_user }}">Hapus</button>

                                                    </div>
                                                </td>
                                            </tr>
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

@foreach ($dataProfilUser as $data)
<!-- Modal -->
<div
    class="modal fade"
    id="deleteData{{$data->id_user}}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data
                    {{$data -> name}}</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus akun
                {{$data -> name}}
                ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="/user/hapus-akun" method="POST">
                @csrf
                <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                <button type="submit"
                    class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach

@foreach ($dataProfilUser as $data)
<!-- Modal Reset -->
<div
    class="modal fade"
    id="resetPassword{{$data->id_user}}"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Reset Password Akun 
                    {{$data -> name}}</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mereset password akun
                {{$data -> name}}
                ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            
            <form action="/user/reset-password" method="POST">
                @csrf
                <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                <button type="submit" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach

<!-- /page content -->

                                        <script
                                            type="text/javascript"
                                            src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                        <script
                                            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                                            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                                            crossorigin="anonymous"></script>
                                        <script
                                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                                            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                                            crossorigin="anonymous"></script>
{{-- {{ dd($piutang) }} --}}
@endsection

@section('basic-script')

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

@endsection

@section('new-script')
    
@endsection