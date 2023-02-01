<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? '' : 'collapsed' }}"
                href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">เมนูผู้ใช้งานทั่วไป</li>
        <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('personal')) ? '' : 'collapsed' }}"
                    href="{{ route('user.index') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>ข้อมูลผู้ใช้งาน</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('personal/statement*')) ? '' : 'collapsed' }}"
                    href="{{ route('user.statement') }}">
                    <i class="bi bi-journal-text"></i>
                    <span>Statement บัญชี</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('personal/aisave*')) ? '' : 'collapsed' }}"
                    href="{{ url('/') }}">
                    <i class="bi bi-piggy-bank"></i>
                    <span>ระบบช่วยออมเงิน </span>
                </a>
            </li>
        </li><!-- End Nav -->
    </ul>
</aside><!-- End Sidebar-->
