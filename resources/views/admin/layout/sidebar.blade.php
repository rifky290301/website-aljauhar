<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Al Jauhar</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="/admin/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Al-Jauhar
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <i class="fas fa-fw fa-cog"></i>
      <span>Post</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Post :</h6>
        <a class="collapse-item {{ request()->is('admin/artikel') ? 'active' : ''}}" href="/admin/artikel">Post</a>
        <a class="collapse-item {{ request()->is('admin/kategori') ? 'active' : ''}}" href="/admin/kategori">Kategori</a>
        <a class="collapse-item {{ request()->is('admin/tag') ? 'active' : ''}}" href="/admin/tag">Tag</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>User</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">User :</h6>
        <a class="collapse-item {{ request()->is('admin/santri') ? 'active' : ''}}" href="/admin/santri">Santri</a>
        @unlessrole('santri')
        <a class="collapse-item {{ request()->is('admin/user') ? 'active' : ''}}" href="/admin/user">User</a>
        <a class="collapse-item {{ request()->is('admin/jabatan') ? 'active' : ''}}" href="/admin/jabatan">Jabatan</a>
        @endunlessrole
      </div>
    </div>
  </li>
  @unlessrole('santri')
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTree">
      <i class="fas fa-fw fa-cog"></i>
      <span>Setting</span>
    </a>
    <div id="collapseTree" class="collapse" aria-labelledby="headingTree" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Setting :</h6>
        @role('admin')
        <a class="collapse-item {{ request()->is('admin/role') ? 'active' : ''}}" href="/admin/role">Role</a>
        @endrole
        <a class="collapse-item {{ request()->is('admin/biografi') ? 'active' : ''}}" href="/admin/biografi">Biografi</a>
      </div>
    </div>
  </li>
  @endunlessrole
  <hr class="sidebar-divider">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
