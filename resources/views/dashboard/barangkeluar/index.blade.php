@extends('dashboard.layouts.master')
@section('title', 'Barang Keluar')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Barang Keluar
            <small>Simomen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Barang Keluar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row pull-right">
            <div class="col-md-3">
                <p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBarangKeluar">
                        Tambahkan Barang Keluar
                    </button>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Barang Keluar Saat Ini</h3>
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
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($barangKeluar->count() > 0)
                               @foreach($barangKeluar as $barangKeluar)
                                   <tr>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->id }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->name }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->device->no_registration }} - {{ $barangKeluar->device->name }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->date }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->location->name }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->users->name }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->status }}</td>
                                       <td style="vertical-align: middle;">{{ $barangKeluar->category->name }}</td>
                                       <td style="vertical-align: middle;">
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <a href="{{ route('barangkeluar.show', $barangKeluar->id)  }}" class="btn btn-info">
                                                       Edit
                                                   </a>
                                               </div>
                                               <div class="col-md-4">
                                                   <form action="{{route('barangkeluar.destroy', $barangKeluar->id)}}" method="POST">
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
                               <td>Data Not Available</td>
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

        <div class="modal fade" id="createBarangKeluar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Tambahkan Barang Keluar</h4>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('barangkeluar.store') }}" enctype="multipart/form-data">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{ csrf_field() }}

                                <div class="box-body">
                                   <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Nama Barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Device Id</label>
                                        <select class="form-control select2" style="width: 100%;" name="device_id">
                                            @foreach($devices as $device)
                                                <option value='{{ $device->id }}'>{{ $device->no_registration }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Location</label>
                                        <select class="form-control select2" style="width: 100%;" name="location_id">
                                            @foreach($locations as $location)
                                                <option value='{{ $location->id }}'>{{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <select class="form-control select2" style="width: 100%;" name="category_id">
                                            @foreach($categories as $category)
                                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="box-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary pull-right">Tambahkan</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
