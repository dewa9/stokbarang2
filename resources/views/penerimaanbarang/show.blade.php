 @extends('layout.master_admin')
 @section('title','Master Barang')
 @section('css')
  <!-- Datatables -->
 <link href="{{ URL::asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
 <link href="{{ URL::asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('vendors/alertify/css/alertify.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('vendors/alertify/css/default.min.css')}}" rel="stylesheet">
 @endsection
 @section('content')
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Penerimaan Barang</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <a href="{{url('/penerimaan_barang/add')}}" class="btn btn-success pull-right" type="button">Tambah</a>
                  
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Data Barang Masuk</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <form action="{{url('/penerimaan_barang/temp_store')}}" method="post" class="form-horizontal form-label-left" 
                      id="form-penerimaan">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="Id" id="id-detail" />
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
                      <!--table-->
          <table id="datatable-penerimaan" class="table table-striped table-bordered dt-responsive nowrap" data-page-length='25'>
		  <colgroup>
				<col style="width:200px"></col>
				<col></col>
				<col></col>
				<col ></col>
			</colgroup>
             <thead>
                <tr>
                  <th>Tanggal</th>
				  <th>Nama Barang</th>
                  <th>Kode Barang</th>
                  <th>Jumlah</th>
                  <th></th>
                </tr>
              </thead>
          </table>
          <!--endtable-->
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
    <script src="{{ URL::asset('vendors/alertify/js/alertify.min.js')}}"></script>
<script type="text/javascript">
  var notify=null;
  var gentable = null;
  $(document).ready(function(){
      //datatable
      gentable = $('#datatable-penerimaan').DataTable({
          processing: true,
          ajax: '{{url("/penerimaan_barang/getData")}}',
          columns:[
                 { data: 'relasi_penerimaan[0].tanggal_penerimaan',name: 'relasi_penerimaan.tanggal_penerimaan'},
				 { data: 'relasi_master.nama_barang',name: 'relasi_master.nama_barang'},
                { data: 'master_barang_id',name: 'master_barang_id'},
                 { data: 'jumlah_penerimaan',name: 'jumlah_penerimaan','className':'text-right'},
                {
                  "className": "action text-center",
                  "data": null,
                  "bSortable": false,
                  "defaultContent": "" +
                  "<div class='btn-group' role='group'>" +
                  "  <button class='edit  btn btn-primary btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='left' title='Edit'><i class='fa fa-edit'></i></button>" +
                  "  <button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>" +
                  "<button type=\"button\" class=\"btn btn-success btn-xs detail\" rel='tooltip' data-toggle='tooltip' data-placement='right' title='Detail'><i class='fa fa-list'></i>" +
                  "<span class=\"sr-only\">Action</span></button>" +
                  "</div>"
            }
          ],
          "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                 "visible": false, 
                "targets": 0
            }],
            "order": [[ 0, 'asc' ]],
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            api.column(0, {page:'current'} ).data().each( function ( group, i ) {
              if ( last !== group ) {
                $(rows).eq( i ).before(
                  '<tr class="group"><td colspan="3">'+'Tanggal Penerimaan '+group+'</td></tr>'
                );
                last = group;
              }
            });
           
             
        }
      });
      
      
  var sbody = $('#datatable-penerimaan');
    sbody.on('click','.edit',function(){
      var data = gentable.row($(this).parents('tr')).data();
      //window.location.href='/master_barang/edit/'+data.kode_barang;
    }).
    on('click','.delete',function(){
      var data = gentable.row($(this).parents('tr')).data();
	  
      alertify.confirm("Konfirmasi","Anda Yakin Ingin menghapus data?", function (e) {
        if (e) {
          $.post("/detail_penerimaan/delete",{'id':data.id,_token:$('input[name=_token]').val()},function(data,status){
              if(parseInt(data.return)==1){
                alertify.success('Data berhasil dihapus');
                gentable.ajax.reload();
              }else{
                alertify.error('Gagal menghapus');
              }
              
            },'json');
        }
      },function(){});    
    });
      //tooltip
      $('body').tooltip({
        selector: '[rel=tooltip]'
      });
  });
</script>
@endsection