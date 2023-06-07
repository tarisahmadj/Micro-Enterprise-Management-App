<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
      <a class="nav-link " href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    {{-- <hr style="border: 1px solid #8e9aba; width:100%;"> --}}
    <li class="nav-item {{ Request::is('usaha*') || Request::is('searchUsaha*') || Request::is('usulusaha*') || Request::is('searchUsulan*') || Request::is('verif*') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#desa" aria-expanded="false" aria-controls="desa">
        <i class="icon-grid-2 menu-icon ti-briefcase mb-1"></i>
        <span class="menu-title">Bumdes</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="desa">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/usaha">Usaha Berjalan</a></li>
          <li class="nav-item"> <a class="nav-link" href="/usulusaha">Usulan Usaha</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item {{ Request::is('akun') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon ti-settings mb-1"></i>
        <span class="menu-title">Akun Anda</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/akun">Profile</a></li>
          <li class="nav-item"> 
            <form action="/logout" method="POST" class="nav-link">
              @csrf
              <button type="submit" class="btn-link">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </li>
    
  </ul>
</nav>