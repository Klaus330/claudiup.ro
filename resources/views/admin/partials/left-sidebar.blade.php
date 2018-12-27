<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">

  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a href="{{route('home')}}" class="brand-logo darken-1">
        <img src="/images/logo3.png" alt="">
        <span class="logo-text hide-on-med-and-down">{{config('app.name', 'Claudiu Popa')}}</span>
      </a>
    </h1>
  </div>

  <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="transform: translateX(0%);">
    <li class="no-padding">
      <ul class="collapsible" data-collapsible="accordion">
        <li class="bold active">

          <a class="waves-effect waves-cyan active" href="/dashboard">
            <i class="material-icons">dashboard</i>
            <span class="nav-text">Dashboard</span>
          </a>

        </li>

        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">border_all</i>
            <span class="nav-text">Tables</span>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{route('posts.table')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Posts</span>
                </a>
              </li>

              <li>
                <a href="{{route('comments.table')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Comments</span>
                </a>
              </li>

              <li>
                <a href="{{route('messages.table')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Messages</span>
                </a>
              </li>
              
              <li>
                <a href="{{route('category.index')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Categories</span>
                </a>
              </li>

              <li>
                <a href="{{route('tag.table')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Tags</span>
                </a>
              </li>

              <li>
                <a href="{{route('skill.index')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Skills</span>
                </a>
              </li>

               <li>
                <a href="{{route('projects.index')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Projects</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
      <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 893px; right: 3px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 664px;"></div>
    </div>
  </ul>

<a href="https://pixinvent.com/materialize-material-design-admin-template/html/semi-dark-menu/#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
<i class="material-icons">menu</i>
</a>

</aside>
<!-- END LEFT SIDEBAR NAV-->  