<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Akademik')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --primary-color: #3490dc;
            --secondary-color: #6c757d;
            --success-color: #38c172;
            --accent-color: #f6993f;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --topbar-height: 60px;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        #sidebar-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background-color: #2c3e50;
            overflow-y: auto;
            transition: all 0.4s ease;
            z-index: 1040;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        #sidebar-wrapper.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        #sidebar-wrapper .sidebar-heading {
            height: var(--topbar-height);
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            background-color: #1a2533;
            color: white;
        }
        
        #sidebar-wrapper .list-group {
            width: var(--sidebar-width);
        }
        
        #sidebar-wrapper .list-group-item {
            background-color: transparent;
            color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 0;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
        
        #sidebar-wrapper .list-group-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        #sidebar-wrapper .list-group-item.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        #sidebar-wrapper .list-group-item i {
            margin-right: 1rem;
            width: 20px;
            text-align: center;
        }
        
        #sidebar-wrapper.collapsed .item-text,
        #sidebar-wrapper.collapsed .sidebar-heading span {
            display: none;
        }
        
        #topbar {
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            height: var(--topbar-height);
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            display: flex;
            align-items: center;
            padding: 0 1rem;
            z-index: 1030;
            transition: all 0.4s ease;
        }
        
        #topbar.collapsed {
            left: var(--sidebar-collapsed-width);
        }
        
        #sidebarToggle {
            background-color: transparent;
            border: none;
            color: #3a3a3a;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            transition: all 0.3s;
        }
        
        #sidebarToggle:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        #content-wrapper {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            min-height: calc(100vh - var(--topbar-height));
            padding: 1.5rem;
            transition: all 0.4s ease;
        }
        
        #content-wrapper.collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        .content-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .card {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
            border: none;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .footer {
            margin-left: var(--sidebar-width);
            background-color: #fff;
            border-top: 1px solid #eee;
            padding: 1.5rem 0;
            color: var(--secondary-color);
            transition: all 0.4s ease;
        }
        
        .footer.collapsed {
            margin-left: var(--sidebar-collapsed-width);
        }
        
        .page-header {
            padding: 1.5rem 0;
            margin-bottom: 2rem;
            background-color: rgba(52, 144, 220, 0.05);
            border-radius: 0.5rem;
        }
        
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -280px;
            }
            
            #sidebar-wrapper.collapsed {
                margin-left: 0;
                width: var(--sidebar-width);
            }
            
            #sidebar-wrapper.collapsed .item-text,
            #sidebar-wrapper.collapsed .sidebar-heading span {
                display: inline;
            }
            
            #topbar, #content-wrapper, .footer {
                margin-left: 0;
                left: 0;
            }
            
            #topbar.collapsed, #content-wrapper.collapsed, .footer.collapsed {
                margin-left: 0;
            }
            
            .mobile-backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1039;
                display: none;
            }
            
            .mobile-backdrop.show {
                display: block;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('layouts.navbar')

    <!-- Topbar -->
    <nav id="topbar" class="">
        <button id="sidebarToggle" class="me-2">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle text-decoration-none text-dark" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-1"></i>
                    <span>{{ Auth::user()->name ?? 'User' }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') ?? '#' }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') ?? '#' }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mobile Backdrop -->
    <div class="mobile-backdrop"></div>

    <!-- Page Content -->
    <div id="content-wrapper" class="">
        <div class="content-container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarWrapper = document.getElementById('sidebar-wrapper');
            const contentWrapper = document.getElementById('content-wrapper');
            const topbar = document.getElementById('topbar');
            const footer = document.querySelector('.footer');
            const mobileBackdrop = document.querySelector('.mobile-backdrop');
            
            const sidebarState = localStorage.getItem('sidebarState');
            if (sidebarState === 'collapsed') {
                sidebarWrapper.classList.add('collapsed');
                contentWrapper.classList.add('collapsed');
                topbar.classList.add('collapsed');
                footer.classList.add('collapsed');
            }
            
            sidebarToggle.addEventListener('click', function() {
                sidebarWrapper.classList.toggle('collapsed');
                contentWrapper.classList.toggle('collapsed');
                topbar.classList.toggle('collapsed');
                footer.classList.toggle('collapsed');
                mobileBackdrop.classList.toggle('show');
                
                if (sidebarWrapper.classList.contains('collapsed')) {
                    localStorage.setItem('sidebarState', 'collapsed');
                } else {
                    localStorage.setItem('sidebarState', 'expanded');
                }
            });
            
            mobileBackdrop.addEventListener('click', function() {
                sidebarWrapper.classList.remove('collapsed');
                mobileBackdrop.classList.remove('show');
            });
            
            function handleResponsive() {
                if (window.innerWidth <= 768) {
                    sidebarWrapper.classList.remove('collapsed');
                    contentWrapper.classList.remove('collapsed');
                    topbar.classList.remove('collapsed');
                    footer.classList.remove('collapsed');
                    localStorage.setItem('sidebarState', 'expanded');
                }
            }
            
            window.addEventListener('resize', handleResponsive);
            handleResponsive(); 
        });
    </script>
    @yield('scripts')
</body>
</html>
    