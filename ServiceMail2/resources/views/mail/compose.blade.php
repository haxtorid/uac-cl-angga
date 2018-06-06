@extends('mail.master')

@section('mailcontent')
<form action="{{ url('/mail/compose') }}" method="post" enctype="multipart/form-data">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Compose New Message</h3>
    </div>
    <!-- /.box-header -->
    
      @csrf
      <div class="box-body">
        <div class="form-group">
          <input class="form-control" placeholder="To:" name="receiver_email">
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="Subject:" name="subject">
        </div>
        <div class="form-group">
          <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
          </textarea>
        </div>
        <div class="form-group">
          <div class="btn btn-default btn-file">
            <i class="fa fa-paperclip"></i> Attachment
            <input type="file" name="attachment">
          </div>
          <p class="help-block">Max. 32MB</p>
        </div>
      </div>
    
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        {{-- <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button> --}}
        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
      </div>
      {{-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button> --}}
    </div>
  
    <!-- /.box-footer -->
  </div>
</form>
 @endsection

 @push('script')
<script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
 @endpush

 @push('style')
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/flat/blue.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
 @endpush
