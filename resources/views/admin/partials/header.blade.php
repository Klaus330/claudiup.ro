<!-- START HEADER -->
<header id="header" class="page-topbar">
  <!-- start header nav-->
  <div class="navbar-fixed">
    <nav class="navbar-color">
      <div class="nav-wrapper">

        <ul class="right hide-on-med-and-down">
    
          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
              <i class="material-icons">settings_overscan</i>
            </a>
          </li>

          <li>
            <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
              <span class="avatar-status avatar-online">
                <img src="/images/logo3.png" alt="avatar">
                <i></i>
              </span>
            </a>
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              
              <li class="divider"></li>

              <li>
                <a href="/logout" class="grey-text text-darken-1"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="material-icons">keyboard_tab</i> Logout
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- END HEADER -->
