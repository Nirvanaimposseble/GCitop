<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-home-alt mr-2"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ticket" aria-expanded="false" aria-controls="ticket-pages">
          <i class="fas fa-ticket-alt mr-2"></i>
          <span class="menu-title">Ticket Pages</span>
        </a>
      </li>
    @if (auth()->user()->role == 'Service Desk')
    <li class="nav-item">
        <a class="nav-link" href="/agent" aria-expanded="false" aria-controls="agent-pages">
          <i class="fas fa-user-alt mr-2"></i>
          <span class="menu-title">Agent Pages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/lokasi" aria-expanded="false" aria-controls="lokasi-pages">
          <i class="fas fa-map-marker-alt mr-2"></i>
          <span class="menu-title">Lokasi Pages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user" aria-expanded="false" aria-controls="user-pages">
          <i class="fas fa-user-friends mr-2"></i>
          <span class="menu-title">User Pages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/asset" aria-expanded="false" aria-controls="asset-pages">
          <i class="fas fa-cube mr-2"></i>
          <span class="menu-title">Asset Pages</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#kategori" aria-expanded="false" aria-controls="kategori-pages">
          <i class="fas fa-folder-open-o mr-2"></i>
          <span class="menu-title">Kategori</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="kategori">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/subkategori"> Sub Kategori </a></li>
            <li class="nav-item"> <a class="nav-link" href="/kategoriticket"> Kategori Ticket </a></li>
            <li class="nav-item"> <a class="nav-link" href="/kategoriasset"> Kategori Asset </a></li>
          </ul>
        </div>
      </li>
    @endif
    </ul>
</nav> 
