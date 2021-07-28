<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('landing.header')

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
    

    {{-- naviagasi --}}
    @include('landing.navigasi')

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-5">
                        <div class="text-container">
                            <h1> <i class="fa fa-pencil"></i> BayarYuk!</h1>
                            <p class="p-large">Masih nyatet hutang piutang lewat group chat WhatsApp ? Ngapain? BaYu-in aja!!</p>
                            <a class="btn-solid-lg page-scroll" href="login#signup">SIGN UP</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6 col-xl-7">
                        <div class="image-container">
                            <div class="img-wrapper">
                                <img class="img-fluid" src="{{ asset('template_landing') }}/images/credit-card.png" alt="alternative">
                            </div> <!-- end of img-wrapper -->
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310"><defs><style>.cls-1{fill:#2A3F54;}</style></defs><title>header-frame</title><path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z"/></svg>
    <!-- end of header -->




    


    

    

    


    


    


    

    <!-- Testimonials -->
    <div class="slider-2" id="testimoni">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">      
                    
                    <!-- Text Slider -->
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('template_landing') }}/images/lisa.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Wow! Aplikasi ini sangat berguna dalam membantu saya dalam mencatat jumlah hutangnya jennie. Jennie sangat sering berhutang kepada saya, saya sampai kesal karena terlalu banyak hutang yang dia minta ke saya. By The way, terima kasih Millenio telah membuatkan aplikasi ini.</div>
                                        <div class="testimonial-author">Lisa - Penjual Makaroni Telor</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('template_landing') }}/images/putin.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Sebagai seorang pemimpin negara, saya sangat berterima kasih kepada Millenio yang telah membantu membuatkan aplikasi ini. Dengan BaYu, kini saya dapat mencatat hutang piutang negara dengan mudah. Fiturnya lengkap dan tampilannya menarik.</div>
                                        <div class="testimonial-author">Vladimir Putin - Presiden Rusia</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('template_landing') }}/images/gyuri.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Sebagai seorang istri yang bertanggung jawab, saya sangat senang suami saya dapat membuatkan aplikasi ini. Sekarang, saya tidak perlu repot-repot lagi mencatat hutang saya kepada suami saya. Terima kasih suamiku, Millenio.</div>
                                        <div class="testimonial-author">Park Joo Hyun - Ibu Rumah Tangga</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('template_landing') }}/images/cevan.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Saya adalah seorang aktor yang membintangi beberapa film terkenal. Terkadang saya lupa untuk mencatat hutang teman-teman saya di lokasi syuting. Berkat BaYu!, sekarang saya tidak perlu khawatir lagi. Sekarang saya dapat dengan mudah mencatat hutang teman-teman biadab saya yang tidak kunjung bayar hutang.</div>
                                        <div class="testimonial-author">Chris Evan - Aktor Film Adzab</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div> <!-- end of swiper-wrapper -->
                            
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of text slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of testimonials -->


    


    <!-- Footer -->
    @include('landing.footer')
    <!-- end of footer -->


    <!-- Copyright -->
    @include('landing.copyright')
    <!-- end of copyright -->
    
    	
    {{-- script --}}
    @include('landing.script')
</body>
</html>
