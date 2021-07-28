
<!DOCTYPE html>
<html lang="en">
{{-- head --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Catatan Piutang {{ $profil-> name }}">
    <meta name="author" content="Millenio">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>BayarYuk! - Bayar Hutangmu, lindungi akhiratmu</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('template_landing') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('template_landing') }}/css/fontawesome-all.css" rel="stylesheet">
    <link href="{{ asset('template_landing') }}/css/swiper.css" rel="stylesheet">
	<link href="{{ asset('template_landing') }}/css/magnific-popup.css" rel="stylesheet">
	<link href="{{ asset('template_landing') }}/css/styles.css" rel="stylesheet">

    <!-- Datatables -->
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    {{-- <link href="{{asset('template_dashboard')}}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{asset('template_dashboard')}}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{asset('template_dashboard')}}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"> --}}
    <link href="{{asset('template_dashboard')}}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{asset('template_dashboard')}}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> --}}
    <!-- Custom Theme Style -->
    {{-- <link
    href="{{asset('template_dashboard')}}/build/css/custom.min.css"
    rel="stylesheet"> --}}
    <!-- Font Awesome -->
        <link
            href="{{asset('template_dashboard')}}/vendors/font-awesome/css/font-awesome.min.css"
            rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('template_landing') }}/images/pencil.png">

    <style>
        li#datatable_next.paginate_button.next
        {
            margin-left: 10px;
        }
        li#datatable_previous.paginate_button.previous
        {
            margin-right: 10px;
        }
        div#datatable_paginate.dataTables_paginate.paging_simple_numbers
        {
            text-align: right;
        }
        @media only screen and (max-width: 600px){

            div#datatable_length.dataTables_length
            {
                display: none;
            }
        }

    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    @include('landing.navigasi')
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Catatan Piutang {{ $profil -> name }}</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="/">Home</a><i class="fa fa-angle-double-right"></i><span>Catatan Piutang </span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->


    <!-- Terms Content -->
    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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
                                                <th>Nama Debitur</th>
                                                <th>Jumlah Piutang</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($piutang as $data) @if ($data->status_cpiutang != 'Lunas')
                                            <tr>
                                                <td>{{$data-> nama_debitur}}</td>
                                                <td>Rp{{number_format($data->jumlah_cpiutang)}},-</td>
                                                @php $tanggalcpiutang = strtotime($data-> tanggal_cpiutang); $tanggalcpiutang =
                                                date('d/m/Y', $tanggalcpiutang); @endphp
                                                <td>{{$tanggalcpiutang}}</td>
                                                <td>{{$data -> keterangan_cpiutang}}</td>
                                                
                                                
                                            </tr>
                                            @endif @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- banner hadits --}}
                    <div class="text-container dark mt-5">
                        <p> <b>
                            
                            Dosa belum melunasi hutang tidak akan diampuni sekalipun antum mati syahid</p>
                        </b> 
                        <p>Dalam sebuah hadist dari Abdillah bin ‘Amr bin Al ‘Ash, Rasulullah SAW bersabda: </p>
                        <h4 style="text-align: center;">
                            <b>

                                يُغْفَرُ لِلشَّهِيدِ كُلُّ ذَنْبٍ إِلاَّ الدَّيْنَ
                            </b>
                        </h4>
                        <p>
                            Artinya: “Semua dosa orang yang mati syahid akan diampuni kecuali hutang." 
                            <br>
                            (HR Muslim Nomor 1886).
                        </p>
                    </div>

                    
                    
                    
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic -->
    <!-- end of terms content -->

    
    


    <!-- Footer -->
    @include('landing.footer')
    <!-- end of footer -->


    <!-- Copyright -->
    @include('landing.copyright')
    <!-- end of copyright -->
    

    	
    <!-- Scripts -->
    @include('landing.script')

    {{-- <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );

var table = $('#example').DataTable( {
    responsive: true
} );
    </script> --}}

</body>
</html>