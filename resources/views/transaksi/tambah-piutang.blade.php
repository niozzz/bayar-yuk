@extends('template.dashboard')

@section('content')
<div class="right_col" role="main" style="min-height: 942px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tambah Piutang</h3>
            </div>

            
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a class="btn btn-danger" href="/transaksi/piutang">Kembali</a>
                            
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                                <form
                                    action="/transaksi/piutang/insert"
                                    method="POST"
                                    id="demo-form2"
                                    data-parsley-validate=""
                                    class="form-horizontal form-label-left"
                                    novalidate="">
                                    @csrf
                                    
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_debitur">Nama Debitur
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            {{-- <input type="text" id="nama_debitur" name="nama_debitur" required="required" class="form-control "> --}}
                                            <select name="id_debitur" id="id_debitur" class="form-control">
                                                <option value="">- Pilih Nama Teman -</option>
                                                @foreach ($teman as $data)
                                                    @if (in_array($data->id, $idTeman))
                                                        
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        

                                        
                                    </div>
                                    @error('id_debitur') 
                                    <div class="item form-group" style="margin-top:-10px;">
                                        <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                        <div class="col-md-6 col-sm-6 text-danger">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror

                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3  label-align" for="jumlah_tpiutang">Jumlah Uang <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="form-control" type="number" name="jumlah_tpiutang" id="jumlah_tpiutang" data-validate-minmax="10,999999999" required="required"></div>
                                    </div>
                                            @error('jumlah_tpiutang') 
                                            <div class="item form-group" style="margin-top:-10px;">
                                                <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                <div class="col-md-6 col-sm-6 text-danger">
                                                    {{$message}}
                                                </div>
                                            </div>
                                            @enderror
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_tpiutang">Tanggal
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input
                                                        id="tanggal_tpiutang"
                                                        name="tanggal_tpiutang"
                                                        class="date-picker form-control"
                                                        placeholder="dd-mm-yyyy"
                                                        type="date"
                                                        required="required"
                                                        onfocus="this.type='date'"
                                                        onmouseover="this.type='date'"
                                                        onclick="this.type='date'"
                                                        onblur="this.type='text'"
                                                        onmouseout="timeFunctionLong(this)">
                                                        <script>
                                                            function timeFunctionLong(input) {
                                                                setTimeout(function () {
                                                                    input.type = 'text';
                                                                }, 60000);
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                @error('tanggal_tpiutang') 
                                                <div class="item form-group" style="margin-top:-10px;">
                                                    <label id="label-error" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                                    <div class="col-md-6 col-sm-6 text-danger">
                                                        {{$message}}
                                                    </div>
                                                </div>
                                                @enderror
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="keterangan_tpiutang">Keterangan
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" id="keterangan_tpiutang" name="keterangan_tpiutang"  required="required" class="form-control "></div>
                                                </div>
                                                @error('keterangan_tpiutang') 
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