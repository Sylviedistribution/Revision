<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEtudiant"
           aria-expanded="true" aria-controls="collapseEtudiant">
            <i class="fas fa-address-card"></i>
            <span>Etudiants</span>
        </a>
        <div id="collapseEtudiant" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnalités:</h6>
                <a class="collapse-item" href="{{ route('etudiants-liste') }}">Lister</a>
                <a class="collapse-item" href="{{ route('etudiants-create') }}">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUE"
           aria-expanded="true" aria-controls="collapseUE">
            <i class="fas fa-book"></i>
            <span>Unites d'enseignement</span>
        </a>
        <div id="collapseUE" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnalités:</h6>
                <a class="collapse-item" href="{{ route('ue-liste') }}">Lister</a>
                <a class="collapse-item" href="{{ route('ue-create') }}">Ajouter</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMatiere"
           aria-expanded="true" aria-controls="collapseMatiere">
            <i class="fas fa-pencil-alt"></i>
            <span>Matieres</span>
        </a>
        <div id="collapseMatiere" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnaités</h6>
                <a class="collapse-item" href="{{ route('matieres-liste') }}">Lister</a>
                <a class="collapse-item" href="{{ route('matieres-create') }}">Ajouter</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNote"
           aria-expanded="true" aria-controls="collapseNote">
            <i class="fas fa-check-circle "></i>
            <span>Notes</span>
        </a>
        <div id="collapseNote" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fonctionnalités:</h6>
                <a class="collapse-item" href="{{ route('notes-liste') }}">Lister</a>
                <a class="collapse-item" href="{{ route('notes-create') }}">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->
