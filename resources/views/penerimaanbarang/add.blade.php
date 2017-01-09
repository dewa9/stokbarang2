 @extends('layout.master_admin')
 @section('title','Master Barang')
 @section('css')
 <link href="{{ URL::asset('vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
   <!-- Datatables -->
 <link href="{{ URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{ URL::asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
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
                      <input type="hidden" name="rowIdx" id="rowIdxPenerimaan" value="-1" />
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
                          <input class="form-control col-md-7 col-xs-12" name="kode-barang2"  id="kode-brg" type="text" readonly="true">
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
                      <form action="{{url('/penerimaan_barang/store')}}" method="post" class="form-horizontal form-label-left" id="form-penerimaan-barang">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="allItemPenerimaan" id="all-Item-Penerimaan" value="" />
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

                           <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="send-barang" type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                    </form>

                     <table id="datatable-penerimaan" class="table table-striped table-bordered dt-responsive nowrap" data-page-length='25'>
                       <thead>
                          <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th colspan="4" style="text-align:right">Total:</th>
                            <th></th>
                          </tr>
                        </tfoot>
                    </table>
          <!--endtable-->
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
<!-- Datatables -->
    <script src="{{ URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
     <script src="{{ URL::asset('vendors/datatables.helper/datatables_helper.js')}}"></script>
<script src="{{ URL::asset('vendors/js/moment/moment.min.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendors/js/datepicker/daterangepicker.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}" type='text/javascript'></script>
<script src="{{ URL::asset('vendor/jsvalidation/js/jsvalidation.min.js')}}" type='text/javascript'></script>
{!! JsValidator::formRequest('App\Http\Requests\detail_penerimaanRequest', '#form-penerimaan') !!}
{!! JsValidator::formRequest('App\Http\Requests\PenerimaanRequest', '#form-penerimaan-barang') !!}

<script type="text/javascript">
 var notify=null;
  var gentable=null;


  var _initTablePenerimaan = function () {
        var _renderEditColumnPenerimaan = function (data, type, row) {
            if (type == 'display') {
                return ("<div class='btn-group' role='group'>" +
                "<button class='edit btn btn-primary btn-xs' data-toggle='tooltip' rel='tooltip' data-placement='left' title='Edit'><i class='fa fa-edit fa-fw'></i></button>" +
                "<button class='button-delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>"+
                "</div>");
            }
            return data;
        };

  var arrColumnsPenerimaan = [
            { 'data': 'id', 'sClass': 'text-right' }, //
            { 'data': 'kode_barang', 'sClass': 'text-right' }, //
            {'data': 'nama_barang' }, //
            {'data': 'jumlah_barang', 'sClass': 'text-right' },
            { 'data': 'kode_barang', 'mRender': _renderEditColumnPenerimaan, 'sClass': 'text-center' }
        ];

  _GeneralTable(arrColumnsPenerimaan);
  gentable = $('#datatable-penerimaan').DataTable(datatableDefaultOptions)
  .on('click', '.button-delete', function (d) {
            if (confirm('Hapus item ini ?') == false) {
                return;
            }
            var tr = $(this).closest('tr');
            var row = gentable.row(tr);
            if (row.data().ID == 0) {
                row.remove().draw()
                return;
            }
    }).on('click','.edit',function(){
            var tr = $(this).closest('tr');
            var row = gentable.row(tr);
            var data = row.data();
            $('#kode-barang').val(data.kode_barang);
            $('#kode-brg').val(data.kode_barang);
            $('#jumlah-barang').val(data.jumlah_barang);
            $('#rowIdxPenerimaan').val(row.index());
        });
  }

var _GeneralTable = function (arrColumns) {
        var _coldefs = [
  ];
        datatableDefaultOptions.searching = false;
        datatableDefaultOptions.aoColumns = arrColumns;
        datatableDefaultOptions.columnDefs = _coldefs;
        datatableDefaultOptions.autoWidth = false;
        datatableDefaultOptions.ordering = false;
        datatableDefaultOptions.fnDrawCallback = function (oSettings) {
            //show row number
            for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
                $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[i]].nTr).html((i + 1) + '.');
            }
        };
    }

 
  $(document).ready(function(){

      $('#form-penerimaan').submit(function(e){
          e.preventDefault();
          $('#send').button('loading');
          var _datasend=$(this).serializeArray();

          var nama_barang = $('#kode-barang option:selected').text();
          var kode_brg = $('#kode-barang option:selected').val();
          var jml_brg = parseInt($('#jumlah-barang').val());

          $('#form-penerimaan input').attr("disabled", "disabled");
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
                  setTimeout(function() {
                    notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                  }, 2000);

                  var tableItem = {
                    id:kode_brg,
                    kode_barang:kode_brg,
                    nama_barang : nama_barang,
                    jumlah_barang:jml_brg
                  };
                  if(data.idx ==-1){
                    /*var data_found = gentable.rows().data();

                    data_found.data().each(function(value,index){
                      if(value.id == kode_brg)
                      {
                        jml_brg = jml_brg+ value.jumlah_barang;
                        tableItem.jumlah_barang = jml_brg;
                        var row_index = "";
                        row_index=data_found.row().index();
                        data_found.row(row_index).remove().draw();
                        /*var arrdata_change = gentable.data();
                        arrdata_change.splice(row_index,1,tableItem);
                        gentable.clear();
                        gentable.rows.add(arrdata_change);
                      }
                    });*/
                    gentable.row.add(tableItem);

                  }
                  else
                  {
                    var arrData = gentable.data();
                    arrData.splice(data.idx,1,tableItem);
                    gentable.clear();
                    gentable.rows.add(arrData);
                  }
                  gentable.draw();
                  $('#form-penerimaan').trigger('reset');
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
              $('#form-penerimaan input').removeAttr('disabled');
              $('.form-group').removeClass('has-success');
              $('#send').button('reset');
              $('#rowIdxPenerimaan').val(-1);
            }
          });
      });


     $('#form-penerimaan-barang').submit(function(e){
              e.preventDefault();
              var _dataItemPenerimaan = gentable.data();
              var _alldataItemPenerimaanSend = [];

              $(_dataItemPenerimaan).each(function(i,v){
                  _alldataItemPenerimaanSend.push(v);
              });
              $('#all-Item-Penerimaan').val(JSON.stringify(_alldataItemPenerimaanSend));
              $('#send-barang').button('loading');

              var alldata_send=$(this).serializeArray();
              $('#form-penerimaan-barang input').attr("disabled", "disabled");
              $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: alldata_send,
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
                      setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Success</strong> saved!', 'progress': 25});
                      }, 2000);
                      $('#form-penerimaan-barang').trigger('reset');
                  }else
                  {
                    setTimeout(function() {
                        notify.update({'type': 'danger', 'message': '<strong>Failed</strong> tidak ada data yang dikirim!', 'progress': 25});
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
                  $('#form-penerimaan-barang input').removeAttr('disabled');
                  $('.form-group').removeClass('has-success');
                  $('#send-barang').button('reset');
                }
              });
          });


      $('body').tooltip({
            selector: '[rel=tooltip]'
          });

          $('#kode-barang').change(function(){
              $('#kode-brg').val($(this).val());
          });

          $('#datetimepicker1').daterangepicker({
              singleDatePicker: true,
              calender_style: "picker_1",
              format:'YYYY-MM-DD'
        });

      _initTablePenerimaan();
  });
</script>
@endsection