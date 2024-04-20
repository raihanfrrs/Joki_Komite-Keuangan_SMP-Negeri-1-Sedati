<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold text-uppercase">{{ auth()->user()->level }}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ request()->is('/') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="/" class="menu-link">
              <div data-i18n="Analitik">Analitik</div>
            </a>
          </li>
        </ul>
      </li>

      @if (auth()->user()->level == 'admin')
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
      </li>
      <li class="menu-item {{ request()->is('admin/news', 'admin/news/*') ? 'active' : '' }}">
        <a href="{{ route('admin.news.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Berita">Berita</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('admin/payment', 'admin/payment/*') ? 'active' : '' }}">
        <a href="{{ route('admin.payment.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-soup"></i>
          <div data-i18n="Pembayaran">Pembayaran</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('admin/class', 'admin/class/*') ? 'active' : '' }}">
        <a href="{{ route('admin.class.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Kelas">Kelas</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('admin/setting', 'admin/setting/*') ? 'active' : '' }}">
        <a href="{{ route('admin.setting.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Pengaturan">Pengaturan</div>
        </a>
      </li>
      @elseif (auth()->user()->level == 'wali murid')
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
      </li>
      <li class="menu-item">
        <a href="{{ route('wali.murid.news.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Berita">Berita</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-soup"></i>
          <div data-i18n="Pembayaran">Pembayaran</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-soup"></i>
          <div data-i18n="Pembayaran">Asset</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Kelas">Kelas</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Pengaturan">Pengaturan</div>
        </a>
      </li>
      @endif
    </ul>
</aside>