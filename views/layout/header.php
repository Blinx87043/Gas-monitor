<nav class="app-header navbar navbar-expand bg-body">
  <!--begin::Container-->
  <div class="container-fluid">
    <!--begin::Start Navbar Links-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
    </ul>
    <!--end::Start Navbar Links-->
    <!--begin::End Navbar Links-->
    <ul class="navbar-nav ms-auto">
      <!--begin::User Menu Dropdown-->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img
            src="../../includes/gasmonitor.jpeg"
            class="user-image rounded-circle shadow"
            alt="User Image"
          /> 
          <span class="d-none d-md-inline"><?php echo $_SESSION['user_email']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <!--begin::User Image-->
          <li class="user-header text-bg-primary">
            <img
              src="../../includes/gasmonitor.jpeg"
            class="user-image rounded-circle shadow"
            alt="User Image"
            /> 
            <p>
              <?php echo $_SESSION['user_email']; ?>
              <small>Administrador</small>
            </p>
          </li>
          <!--begin::Menu Footer-->
          <li class="user-footer">
            <a href="../../logout.php" class="btn btn-outline-danger float-end">Cerrar sesion</a>
          </li>
          <!--end::Menu Footer-->
        </ul>
      </li>
      <!--end::User Menu Dropdown-->
    </ul>
    <!--end::End Navbar Links-->
  </div>
  <!--end::Container-->
</nav>