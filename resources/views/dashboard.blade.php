@extends('template.dashboard') 
@section('content')



<!-- page content -->
<div class="right_col" role="main" style="min-height: 837px;">
    
    <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
                <div class="tile_count">
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-bell"></i> Notifikasi</span>
                        <div class="count blue text-center">{{ $jumlahNotifikasi }}</div>
                      </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-users"></i> Teman</span>
                        <div class="count blue text-center">{{ $jumlahTeman }}</div>
                      </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar"></i> Jumlah Hutang (IDR)</span>
                        <div class="count red text-center">{{ number_format($jumlahHutang) }}</div>
                      </div>
                    <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar"></i> Jumlah Piutang (IDR)</span>
                        <div class="count green text-center">{{ number_format($jumlahPiutang) }}</div>
                      </div>
                      
                </div>
                
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Gelar Spesial</h2>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row justify-content-center">
                        @if (!empty($profilMaxHutang))
                        {{-- bokek --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Bokek</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li >
                                    
                                    <img 
                                    @if (!empty($profilMaxHutang->gambar_user))
                                        
                                    src="{{ url('gambar/profil/'.$profilMaxHutang->gambar_user) }}"
                                    @else
                                        
                                    src="{{ asset('template_dashboard/production') }}/images/user.png"
                                    @endif
                                    alt="..." class="img-circle profile_img ">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">{{ $profilMaxHutang->name }}</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp{{ number_format($maxHutang) }},-</h3>
                                <p>Sebanyak ini dia pernah ngutang!</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        @else
                        {{-- bokek --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Bokek</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li >
                                    <img src="{{ asset('template_dashboard/production') }}/images/user.png" alt="..." class="img-circle profile_img ">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">Musimbi</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp900,000,-</h3>
                                <p>Total Hutang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        @endif

                        {{-- baik hati --}}
                        @if (!empty($profilMaxPiutang))
                            
                        
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Baik Hati</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img src="{{ url('gambar/profil/'.$profilMaxPiutang->gambar_user) }}" alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">{{ $profilMaxPiutang->name }}</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp{{ number_format($maxPiutang) }},-</h3>
                                <p>Uang yang pernah dia pinjamkan!</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>

                        @else
                            
                        
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Baik Hati</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img src="{{ asset('template_dashboard/production') }}/images/user.png" alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">Musimbi</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp900,000,-</h3>
                                <p>Total Hutang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        @endif

                        @if (!empty($profilHutangers))
                        {{-- hutangers --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Hutangers</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img 
                                    
                                    @if (!empty($profilHutangers->gambar_user))
                                        
                                    src="{{ url('gambar/profil/'.$profilHutangers->gambar_user) }}"
                                    @else
                                        
                                    src="{{ asset('template_dashboard/production') }}/images/user.png"
                                    @endif
                                    alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">{{ $profilHutangers->name }}</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">{{ $intensitasHutangTerbanyak }}X</h3>
                                <p>Dia pernah pinjam uang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        
                        @else
                        {{-- hutangers --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Hutangers</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img src="{{ asset('template_dashboard/production') }}/images/user.png" alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">Musimbi</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp900,000,-</h3>
                                <p>Total Hutang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        @endif


                        @if (!empty($profilPiutangers))
                        {{-- Piutangers --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Bankir</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img 
                                    
                                    @if (!empty($profilPiutangers->gambar_user))
                                        
                                    src="{{ url('gambar/profil/'.$profilPiutangers->gambar_user) }}"
                                    @else
                                        
                                    src="{{ asset('template_dashboard/production') }}/images/user.png"
                                    @endif
                                    alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">{{ $profilPiutangers->name }}</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">{{ $intensitasPiutangTerbanyak }}X</h3>
                                <p>Total dia pinjemin uang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        
                        @else
                        {{-- Piutangers --}}
                        <div class="col-md-3 col-sm-12  widget widget_tally_box">
                          <div class="x_panel fixed_height_390">
                            <div class="x_title">
                                <h2>Bankir</h2>
                                
                                <div class="clearfix"></div>
                              </div>
                            <div class="x_content">
  
                              <div class="flex">
                                <ul class="list-inline widget_profile_box">
                                  <li>
                                    <a>
                                      <i class="fa fa-trophy"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <img src="{{ asset('template_dashboard/production') }}/images/user.png" alt="..." class="img-circle profile_img">
                                  </li>
                                  <li>
                                    <a>
                                      <i class="fa fa-dollar"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
  
                              <h3 class="name">Musimbi</h3>
  
                              <div class="divider"></div>
                                <h3 style="text-align: center;">Rp900,000,-</h3>
                                <p>Total Piutang</p>
                              <div class="divider"></div>
                              
                            </div>
                          </div>
                        </div>
                        @endif


                        
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-warning red"></i> Coming Soon <i class="fa fa-warning red"></i></h2>
              
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <div class="col-md-12 col-sm-12  ">

                
                <br>

                

                <div>

                  <h4>Recent Activity</h4>

                  <!-- end of user messages -->
                  <ul class="messages">
                    <li>
                      <img src="{{ asset('template_dashboard/production') }}/images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Desmond Davison</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br>
                        <p class="url">
                          <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                          <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                        </p>
                      </div>
                    </li>
                    <li>
                      <img src="{{ asset('template_dashboard/production') }}/images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-error">21</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Brian Michaels</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br>
                        <p class="url">
                          <span class="fs1" aria-hidden="true" data-icon=""></span>
                          <a href="#" data-original-title="">Download</a>
                        </p>
                      </div>
                    </li>
                    <li>
                      <img src="{{ asset('template_dashboard/production') }}/images/img.jpg" class="avatar" alt="Avatar">
                      <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                      </div>
                      <div class="message_wrapper">
                        <h4 class="heading">Desmond Davison</h4>
                        <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                        <br>
                        <p class="url">
                          <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                          <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                        </p>
                      </div>
                    </li>
                  </ul>
                  <!-- end of user messages -->


                </div>


              </div>

              <!-- start project-detail sidebar -->
              
              <!-- end project-detail sidebar -->

            </div>
          </div>
        </div>
      </div>

      



      



      
    </div>
  </div>

{{-- {{ dd($dataPiutangers) }} --}}
{{-- {{ dd($profilMaxHutang) }} --}}
<!-- /page content -->

@endsection


