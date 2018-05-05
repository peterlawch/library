


  <div>
      <nav class="navbar navbar-default">
      @if (Request::segment(1) == "manage")
        <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
          <span class="icon">
            <i class="nav navbar-nav navbar-right"></i>
          </span>
        </a>
      @endif
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="#" class="navbar-brand">SCMC LIBRARY</a>
          </div>
          <!-- Collection of nav links and other content for toggling -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Books List</a></li>
              </ul>
              <div class="nav navbar-nav is-right" style="overflow: visible">
          @guest
            <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
            <a href="{{route('register')}}" class="navbar-item is-tab">Join the Community</a>
          @else
            <div class="navbar-item has-dropdown is-hoverable navbar-right">
              <a class="navbar-link">Hey {{Auth::user()->name}}</a>
              <div class="navbar-dropdown is-right lead" >
                <a href="#" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                  </span>Profile
                </a>

                <a href="#" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-bell m-r-5"></i>
                  </span>Notifications
                </a>
                <a href="{{route('manage.dashboard')}}" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Manage
                </a>
                <a href="{{route('categories.index')}}" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Categories
                </a>
                <hr class="navbar-divider">
                <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                  <span class="icon">
                    <i class="fa fa-fw fa-sign-out m-r-5"></i>
                  </span>
                  Logout
                </a>
                @include('_includes.forms.logout')
              </div>
            </div>
          @endguest
          </div>
        </div>
    </nav>
</div>





