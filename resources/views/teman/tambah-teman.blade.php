@extends('template.dashboard')

@section('content')
<div class="right_col" role="main" style="min-height: 942px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Teman</h3>
            </div>

            
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a class="btn btn-danger" href="/teman">Kembali</a>
                            
                            
                            <div class="clearfix"></div>
                        </div>
                        @if ($profilUser->nomor_hp == Auth::user()->id)
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
                                &nbsp;&nbsp;Tolong daftarkan nomor Hp Anda terlebih dahulu!
                                <a href="/profil" class="btn btn-sm btn-warning">Profil</a>
                            </div>
                        </div>
                        @endif
                        <div class="x_content">
                            <br>
                                <form
                                    action="/teman/insert-notifikasi"
                                    method="POST"
                                    id="demo-form2"
                                    data-parsley-validate=""
                                    class="form-horizontal form-label-left"
                                    novalidate="">
                                    @csrf
                                    
                                    <div class="item form-group"
                                    @if ($profilUser->nomor_hp == Auth::user()->id)
                                        style="display:none;"
                                    @endif
                                    
                                    >
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomor_hp">Nomor HP
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="nomor_hp" name="nomor_hp" required="required" class="form-control "></div>
                                        </div>
                                        
                                            
                                            
                                                @error('nomor_hp') 
                                                <div class="item form-group">
                                                    <label
                                                        
                                                        class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                    <div class="col-md-6 col-sm-6 text-danger mb-2">
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                                @enderror
                                                
                                                        
                                                            <div class="ln_solid"></div>
                                                            <div class="item form-group text-center"
                                                            @if (empty($profilUser->nomor_hp))
                                                                style="display:none;"
                                                            @endif
                                                            >
                                                                <div class="col-md-6 col-sm-6 offset-md-3 mt-3">
                                                                    
                                                                    <button type="submit" class="btn btn-success">Tambah</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 "></div>

                                            <div class="col-md-6 "></div>

                                            <div class="col-md-6 col-sm-12 "></div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 "></div>

                                    </div>
                                </div>
@endsection