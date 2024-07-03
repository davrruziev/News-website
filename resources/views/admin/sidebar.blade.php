<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="assets/img/logo.png" class="header-logo" />
                <span class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.category.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Categories</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.post.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Posts</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('admin.tag.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Tags</span></a>
            </li>
        </ul>
    </aside>
</div>


