
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/icofont.min.css') }}" rel="stylesheet"> --}}
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
      
      </ol>
       @guest
       {{-- @if (Route::has('login')) --}}
           <li class="nav-item">
               <a class="nav-link" href="/login">{{ __('Login') }}</a>
           </li>
       {{-- @endif --}}

       {{-- @if (Route::has('register')) --}}
           <li class="nav-item">
               <a class="nav-link" href="/register">{{ __('Register') }}</a>
           </li>
       {{-- @endif --}}
   @else
       <li class="nav-item dropdown">
           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               {{ Auth::user()->name }}
           </a>

           <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @auth
            <span  class="text-xs font-bold uppercase">wellcome , {{Auth::user()->name}}</span>
            <form action="/logout" method="post">
            @csrf
                <button type="submit">Logout</button>
            </form> 
            @else 
             <a href="/register" class="text-xs font-bold uppercase">Register</a>  
             <a href="/login" class="ml-3 text-xs font-bold uppercase">login</a>  
            @endauth
           </div>
       </li>
   @endguest
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     {{-- @if(Auth::check())
      <span class="brand-text font-weight-light">{{ Auth::user()->name}}</span>
    @endif --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::check())
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
          @endif
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li>
            <p style="color: aliceblue; margin-left:10px">Blog</p>
            <ul>
              <li class="nav-item">
                <a href="/admin/categories" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý danh mục bai viet
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/posts" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý bài biết
                    {{-- <span class="right badge badge-danger">New</span> --}}
                    <ul>
                      {{-- @foreach($categories as $category)
                      <li><a href="{{ route('product.index',$category->slug)}}">{{ $category->name}}</a></li>
                      @endforeach --}}
                    </ul>
                  </p>
                 
                </a>
              </li>
            </ul>
          </li>
          <li>
            <p style="color: aliceblue; margin-left:10px">Products</p>
            <ul>
              <li class="nav-item">
                <a href="/admin/productcategories" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý danh mục san pham
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/products" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Quản lý san pham
                    {{-- <span class="right badge badge-danger">New</span> --}}
                    <ul>
                      {{-- @foreach($categories as $category)
                      <li><a href="{{ route('product.index',$category->slug)}}">{{ $category->name}}</a></li>
                      @endforeach --}}
                    </ul>
                  </p>
                 
                </a>
              </li>
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('content')

  </div>

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace ('ckeditor',{
    // filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
      filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
      filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
      filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
      filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
      filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
      filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
  });
  </script>
@include('ckfinder::setup')

  <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
  <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>


<!-- jQuery -->
<script src="jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
