<div class="content-area <?= (isset($_COOKIE['sidebar_opened']) && $_COOKIE['sidebar_opened'] == 'true') ? 'no-sidebar' : '' ?> ">
  <!-- Topbar -->
  <div class="app-header">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Sidebar Toggle (Topbar) -->
      <a class="navbar-brand open-sidebar" data-sidebar-status="<?= (isset($_COOKIE['sidebar_opened']) && $_COOKIE['sidebar_opened'] == 'true') ? 'true' : 'false' ?>">
        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
      </a>
      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-gray" type="button">
              <i class="fa fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-gray" type="button">
                    <i class="fa fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow ">
          <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fa fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-success">
                  <i class="fa fa-donate text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-warning">
                  <i class="fa fa-exclamation-triangle text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
          </div>
        </li>
        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow ">
          <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">7</span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Message Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/source.jpeg" alt="">
                <div class="status-indicator bg-success"></div>
              </div>
              <div class="font-weight-bold">
                <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                <div class="small text-gray-500">Emily Fowler · 58m</div>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/source.jpeg" alt="">
                <div class="status-indicator"></div>
              </div>
              <div>
                <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                <div class="small text-gray-500">Jae Chun · 1d</div>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/source.jpeg" alt="">
                <div class="status-indicator bg-warning"></div>
              </div>
              <div>
                <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/source.jpeg" alt="">
                <div class="status-indicator bg-success"></div>
              </div>
              <div>
                <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                <div class="small text-gray-500">Chicken the Dog · 2w</div>
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
          </div>
        </li>
        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow languages ">
          <a class="nav-link dropdown-toggle" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-globe-europe fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter">en</span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="languageDropdown">
            <h6 class="dropdown-header">
              Languages Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="/language/local/en">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/lang-icons/en-icon.png" alt="">
              </div>
              <div>
                <div class="text-truncate">English</div>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="/language/local/de">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/lang-icons/de-icon.png" alt="">
              </div>
              <div>
                <div class="text-truncate">German</div>
              </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="/language/local/ar">
              <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="/dist/dashboard/images/lang-icons/ar-icon.png" alt="">
              </div>
              <div>
                <div class="text-truncate">Arabic</div>
              </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Get More Languages</a>
          </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">  {{auth()->guard('admin')->user()->username }} </span>
            <img class="img-profile rounded-circle" src="assets/dashboard/dist/images/face-3.jpg">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-600"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-cogs fa-sm fa-fw mr-2 text-gray-600"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-list fa-sm fa-fw mr-2 text-gray-600"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  <!-- End of Topbar -->

  <!-- Start Page Content-->
  <div class="content-wrapper">
    <div class="container-fluid" id="pjax-container">
      <!-- Page Heading -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>
