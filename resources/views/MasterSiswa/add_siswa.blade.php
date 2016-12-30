 @extends('layout.master_admin')
 @section('title','Siswa')
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Siswa</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Tambah Data Siswa</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="{{url('/siswa/postdatasiswa')}}" method="post" class="form-horizontal form-label-left" id="form-addsiswa">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIS 
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input class="form-control" name="nis" type="text" maxlength="5">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" maxlength="50">Nama 
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama"  required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea required="required" name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
<script src="{{ URL::asset('vendor/jsvalidation/js/jsvalidation.min.js')}}" type='text/javascript'></script>
{!! JsValidator::formRequest('App\Http\Requests\RequestStoreSiswa', '#form-addsiswa') !!}
<script type="text/javascript">
  var notify=null
  $(document).ready(function(){
      $('#form-addsiswa').submit(function(e){
          e.preventDefault();
          $('#send').button('loading');
          $('#form-mahasiswa input').attr("disabled", "disabled");
          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function(){
              notify=$.notify('<strong>Sedang Menyimpan</strong> Jangan Tutup Halaman ini...', {
                        allow_dismiss: false,
                        showProgressbar: true
                        });
            },
            success:function(data){
              if(parseInt(data.return)==1)
              {
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Berhasil</strong> data berhasil disimpan!', 'progress': 25});
                  }, 2000);
              }
            },
            error:function(xhr,status,errormessage)
            {
              setTimeout(function() {
                    notify.update({'type': 'danger', 'message': '<strong>Gagal</strong> menyimpan data! ', 'progress': 25});
                  });
            },
            complete:function()
            {
              $('#form-addsiswa').removeAttr('disabled').trigger('reset');
              $('.form-group').removeClass('has-success');
              $('#send').button('reset');
            }
          });
      });
  });
</script>
@endsection