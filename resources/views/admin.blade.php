@extends('layouts.dashboard.app')


@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>

                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">

                                    <h3>{{$count_hospital}}</h3>

                                    <p>Hospital</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$count_User}}</h3>

                                    <p>Appointments</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$count_Appointments}}</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$count_post}}</h3>

                                    <p>Post</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->



            </section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">The More Hospital have Appointments</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">

                                        <div id="myfirstchart" style="height: 250px;"></div>
                                    </div>
                                    <!-- /.d-flex -->



                                </div>
                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">The More Vaccine required</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">

                                        <div id="mySecondchart" style="height: 250px;"></div>
                                    </div>
                                    <!-- /.d-flex -->



                                </div>
                            </div>

                            <!-- /.card -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title"></h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                        </p>
                                    </div>
                                    <!-- /.d-flex -->
                                    <div class="chart" id="line-chart" style="height: 250px;"></div>

                                </div>

                            </div>
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">The More Post</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">

                                        <div id="myThirtchart" style="height: 250px;"></div>
                                    </div>
                                    <!-- /.d-flex -->



                                </div>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">

                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">The most vaccine take it</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">

                                        <div id="myfourchart" style="height: 250px;"></div>
                                    </div>
                                    <!-- /.d-flex -->



                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>

@endsection
@push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                    @foreach ($appointments_data as $data)
                {
                    md: "{{ $data->day }}-{{ $data->month}}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'md',
            ykeys: ['sum'],
            labels: ['totle'],
            lineWidth: 3,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
@push('scripts')

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.

            element: 'myfirstchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.

            data: [
                    @foreach ($best_hospital as $data)

                { name: "{{ $data->nameOfHospital }}", value: {{ $data->more }} } ,

                @endforeach


            ],


            // The name of the data record attribute that contains x-values.
            xkey: 'name',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            barSize: 100
        });
    </script>
@endpush
@push('scripts')

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.

            element: 'mySecondchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.

            data: [
                    @foreach ($most_vaccine as $data)

                { name: "{{ $data->name }}", value: {{ $data->more }} } ,

                @endforeach


            ],


            // The name of the data record attribute that contains x-values.
            xkey: 'name',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            barSize: 100
        });
    </script>
@endpush
@push('scripts')

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.

            element: 'myThirtchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.

            data: [
                    @foreach ($posts as $data)

                { name: "{{ $data->nameOfHospital }}", value: {{ $data->more }} } ,

                @endforeach


            ],


            // The name of the data record attribute that contains x-values.
            xkey: 'name',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            barSize: 100
        });
    </script>
@endpush
@push('scripts')

    <script>
        new Morris.Bar({
            // ID of the element in which to draw the chart.

            element: 'myfourchart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.

            data: [
                    @foreach ($most as $data)

                { name: "{{ $data->name }}", value: {{ $data->more }} } ,

                @endforeach


            ],


            // The name of the data record attribute that contains x-values.
            xkey: 'name',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            barSize: 100
        });
    </script>
@endpush
