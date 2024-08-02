<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('assets/logo-merah.png') }}" alt="AdminLTE Logo" class="brand-image" >
      <span class="brand-text font-weight-light">Peminjaman barang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @auth
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('assets/user-icon.jpeg') }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>
      @endauth

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                  </button>
              </div>
          </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              @foreach ($menudinamis as $menu1)
                  @if ($menu1->TreeLevel == 1 && $menu1->ACCESS != 0 && $menu1->HASACCESS == 1)
                      <li class="nav-item">
                          <a href="{{ $menu1->pathfile }}" class="nav-link">
                              <i class="nav-icon {{ $menu1->ICON }}"></i>
                              <p>{{ $menu1->CAPTION }}</p>
                          </a>
                      </li>
                  @elseif ($menu1->TreeLevel == 1 && $menu1->ACCESS == 0 && $menu1->HASACCESS == 1)
                      <li class="nav-item menu-open">
                          <a href="{{ $menu1->pathfile }}" class="nav-link active">
                              <i class="nav-icon fas {{ $menu1->ICON }}"></i>
                              <p>
                                  {{ $menu1->CAPTION }}
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              @foreach ($menudinamis as $menu2)
                                  @if ($menu2->Parent == $menu1->L1)
                                      @if ($menu2->TreeLevel == 2 && $menu2->ACCESS != 0 && $menu2->HASACCESS == 1)
                                          <li class="nav-item ml-1">
                                              <a href="{{ $menu2->pathfile }}" class="nav-link">
                                                  <i class="{{ $menu2->ICON }} nav-icon"></i>
                                                  <p>{{ $menu2->CAPTION }}</p>
                                              </a>
                                          </li>
                                      @elseif ($menu2->TreeLevel == 2 && $menu2->ACCESS == 0 && $menu2->HASACCESS == 1)
                                          <li class="nav-item menu-open ml-1">
                                              <a href="{{ $menu2->pathfile }}" class="nav-link active">
                                                  <i class="nav-icon fas {{ $menu2->ICON }}"></i>
                                                  <p>
                                                      {{ $menu2->CAPTION }}
                                                      <i class="right fas fa-angle-left"></i>
                                                  </p>
                                              </a>
                                              <ul class="nav nav-treeview">
                                                  @foreach ($menudinamis as $menu3)
                                                      @if ($menu3->Parent == $menu2->L1)
                                                          @if ($menu3->TreeLevel == 3 && $menu3->ACCESS != 0 && $menu3->HASACCESS == 1)
                                                              <li class="nav-item ml-1">
                                                                  <a href="{{ $menu3->pathfile }}" class="nav-link">
                                                                      <i class="{{ $menu3->ICON }} nav-icon"></i>
                                                                      <p>{{ $menu3->CAPTION }}</p>
                                                                  </a>
                                                              </li>
                                                          @elseif ($menu3->TreeLevel == 3 && $menu3->ACCESS == 0 && $menu3->HASACCESS == 1)
                                                              <li class="nav-item menu-open ml-1">
                                                                  <a href="#" class="nav-link">
                                                                      <i class="nav-icon fas {{ $menu3->ICON }}"></i>
                                                                      <p>
                                                                          {{ $menu3->CAPTION }}
                                                                          <i class="right fas fa-angle-left"></i>
                                                                      </p>
                                                                  </a>
                                                              </li>
                                                          @endif
                                                      @endif
                                                  @endforeach
                                              </ul>
                                          </li>
                                      @endif
                                  @endif
                              @endforeach
                          </ul>
                      </li>
                  @endif
              @endforeach
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

