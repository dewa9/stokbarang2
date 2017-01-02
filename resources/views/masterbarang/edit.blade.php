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
                    <h2><small>Edit Data</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                      <form action="{{url('/master_barang/update',$model->kode_barang)}}" method="post" class="form-horizontal form-label-left" 
                      id="form-master">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="{{ $model->nama_barang}}" id="nama-barang" name="nama_barang"  required="required" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="{{ $model->jumlah_barang}}" id="jumlah-barang" name="jumlah_barang"  required="required" type="number">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="{{ $model->satuan}}" id="satuan-barang" name="satuan" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan  
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" value="{{ $model->keterangan}}" id="keterangan-barang" name="keterangan" type="text">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Ubah</button>
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
{!! JsValidator::formRequest('App\Http\Requests\MasterBarangRequest', '#form-master') !!}
@endsection