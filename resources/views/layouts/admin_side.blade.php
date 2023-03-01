<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">เมนูผู้ดูแลระบบ :: ท่านได้รับสิทธิ์ผู้ดูแลระบบ</li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('home')) ? '' : 'collapsed' }}"
                href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('transaction*')) ? '' : 'collapsed' }}" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-folder-plus"></i><span>บันทึกรายการ</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="transaction-nav" class="nav-content collapse {{ (request()->is('transaction*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('item.deposit') }}" class="{{ (request()->is('transaction/deposit*')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>รายการรับฝากเข้า</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tran.withdraw') }}" class="{{ (request()->is('transaction/withdraw*')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>อนุมัติรายการเบิกถอน</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('member*')) || (request()->is('account*')) ? '' : 'collapsed' }}" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-circle"></i><span>ระบบสมาชิก</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="member-nav" class="nav-content collapse {{ (request()->is('member*')) || (request()->is('account*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('member.list') }}" class="{{ (request()->is('member*')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>รายชื่อสมาชิก</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('account.list') }}" class="{{ (request()->is('account*')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>รายการบัญชี</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gear"></i><span>ตั้งค่าระบบ</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="setting-nav" class="nav-content collapse {{ (request()->is('item*')) || (request()->is('users*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('item.list') }}" class="{{ (request()->is('item*')) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>รายการรับซื้อ</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>ผู้ใช้งานระบบ</span>
                    </a>
                </li>
            </ul>
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
            {{-- <li class="nav-item">
                <a class="nav-link {{ (request()->is('personal/aisave*')) ? '' : 'collapsed' }}"
                    href="#">
                    <i class="bi bi-piggy-bank"></i>
                    <span>ระบบช่วยออมเงิน </span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('personal/aisave*')) ? '' : 'collapsed' }}"
                    href="https://www1.reg.cmu.ac.th/notification/document/GET-LINE-TOKEN.pdf" target="_blank">
                    <i class="bi bi-key"></i>
                    <span>การสร้าง Line Token</span>
                </a>
            </li>
        </li><!-- End Nav -->
    </ul>
</aside><!-- End Sidebar-->
