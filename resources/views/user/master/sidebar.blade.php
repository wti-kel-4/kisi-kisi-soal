<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('user.dashboard.index') }}">Kisi - Kisi & Kartu Soal</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('user.dashboard.index') }}">SIM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a href="{{ route('user.dashboard.index') }}" class="nav-link">
                    <i class="fas fa-desktop"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.my-class.index') }}" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span>Kelas Saya</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('user.my-study.index') }}" class="nav-link">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Mata Pelajaran Saya</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Kompetensi Dasar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.my-lesson.index') }}" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Materi </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.my-scope-lesson.index') }}" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Lingkup Materi</span>
                </a>
            </li>
        </ul>
        <div class="mt-2 p-3 hide-sidebar-mini">
            <a href="{{ route('user.question_grid_step_0') }}" class="btn btn-success btn-lg btn-block btn-icon-split">
            <i class="far fa-newspaper"></i> Buat Kisi - Kisi Soal
            </a>
        </div>
        <div class="mt-2 p-3 hide-sidebar-mini">
            <a href="{{ route('user.question_card_step_0') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="far fa-newspaper"></i> Buat Kartu Soal
            </a>
        </div>
    </aside>
</div>