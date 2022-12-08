<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown">
        <a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Barang</li>
      <li class="dropdown">
        <a href="{{route('barang.masuk')}}" class="nav-link"><i class="fas fa-arrow-right"></i><span>Barang Masuk</span></a>
      </li>
      <li class="dropdown">
        <a href="{{ route('barang.keluar') }}" class="nav-link"><i class="fas fa-arrow-left"></i><span>Barang Keluar</span></a>
      </li>
      <li class="menu-header">Rekap Barang</li>
      {{-- content --}}
    </ul>      
  </aside>
</div>