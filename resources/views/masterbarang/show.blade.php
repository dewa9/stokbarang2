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
                <h3>Barang</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                      <a href="{{url('/master_barang/add')}}" class="btn btn-success pull-right" type="button">Tambah</a>
                  
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Data Master</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      <!--table-->
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <table id="datatable-master" class="table table-striped table-bordered dt-responsive nowrap" data-page-length='25'>
             <thead>
                <tr>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Ket.</th>
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
      gentable = $('#datatable-master').DataTable({
          processing: true,
          ajax: '{{url("/master_barang/getData")}}',
          columns:[
                 { data: 'kode_barang',name: 'kode_barang','className':'text-right'},
                { data: 'nama_barang',name: 'nama_barang'},
                 { data: 'jumlah_barang',name: 'jumlah_barang','className':'text-right'},
                  { data: 'satuan',name: 'satuan'},
                   { data: 'keterangan',name: 'keterangan'},
                {
                  "className": "action text-center",
                  "data": null,
                  "bSortable": false,
                  "defaultContent": "" +
                  "<div class='btn-group' role='group'>" +
                  "  <button class='edit  btn btn-primary btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit'></i></button>" +
                  "  <button class='delete btn btn-danger btn-xs' rel='tooltip' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button>" +
                  "<button type=\"button\" class=\"btn btn-success btn-xs detail\" rel='tooltip' data-toggle='tooltip' data-placement='right' title='Detail'><i class='fa fa-list'></i>" +
                  "<span class=\"sr-only\">Action</span></button>" +
                  "</div>"
            }
          ],
          "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
        "order": [[ 1, 'asc' ]]
      });
      
      
  var sbody = $('#datatable-master tbody');
    sbody.on('click','.edit',function(){
      var data = gentable.row($(this).parents('tr')).data();
      window.location.href='/master_barang/edit/'+data.kode_barang;
    }).
    on('click','.delete',function(){
      var data = gentable.row($(this).parents('tr')).data();
      alertify.confirm("Konfirmasi","Anda Yakin Ingin menghapus data?", function (e) {
        if (e) {
          $.post("/master_barang/delete",{'id':data.kode_barang,_token:$('input[name=_token]').val()},function(data,status){
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