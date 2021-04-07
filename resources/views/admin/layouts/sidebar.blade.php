    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"></sup></div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{ __('Главная') }}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Категории
      </div>


      @can('isSuperadmin')
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="/admin/countries">
          <i class="fas fa-globe-africa"></i>
          <span>Страны</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/universities">
          <i class="fas fa-university"></i>
          <span>Университеты</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/faculty">
          <i class="fas fa-certificate"></i>
          <span>Факультеты</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/speciality">
          <i class="fas fa-briefcase"></i>
          <span>Специальности</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/filial">
          <i class="fas fa-band-aid"></i>
          <span>Филиалы</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/bossManager">
          <i class="fas fa-user-lock"></i>
          <span>Босс Менеджеров</span></a>
      </li>
      @elsecan('isAdmin')
      <li class="nav-item">
        <a class="nav-link" href="/admin/universities">
          <i class="fas fa-university"></i>
          <span>Университеты</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/faculty">
          <i class="fas fa-certificate"></i>
          <span>Факультеты</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/speciality">
          <i class="fas fa-briefcase"></i>
          <span>Специальности</span></a>
      </li>
      @elsecan('isTranslator')
      <li class="nav-item">
        <a class="nav-link" href="/admin/studentsT">
          <i class="fas fa-users"></i>
          <span>Студенты</span></a>
      </li>
      @elsecan('isUniversity')
      <li class="nav-item">
        <a class="nav-link" href="/admin/studentsU">
          <i class="fas fa-users"></i>
          <span>Студенты</span></a>
      </li>

      @elsecan('isManager')
      <li class="nav-item">
        <a class="nav-link" href="/admin/studentsM">
          <i class="fas fa-users"></i>
          <span>Студенты</span></a>
        </li>

      @elsecan('isBossmanager')
      <li class="nav-item">
        <a class="nav-link" href="/admin/manager">
          <i class="fas fa-user"></i>
          <span>Менеджеры</span></a>
      </li>

      @elsecan('isCheck')
      <li class="nav-item">
        <a class="nav-link" href="/admin/check">
          <i class="fas fa-file"></i>
          <span>Квитанции</span></a>
      </li>

      @elsecan('isShartnoma')
      <li class="nav-item">
        <a class="nav-link" href="/admin/studentsSh">
          <i class="fas fa-users"></i>
          <span>Студенты</span></a>
        </li>
      @endcan

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>