<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bold text-uppercase">{{ auth()->user()->level == 'admin' ? 'Admin' : 'Kelas '.auth()->user()->wali_murid->kelas->name }}</span>
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
        <span class="menu-header-text">Master</span>
      </li>
      <li class="menu-item {{ request()->is('admin/master-wali-murid', 'admin/master-wali-murid/*') ? 'active' : '' }}">
        <a href="{{ route('admin.master.wali-murid.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Wali Murid">Wali Murid</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
      </li>
      <li class="menu-item {{ request()->is('admin/news', 'admin/news/*') ? 'active' : '' }}">
        <a href="{{ route('admin.news.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i>
          <div data-i18n="Berita">Berita</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('admin/payment', 'admin/payment/*') ? 'active' : '' }}">
        <a href="{{ route('admin.payment.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i>
          <div data-i18n="Pembayaran">Pembayaran</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('admin/class', 'admin/class/*') ? 'active' : '' }}">
        <a href="{{ route('admin.class.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-door"></i>
          <div data-i18n="Kelas">Kelas</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Rekap</span>
      </li>
      <li class="menu-item {{ request()->is('rekap/keuangan-tahunan', 'rekap/keuangan-tahunan/*/*', 'rekap/keuangan-bulanan', 'rekap/keuangan-bulanan/*/*', 'rekap/keuangan-harian', 'rekap/keuangan-harian/*/*') ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-clipboard"></i>
          <div data-i18n="Keuangan">Keuangan</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ request()->is('rekap/keuangan-tahunan', 'rekap/keuangan-tahunan/*/*') ? 'active' : '' }}">
            <a href="{{ route('admin.reporting.finance.yearly.index') }}" class="menu-link">
              <div data-i18n="Tahunan">Tahunan</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('rekap/keuangan-bulanan', 'rekap/keuangan-bulanan/*/*') ? 'active' : '' }}">
            <a href="{{ route('admin.reporting.finance.monthly.index') }}" class="menu-link">
              <div data-i18n="Bulanan">Bulanan</div>
            </a>
          </li>
          <li class="menu-item {{ request()->is('rekap/keuangan-harian', 'rekap/keuangan-harian/*/*') ? 'active' : '' }}">
            <a href="{{ route('admin.reporting.finance.daily.index') }}" class="menu-link">
              <div data-i18n="Harian">Harian</div>
            </a>
          </li>
        </ul>
      </li>
      @elseif (auth()->user()->level == 'wali murid')
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
      </li>
      <li class="menu-item {{ request()->is('wali-murid/news', 'wali-murid/news/*') ? 'active' : '' }}">
        <a href="{{ route('wali.murid.news.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i>
          <div data-i18n="Berita">Berita</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('wali-murid/payment', 'wali-murid/payment/*') ? 'active' : '' }}">
        <a href="{{ route('wali.murid.payment.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i>
          <div data-i18n="Pembayaran">Pembayaran</div>
        </a>
      </li>
      <li class="menu-item {{ request()->is('wali-murid/class', 'wali-murid/class/*') ? 'active' : '' }}">
        <a href="{{ route('wali.murid.class.index') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-door"></i>
          <div data-i18n="Kelas">Kelas</div>
        </a>
      </li>
      @endif
    </ul>
</aside>