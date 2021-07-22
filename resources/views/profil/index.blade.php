@extends('template.dashboard')

@section('content')
<div class="right_col" role="main" style="min-height: 942px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pengaturan Profil</h3>
            </div>

            
            </div>
            <div class="clearfix"></div>
            
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a class="btn btn-danger" href="/">Kembali</a>
                            
                            
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
                            &nbsp;&nbsp;Gagal, Data tidak berubah!
                        </div>
                    </div>
                    @endif
                        <div class="x_content">
                            <br>
                                <form
                                    action="/profil/update"
                                    method="POST"
                                    id="demo-form2"
                                    data-parsley-validate=""
                                    class="form-horizontal form-label-left"
                                    novalidate=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Email </label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control-plaintext" type="text" data-validate-minmax="10,100" required="required" style="font-weight: bold;" value="{{ $dataUsers -> email }}"></div>
                                    </div>
                                    @error('name') 
                                    <div class="item form-group" style="margin-top:-10px;">
                                        <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                        <div class="col-md-6 col-sm-6 text-danger">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Nama <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" name="name" id="name" data-validate-minmax="10,100" required="required" value="{{ $dataUsers -> name }}"></div>
                                    </div>
                                    @error('name') 
                                    <div class="item form-group" style="margin-top:-10px;">
                                        <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                        <div class="col-md-6 col-sm-6 text-danger">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror

                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="nomor_hp">Nomor HP <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="text" id="nomor_hp" data-validate-minmax="10,100" required="required" 
                                            @if ((!empty($dataProfil-> nomor_hp)) && !($dataProfil-> nomor_hp == $dataProfil->id_user))
                                                readonly
                                                value="{{ $dataProfil -> nomor_hp }}"
                                            @endif
                                            name="nomor_hp"></div>
                                    </div>
                                            @error('nomor_hp') 
                                            <div class="item form-group" style="margin-top:-10px;">
                                                <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                <div class="col-md-6 col-sm-6 text-danger">
                                                    {{$message}}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <select name="gender_user" class="form-control">
                                                        <option value="">Pilih Gender</option>
                                                        @if (!empty($dataProfil -> gender_user))
                                                            
                                                        
                                                            @if ($dataProfil -> gender_user == 'Pria')
                                                            <option selected value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                            @else
                                                                
                                                            <option value="Pria">Pria</option>
                                                            <option selected value="Wanita">Wanita</option>
                                                            @endif
                                                        @else

                                                            <option value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            @error('gender_user') 
                                            <div class="item form-group" style="margin-top:-10px;">
                                                <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                <div class="col-md-6 col-sm-6 text-danger">
                                                    {{$message}}
                                                </div>
                                            </div>
                                            @enderror
                                                
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="gambar_user">Gambar
                                                    
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    @if (!empty($dataProfil -> gambar_user))
                                                        
                                                    <img src="{{ url('gambar/profil/'. $dataProfil->gambar_user) }}" width="20%">
                                                    @else
                                                    <img src="{{ url('gambar/profil') }}/profil_default.jpg" width="20%">
                                                        
                                                    @endif
                                                </div>
                                                </div>
                                                

                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" id="label-error" for="gambar_user">
                                                    <span class="required">&nbsp;</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="file" id="gambar_user" name="gambar_user"   class="form-control "></div>
                                                </div>
                                                @error('gambar_user') 
                                                <div class="item form-group" style="margin-top:-10px;">
                                                    <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                    <div class="col-md-6 col-sm-6 text-danger">
                                                        {{$message}}
                                                    </div>
                                                </div>
                                                @enderror
                                                
                                                
                                                        
                                                            <div class="ln_solid"></div>
                                                            <div class="item form-group ">
                                                                <div class="col-md-6 col-sm-6 offset-md-3 mt-3">
                                                                    
                                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2><i class="fa fa-warning red"></i> Ganti Password <i class="fa fa-warning red"></i> </h2>
                                                        
                                                        
                                                        <div class="clearfix"></div>
                                                    </div>
                                                                            <div class="x_content">
                                                        <br>
                                                            <form action="/profil/update" method="POST" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                                                                <input type="hidden" name="_token" value="PmLLJaQaoY0eAcFXoPZAhM6GzREZTDHVFS4blFOK">                                    
                                                                
                                                                                                    <div class="field item form-group">
                                                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Password <span class="required">*</span></label>
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <input class="form-control" type="text" name="name" id="name" data-validate-minmax="10,100" required="required"></div>
                                                                </div>
                                                                
                                                                <div class="field item form-group">
                                                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Password Baru <span class="required">*</span></label>
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <input class="form-control" type="text" name="name" id="name" data-validate-minmax="10,100" required="required"></div>
                                                                </div><div class="field item form-group">
                                                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="name">Password Konfirmasi <span class="required">*</span></label>
                                                                    <div class="col-md-6 col-sm-6">
                                                                        <input class="form-control" type="text" name="name" id="name" data-validate-minmax="10,100" required="required"></div>
                                                                </div>
                                                                                                                    
                                                                                                                        
                                                                        
                                                                            
                            
                                                                        
                                                                                                                            
                                                                            
                                                                                    
                                                                                        <div class="ln_solid"></div>
                                                                                        <div class="item form-group ">
                                                                                            <div class="col-md-6 col-sm-6 offset-md-3 mt-3">
                                                                                                
                                                                                                <button type="submit" class="btn btn-success">Submit</button>
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
{{-- {{ dd($dataProfil) }} --}}
@endsection

@section('basic-script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
<script src="{{ asset('template_dashboard') }}/vendors/validator/multifield.js"></script>
<script src="{{ asset('template_dashboard') }}/vendors/validator/validator.js"></script>

@endsection

@section('new-script')
<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);

</script>
@endsection