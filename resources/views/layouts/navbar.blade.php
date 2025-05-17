<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <i class="fas fa-graduation-cap me-2"></i>
        <span>Scorify </span>
    </div>
    <div class="list-group list-group-flush">
       
        
        <a class="list-group-item {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
            <i class="fas fa-users"></i>
            <span class="item-text">User</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('mata-pelajaran.*') ? 'active' : '' }}" href="{{ route('mata-pelajaran.index') }}">
            <i class="fas fa-book"></i>
            <span class="item-text">Mata Pelajaran</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('guru.*') ? 'active' : '' }}" href="{{ route('guru.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span class="item-text">Guru</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('murid.*') ? 'active' : '' }}" href="{{ route('murid.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span class="item-text">Murid</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('nilai.index') ? 'active' : '' }}" href="{{ route('nilai.index') }}">
            <i class="fas fa-chart-bar"></i>
            <span class="item-text">Nilai</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('nilai.rekap') ? 'active' : '' }}" href="{{ route('nilai.rekap') }}">
            <i class="fas fa-file-alt"></i>
            <span class="item-text">Rekap Nilai Siswa</span>
        </a>
        
        <a class="list-group-item {{ request()->routeIs('bantuan.*') ? 'active' : '' }}" href="{{ route('bantuan.index') }}">
            <i class="fas fa-question-circle"></i>
            <span class="item-text">Bantuan</span>
        </a>
    </div>
</div>

<style>
    #sidebar-wrapper {
        background-color: #001f3f; 
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
    }
    
    #sidebar-wrapper .sidebar-heading {
        background-color: #001a33; 
        color: white;
        font-weight: 700;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    #sidebar-wrapper .list-group-item {
        background-color: transparent;
        color: rgba(255, 255, 255, 0.8); 
        border: none;
        border-radius: 0;
        margin: 4px 8px;
        border-radius: 6px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
    }
    
    #sidebar-wrapper .list-group-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        transform: translateX(5px);
    }
    
    #sidebar-wrapper .list-group-item.active {
        background: linear-gradient(90deg, #3490dc, #6574cd);
        color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    
    #sidebar-wrapper .list-group-item.active::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background-color: white;
        animation: pulse 1.5s infinite;
    }
    
    @keyframes pulse {
        0% {
            opacity: 0.6;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }
        50% {
            opacity: 1;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }
        100% {
            opacity: 0.6;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }
    }
    
    #sidebar-wrapper .list-group-item i {
        width: 24px;
        text-align: center;
        margin-right: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    #sidebar-wrapper .list-group-item:hover i {
        transform: scale(1.2);
    }
    
    #sidebar-wrapper .list-group-item.active i {
        color: white;
    }
</style>
