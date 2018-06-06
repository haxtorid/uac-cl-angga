@extends('master')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="{{ url('mail/compose')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Email</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li class="{{ (@$page == "Inbox" ? "active":"" )}}"><a href="{{ url('mail/')}}"><i class="fa fa-inbox"></i> Inbox
              <li class="{{ (@$page == "SentBox" ? "active":"" )}}"><a href="{{ url('mail/sent' )}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
        
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        @yield('mailcontent')
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
@endsection
