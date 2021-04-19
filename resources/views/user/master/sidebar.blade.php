<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item">
                <a href="{{ route('question-card.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Kartu Soal</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('basic-competency.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Kompetensi Dasar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('question-grid.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Kisi - Kisi</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('teacher.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('study.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Mata Pelajaran</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('grade.index') }}" class="nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Kelas</span>
                </a>
            </li>
            <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
            <ul class="dropdown-menu">
                <li><a href="utilities-contact.html">Contact</a></li>
                <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                <li><a href="utilities-subscribe.html">Subscribe</a></li>
            </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>