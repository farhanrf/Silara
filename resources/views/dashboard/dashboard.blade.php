@extends('dashboard.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Priority 1</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $barangMasuk->count() }}</h3>

                        <p>Total Barang Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                    <a href="{{ route('dashboard') }}" class="small-box-footer">Lihat disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $barangKeluar->count() }}</h3>

                        <p>Total Barang Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    <a href="{{ route('dashboard') }}" class="small-box-footer">Lihat disini <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
           <?php $num = 0; ?>
           @foreach($categories as $category)
              <?php $cardColor = ['red', 'purple', 'blue', 'green', 'aqua', 'gray', 'yellow', 'blue', 'olive']; ?>
              <div class="col-lg-4 col-xs-4">
                <div class="small-box bg-{{ $cardColor[$num] }}">
                    <div class="inner">
                        <h3>{{ $categories->count() }}</h3>

                        <p>{{ $category->name }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-signal"></i>
                    </div>
                </div>
              </div>
              <?php $num++; ?>
           @endforeach
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
@push('script')
@endpush
