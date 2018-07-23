@extends('dashboard.layouts.master')
@section('title', 'Data Barang')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Barang
            <small>Simomen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Barang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row pull-right">
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Barang Saat Ini</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Device</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($dataBarang->count() > 0)
                               @foreach($dataBarang as $dataBarang)
                                   <tr>
                                       <td style="vertical-align: middle;">{{ $dataBarang->id }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->name }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->device->no_registration }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->date }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->location->name }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->users->name }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->status }}</td>
                                       <td style="vertical-align: middle;">{{ $dataBarang->category->name }}</td>
                                       <td style="vertical-align: middle;">
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <a href="{{ route('databarang.show', $dataBarang->id)  }}" class="btn btn-info">
                                                       Edit
                                                   </a>
                                               </div>
                                               <div class="col-md-4">
                                                   <form action="{{route('databarang.destroy', $dataBarang->id)}}" method="POST">
                                                       <input type="hidden" name="_method" value="DELETE">
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                       <button type="submit" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger">Delete</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                            @else
                            <tr>
                               <td>Tidak Ada Barang Tersedia</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

         <div class="modal fade" id="createDataBarang">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Import/Export File</h4>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('databarang.store') }}" enctype="multipart/form-data">
                            <div class="panel body">
                 <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action{{url('importproduk')}}">
                 {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-3">
                           <a href="{{url('exportproduk')}}" class="btn btn-success">Export</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-md-3 Excel</label> control-label">File
                        <div class="col-md-3">
                           <input id="file" type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="col-md-3 col-md-offset-3">
                           <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
                </div>
             </div>
        </div>
    </div>
</div>
</section>
    <!-- /.content -->
@endsection
@push('script')
<!-- date-range-picker -->
<script src="/assets/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
    });
</script>
@endpush
