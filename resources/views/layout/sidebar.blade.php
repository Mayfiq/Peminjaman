<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="/"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('kategori') ? 'active' : '' }}">
                                <a href="/kategori"><i class="menu-icon fa fa-edit"></i> Daftar Kategori </a>
                            </li>

                            <nav class="navbar navbar-expand-sm navbar-default">
                                <div id="main-menu" class="main-menu collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="{{ Request::is('barang') ? 'active' : '' }}">
                                            <a href="/barang"><i class="menu-icon fa fa-book"></i>Daftar Barang </a>
                                        </li>
                                        
 {{-- <nav class="navbar navbar-expand-sm navbar-default">
                                <div id="main-menu" class="main-menu collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                            <a href="#"><i class="menu-icon fa  fa-handshake-o"></i>History pengembalian </a>
                                        </li>

 <nav class="navbar navbar-expand-sm navbar-default">
                                <div id="main-menu" class="main-menu collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                            <a href="#"><i class="menu-icon fa fa-clock-o "></i>History Peminjaman </a>
                                        </li> --}}


                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                <a href="#"><i class="menu-icon fa fa-sign-out"></i>Keluar</a>
                            </li>
</aside>
