@extends('mail.master')

@section('mailcontent')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{ ($page) }}</h3>

    <div class="box-tools pull-right">
      <div class="has-feedback">
        <input type="text" class="form-control input-sm" placeholder="Search Mail">
        <span class="glyphicon glyphicon-search form-control-feedback"></span>
      </div>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="mailbox-controls">
      <!-- Check all button -->
      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
      </div>
      <!-- /.btn-group -->
      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
      <div class="pull-right">
        1-50/200
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
        </div>
        <!-- /.btn-group -->
      </div>
      <!-- /.pull-right -->
    </div>
    <div class="table-responsive mailbox-messages">
      <table class="table table-hover table-striped">
        <tbody>
          @foreach ($mailbox as $email)
          <tr onClick="viewEmail({{ $email->email_id }})">
            <td><input type="checkbox"></td>
            <td class="mailbox-name"><a href="#">{{ $email->compose->user->email }}</a></td>
            <td class="mailbox-subject"><b>{{ $email->compose->Subject }}</b></td>
            <td class="mailbox-attachment"></td>
            <td class="mailbox-date">{{ $email->compose->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- /.table -->
    </div>
    <!-- /.mail-box-messages -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer no-padding">
    <div class="mailbox-controls">
      <!-- Check all button -->
      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
      </div>
      <!-- /.btn-group -->
      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
      <div class="pull-right">
        1-50/200
        <div class="btn-group">
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
        </div>
        <!-- /.btn-group -->
      </div>
      <!-- /.pull-right -->
    </div>
  </div>
</div>
<!-- /. box -->
@endsection

@push('script')
<script>
  function viewEmail(id) {
    window.location = `{{ url('mail/show') }}/` + id;
  }
</script>
@endpush

