@include('admin.dashboard.head')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.dashboard.sidebar')

  <!-- Content Wrapper. Contains page content -->
 @yield('dashboardcontent')
  <!-- /.content-wrapper -->
  @include('admin.dashboard.footer')