<div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
                data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="index.html"><b>
                        <!--This is dark logo icon-->
                        <img src="{{ asset('assets//images/eliteadmin-logo.png') }}" alt="home" class="dark-logo" />
                        <!--This is light logo icon-->
                        <img src="{{ asset('assets/images/eliteadmin-logo-dark.png') }}" alt="home"
                            class="light-logo" />
                    </b><span class="hidden-xs">
                        <!--This is dark logo text--><img src="{{ asset('assets/images/eliteadmin-text.png') }}"
                            alt="home" class="dark-logo" />
                        <!--This is light logo text--><img src="{{ asset('assets/images/eliteadmin-text-dark.png') }}"
                            alt="home" class="light-logo" />
                    </span></a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i
                            class="icon-arrow-left-circle ti-menu"></i></a></li>
                {{-- <li>
                    <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                {{-- </li> --}}
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                {{-- <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" --}}
                        {{-- href="#"> <i class="icon-envelope"></i> --}}
                        {{-- <div class="notify"><span class="heartbit"></span><span class="point"></span></div> --}}
                    {{-- </a> --}}
                    <ul class="#">
                        {{-- <li> --}}
                            {{-- <div class="drop-title">You have 4 new messages</div> --}}
                        </li>
                        {{-- <li> --}}
                            {{-- <div class="message-center"> <a href="#">
                                    <div class="user-img"> <img src="{{ asset('assets//images/users/pawandeep.jpg') }}"
                                            alt="user" class="img-circle"> <span
                                            class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30
                                            AM</span>
                                    </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="{{ asset('assets//images/users/sonu.jpg') }}"
                                            alt="user" class="img-circle"> <span
                                            class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5>
                                        <span class="mail-desc">I've sung a song! See you at</span> <span
                                            class="time">9:10 AM</span>
                                    </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="{{ 'assets//images/users/arijit.jpg' }}"
                                            alt="user" class="img-circle"> <span
                                            class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5>
                                        <span class="mail-desc">I am a singer!</span> <span class="time">9:08
                                            AM</span>
                                    </div>
                                </a> <a href="#">
                                    <div class="user-img"> <img src="{{ asset('assets//images/users/pawandeep.jpg') }}"
                                            alt="user" class="img-circle"> <span
                                            class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02
                                            AM</span>
                                    </div>
                                </a> </div> --}}
                        {{-- </li> --}}
                        {{-- <li> <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong>
                                <i class="fa fa-angle-right"></i> </a></li> --}}
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                {{-- <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                        href="#"><i class="icon-note"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated flipInX">
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 40%"> <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 60%"> <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">
                                <div>
                                    <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 80%"> <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a> </li>
                        <li class="divider"></li>
                        <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i
                                    class="fa fa-angle-right"></i> </a> </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li> --}}
                <!-- /.dropdown -->
                <!-- .Megamenu -->
                {{-- <li class="mega-dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span
                            class="hidden-xs">Mega</span> <i class="icon-options-vertical"></i></a>
                    <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Forms Elements</li>
                                <li><a href="form-basic.html">Basic Forms</a></li>
                                <li><a href="form-layout.html">Form Layout</a></li>
                                <li><a href="form-advanced.html">Form Addons</a></li>
                                <li><a href="form-material-elements.html">Form Material</a></li>
                                <li><a href="form-upload.html">File Upload</a></li>
                                <li><a href="form-mask.html">Form Mask</a></li>
                                <li><a href="form-img-cropper.html">Image Cropping</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>

                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Advance Forms</li>
                                <li><a href="form-dropzone.html">File Dropzone</a></li>
                                <li><a href="form-pickers.html">Form-pickers</a></li>
                                <li><a href="form-wizard.html">Form-wizards</a></li>
                                <li><a href="form-typehead.html">Typehead</a></li>
                                <li><a href="form-xeditable.html">X-editable</a></li>
                                <li><a href="form-summernote.html">Summernote</a></li>
                                <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                                <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>

                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Table Example</li>
                                <li><a href="basic-table.html">Basic Tables</a></li>
                                <li><a href="data-table.html">Data Table</a></li>
                                <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                                <li><a href="responsive-tables.html">Responsive Tables</a></li>
                                <li><a href="editable-tables.html">Editable Tables</a></li>
                                <li><a href="foo-tables.html">FooTables</a></li>
                                <li><a href="jsgrid.html">JsGrid Tables</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Charts</li>
                                <li> <a href="flot.html">Flot Charts</a> </li>
                                <li><a href="morris-chart.html">Morris Chart</a></li>
                                <li><a href="chart-js.html">Chart-js</a></li>
                                <li><a href="peity-chart.html">Peity Charts</a></li>
                                <li><a href="sparkline-chart.html">Sparkline charts</a></li>
                                <li><a href="extra-charts.html">Extra Charts</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-12 m-t-40 demo-box">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-purple"><a
                                            href="http://eliteadmin.themedesigner.in/demos/eliteadmin-inverse/index.html"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-basic fa-fw" data-icon="v"></i><br />Demo
                                            1</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-success"><a
                                            href="http://eliteadmin.themedesigner.in/demos/eliteadmin/index.html"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-basic fa-fw" data-icon="v"></i><br />Demo
                                            2</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-info"><a
                                            href="http://eliteadmin.themedesigner.in/demos/eliteadmin-ecommerce/index.html"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-basic fa-fw" data-icon="v"></i><br />Demo
                                            3</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-inverse"><a
                                            href="http://eliteadmin.themedesigner.in/demos/eliteadmin-horizontal-navbar/index3.html"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-basic fa-fw" data-icon="v"></i><br />Demo
                                            4</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-warning"><a
                                            href="http://eliteadmin.themedesigner.in/demos/eliteadmin-iconbar/index4.html"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-basic fa-fw" data-icon="v"></i><br />Demo
                                            5</a></div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="white-box text-center bg-danger"><a
                                            href="https://themeforest.net/item/elite-admin-responsive-web-app-kit-/16750820"
                                            target="_blank" class="text-white"><i
                                                class="linea-icon linea-ecommerce fa-fw" data-icon="d"></i><br />Buy
                                            Now</a></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>  --}}
                <!-- /.Megamenu -->

                <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <div class="user-profile">
                <div class="dropdown user-pro-body">
                    <div><img src="{{ asset('assets//images/users/varun.jpg') }}" alt="user-img" class="img-circle">
                    </div>
                    <a href="#" class="dropdown-toggle u-dropdown " data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false">Super Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="userprofile"><i class="ti-user"></i> My Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <!-- input-group -->
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>

                <ul class="nav" id="side-menu">
                    <li> <a href="dashboard" class="waves-effect active">
                            <i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
                            <span class="hide-menu"> Dashboard </span></a>
                    </li>

                    <li><a href="#" class=" dropdown-toggle u-dropdown waves-effect  " data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <i data-icon="6"  class="fa fa-cogs"></i> <span class="hide-menu">General<span
                                    class="fa arrow"></span></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="users"><i class="linea-icon linea-basic fa-fw" data-icon="!"></i>
                                    Users</a></li>
                            <li><a href="{{route('leaves.index')}}"><i class="fa fa fa-fort-awesome" data-icon="v"></i> Show leaves</a>
                            </li> 
                            <li><a href="#" class="waves-effect"><i class="fa fa-sitemap" data-icon="v"></i>
                                    Department</a></li>
                            <li><a href="#" class="waves-effect"><i class="fa fa-envelope" data-icon="e"></i>
                                    Email Format</a></li>
                            <li><a href="{{ route('leaves.create') }}" class="waves-effect"><i class="fa fa-file-video-o"
                                        data-icon="2"></i> Add leave</a></li>
                            <li><a href="#" class="waves-effect"><i class="fa icon-key" data-icon="2"></i>
                                    Role</a></li>
                            <li><a href="#" class="waves-effect"><i class="fa fa-key" data-icon="2"></i>
                                    Special Module permision</a></li>
                        </ul>
                    </li>

                </ul>
                </li>


                <li> <a href="#" class="waves-effect"><i data-icon="/" class="ti-announcement"></i>
                        <span class="hide-menu">Announcement</span></a>
                </li>
                <li> <a href="#" class="waves-effect"><i data-icon="&#xe00b;" class="icon-rocket"></i> <span
                            class="hide-menu">Asset<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <!-- asset pages -->
                    </ul>
                </li>

                <li> <a href="#" class="waves-effect"><i data-icon="&#xe008;"
                            class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Attendance
                            Menagment<span class="fa arrow"></span></span></a>
                    <!-- attendance menagment pages -->
                </li>
                <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-institution"></i>
                        <span class="hide-menu">Check Menagment<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <!-- check menagment pages -->
                    </ul>
                </li>
                <li> <a href="upload" class="waves-effect"><i data-icon="O" class="fa fa-file"></i>
                        <span class="hide-menu">Company Document</span></span></a>
                </li>

                <li><a href="#" class=" dropdown-toggle u-dropdown waves-effect" data-toggle="dropdown"
                        role="button" aria-haspopup="true" aria-expanded="false">
                        <i data-icon="6"class="icon-user"></i> <span class="hide-menu">Users<span
                                class="fa arrow"></span></span></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="changepassword"><i class="fa fa-key" aria-hidden="true"data-icon="!"></i>
                                Change password</a></li>
                        <li><a href="userprofile"><i class="fa fa-user" ></i> Update Profile</a></li>
                        <li><a href="users"><i class="fa fa-table" aria-hidden="true" data-icon="v"></i> View
                                User table</a></li>

                    </ul>
                </li>

            </ul>
            </li>

            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
