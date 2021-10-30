@extends('layouts.dashboard.app')


@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hospitals</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Hospitals Information Table </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>mobile</th>
                                        <th style="width: 40px">email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hospitals as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->nameOfHospital}}</td>
                                            <td>{{$data->mobile}}</td>

                                            <td>{{$data->email}}</td>


                                        </tr>

                                    </tbody>

                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">

                                  {{ $hospitals->links() }}
                                </ul>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card">

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Simple  Table</h3>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 10px">name</th>
                                        <th style="width: 10px">vaccine</th>
                                        <th style="width: 10px">num appointments</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($hospitals as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->nameOfHospital}}</td>

                                            <td>
                                                @foreach($hospital_vaccine as $bb)
                                                    @if($bb->hospital_id == $data->id)
                                                        {{ $bb->name}}|
                                                    @endif
                                                @endforeach
                                            </td>

                                            @foreach($appointments as $bb)
                                                @if($bb->hospital_id == $data->id)
                                                    <td>  {{ $bb->count() }} </td>
                                                    @break // Put this here

                                                @endif
                                            @endforeach


                                        </tr>

                                    </tbody>

                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
