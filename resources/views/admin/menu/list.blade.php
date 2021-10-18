@extends('admin.home')
@section('head')

@endsection
@section('dashboardcontent')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách danh mục</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">Action</th>
              </tr>
            </thead>
            <tbody>

@foreach($menus as $menu)
<tr>
    <td>{{$menu->id}}</td>
    <td>{{$menu->name}}</td>
    <td>{{$menu->active}}</td>
    <td>{{$menu->updated_at}}</td>
    <td>
        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/{{$menu->id}}">
            <i class="fas fa-edit"></i>
        </a>
        <buton type="button" class="btn btn-primary btn-sm deleteBtn" index="{{ $menu->id }}">
            <i class="fas fa-trash"></i>
        </buton>

    </td>
</tr>
@endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection

@section('script')
    <script>

            {{--$.ajax({--}}
            {{--    url : '/admin/menus/destroy/{{$menu->id}}'--}}
            {{--})--}}
    </script>
@endsection
