<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @if (auth()->user()->level == 1)
            <li>
                <a href="/">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="label label-success pull-right"></span>
                </a>
            </li>
            <li>
                <a href="/profil">
                    <i class="fa fa-info"></i>
                    Profil
                    <span class="label label-success pull-right"></span>
                </a>
            </li>
            <li>
                <a href="/user">
                    <i class="fa fa-users"></i>
                    User
                    <span class="label label-success pull-right"></span>
                </a>
            </li>
            <li>

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    Keluar
                    <span class="label label-success pull-right"></span>
                </a>

            </li>
            @else
                
            
            <li>
                <a href="/">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="label label-success pull-right"></span>
                </a>
            </li>
            <li>
                <a>
                    <i class="fa fa-users"></i>
                    Teman
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="/teman">Teman Saya</a>
                    </li>
                    <li>
                        <a href="/teman/permintaan">Notifikasi</a>

                    </li>

                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-book"></i>
                    Transaksi
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="/transaksi/hutang">Hutang</a>
                    </li>
                    <li>
                        <a href="/transaksi/piutang">Piutang</a>
                    </li>

                </ul>
            </li>
            <li>
                <a>
                    <i class="fa fa-history"></i>
                    Riwayat
                    <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li>
                        <a href="/history/hutang">Hutang</a>
                    </li>
                    <li>
                        <a href="/history/piutang">Piutang</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="/profil">
                    <i class="fa fa-info"></i>
                    Profil
                    <span class="label label-success pull-right"></span>
                </a>
            </li>
            
            <li>

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    Keluar
                    <span class="label label-success pull-right"></span>
                </a>

            </li>
            @endif
        </ul>
    </div>

</div>