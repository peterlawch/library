


  <div>
      <nav class="navbar navbar-default">
      <!--<form action="language" method="post">
        <select name = "locale">
          <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>English</option>
          <option value="ch" {{ App::getLocale() == 'ch' ? 'selected' : '' }}>Chinese</option>
        </select>
        {{ csrf_field() }}
        <input type="submit" value = "Submit">
      </form>-->
      <!--{{ trans('file.string') }}-->
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
                  <li class="active"><a href="#">{{ __('file.home') }}</a></li>
                  <li><a href="#">{{ __('file.about') }}</a></li>
                  <li><a href="#">Books List</a></li>
                  <li class="form-group col-6 m-t-10">
                    <form class="form-inline" action="language" method="post">
                      <select class="form-control form-control-sm" name = "locale">
                        <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ch" {{ App::getLocale() == 'ch' ? 'selected' : '' }}>中文</option>
                      </select>
                      {{ csrf_field() }}
                      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value = "Go">
                    </form>
                  </li>
              
            <div class="nav navbar-nav is-right col-6 m-t-5" style="overflow: visible">
            <!--            
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
            
          @guest
            <a href="{{route('login')}}" class="navbar-item is-tab">{{ __('file.login') }}</a>
            <a href="{{route('register')}}" class="navbar-item is-tab">{{ __('file.register') }}</a>
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
                <a href="{{route('authors.index')}}" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Authors
                </a>
                <a href="{{route('publishers.index')}}" class="navbar-item">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Publishers
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
          </ul>
        </div>
    </nav>
</div>





