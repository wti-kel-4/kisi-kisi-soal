<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">SMA Antartika Sidoarjo</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SIM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-desktop"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('admin.question-card.index') }}" class="nav-link">
                    <i class="fas fa-address-card"></i>
                    <span>Kartu Soal</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('admin.question_card.index') }}" class="nav-link">
                    <i class="fas fa-address-card"></i>
                    <span>Kartu Soal</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.question_grid.index') }}" class="nav-link">
                    <i class="fas fa-address-card"></i>
                    <span>Kisi - Kisi Soal</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.basic-competency.index') }}" class="nav-link">
                    <i class="fas fa-address-book"></i>
                    <span>Kompetensi Dasar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.teacher.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.study.index') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.grade.index') }}" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span>Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="fas fa-user-circle"></i>
                    <span>Pengguna</span>
                </a>
            </li>
        </ul>
    </aside>
</div>