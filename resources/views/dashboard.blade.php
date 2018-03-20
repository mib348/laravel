@include('layouts.header')

<h3 class="box-title">Dashboard</h3>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Pages</span>
          <span class="info-box-number">{{$pages}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-sticky-note"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Posts</span>
          <span class="info-box-number">{{$posts}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="fa fa-sticky-note"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Users</span>
          <span class="info-box-number">{{$users}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>


@include('layouts.footer')