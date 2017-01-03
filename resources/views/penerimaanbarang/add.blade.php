 @extends('layout.master_admin')
 @section('title','Master Barang')
 @section('css')
  <!-- Datatables -->
 <link href="{{ URL::asset('vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
 @endsection
 
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Barang</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <a href="{{url('/penerimaan_barang/show')}}" class="btn btn-primary pull-right" type="button">Lihat</a>
                  
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Tambah Data</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <form action="{{url('/penerimaan_barang/temp_store')}}" method="post" class="form-horizontal form-label-left" 
                      id="form-penerimaan">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Barang 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              {!! Form::select('kode_barang', $arrbarang, 'Pilih', array('class' => 'form-control','id'=>'kode-barang')) !!}
                              
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  id="kode-brg" type="text" readonly="true">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  id="jumlah-barang" name="jumlah_barang"  required="required" type="number">
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
                  <div class="col-md-6 col-sm-6 col-xs-6">
                      <form action="{{url('/penerimaan_barang/temp_store')}}" method="post" class="form-horizontal form-label-left" id="form-penerimaan">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group">
                             <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              <input class="form-control" readonly="true" type="text" name="tanggal_penerimaan"  id='datetimepicker1'>
                            </div>
                            </div>
                          </div>

                    </form>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
        </div>

@endsection
@section('scripts')
<script src="{{ URL::asset('vendors/js/moment/moment.min.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendors/js/datepicker/daterangepicker.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendor/jsvalidation/js/jsvalidation.min.js')}}" type='text/javascript'></script>
{!! JsValidator::formRequest('App\Http\Requests\MasterBarangRequest', '#form-master') !!}
<script type="text/javascript">
  var notify=null;
  $(document).ready(function(){
      //tooltip
      $('body').tooltip({
        selector: '[rel=tooltip]'
      });

      $('#kode-barang').change(function(){
          $('#kode-brg').val($(this).val());
      });

      $('#datetimepicker1').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_1"
        });


      /*form
      $('#form-master').submit(function(e){
          e.preventDefault();
          $('#send').button('loading');
          var _datasend=$(this).serialize();
          $('#form-master input').attr("disabled", "disabled");
          
          $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: _datasend,
            dataType: 'json',
            beforeSend:function(){
              notify=$.notify('<strong>Sending</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                        });
            },
            success:function(data){
              if(parseInt(data.return)==1)
              {
                $('#form-master').trigger('reset');
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                  }, 2000);
              }
            },
            error:function(xhr,status,errormessage)
            {
              setTimeout(function() {
                    notify.update({'type': 'danger', 'message': '<strong>Failed</strong> ! ', 'progress': 25});
                  });
            },
            complete:function()
            {
              $('#form-master input').removeAttr('disabled');
              $('.form-group').removeClass('has-success');
              $('#send').button('reset');
            }
          });
      });*/
  });
</script>
@endsection