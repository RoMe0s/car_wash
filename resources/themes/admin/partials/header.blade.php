<header>

    <!-- Sidebar navigation -->

    <ul id="slide-out" class="side-nav sn-bg-1 custom-scrollbar">

        <!-- Logo -->

        <li>

            <div class="logo-wrapper waves-light">

                <a {!! anchor_link(route('admin')) !!}>
                    <img src="{!! Theme::asset('images/logo/logo.png') !!}" class="img-fluid flex-center" alt="{!! config('app.name', "") !!}">
                </a>

            </div>

        </li>

        <!--/. Logo -->

        <div class="sidenav-bg mask-strong"></div>

                <!--Search Form-->

        <li>

            <form class="search-form" role="search">

                <div class="form-group waves-light">

                    <input type="text" class="form-control" placeholder="Поиск">

                </div>

            </form>

        </li>

        <!--/.Search Form-->

    </ul>

    <!--/. Sidebar navigation -->

    <!-- Navbar -->

    <nav class="navbar navbar-toggleable-md navbar-dark scrolling-navbar double-nav hidden">

        <!-- SideNav slide-out button -->

        <!--div class="float-left">

            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>

        </div-->

        <!-- Breadcrumb-->

        <div class="breadcrumb-dn mr-auto">

            <p>clean.crm</p>

        </div>

        <ul class="nav navbar-nav nav-flex-icons ml-auto">            

          <li class="nav-item">

              <a href="?support.html" class="nav-link"><i class="fa fa-comments-o"></i> <span class="hidden-sm-down">Поддержка</span></a>

          </li>

          <li class="nav-item">

              <a href="tel:#" class="nav-link"> <span class="hidden-sm-down">+7 (495) 333-33-33</span></a>

          </li>

        </ul>

    </nav>

    <!-- /.Navbar -->

</header>

<!--/.Double navigation-->
