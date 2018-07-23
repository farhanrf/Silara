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
                    <a href="{{ route('barangkeluar.index') }}" class="btn btn-primary">
                        Kembali ke Daftar
                    </a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Perbaharui</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" role="form" method="POST" action="{{ route('barangkeluar.update', $barangKeluar->id) }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        {{ method_field('put') }}

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


                            <div class="box-body">
                               <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{ $barangMasuk->date }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nama Barang" value="{{ $barangKeluar->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Device Id</label>
                                    <select class="form-control select2" style="width: 100%;" name="device_id" value="{{ $barangKeluar->device_id }}">
                                        @foreach($devices as $device)
                                            <option value="{{ $device->id }}" {{ ( $barangKeluar->device_id == $device->id ) ? 'selected' : '' }}>{{ $device->no_registration }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Location</label>
                                    <select class="form-control select2" style="width: 100%;" name="location_id" value="{{ $barangKeluar->location_id }}">
                                        @foreach($locations as $location)
                                          <option value="{{ $location->id }}" {{ ( $barangKeluar->location_id == $location->id ) ? 'selected' : '' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">

                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select class="form-control select2" style="width: 100%;" name="category_id" value="{{ $barangMasuk->category_id }}">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ ( $barangKeluar->category_id == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
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
