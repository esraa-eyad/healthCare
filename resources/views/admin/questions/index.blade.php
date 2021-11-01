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
                        <h3 class="mb-0">{{ __('Questions') }}</h3>

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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('Question.create') }}" class="btn btn-sm btn-primary">{{ __('Add question') }}</a>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All  Question </h3>
                            </div>
                            <!-- /.card-header -->

                                <div class="card-body">
                                <table class="table table-bordered">
                                    @include('partials._errors')
                                    @include('partials._session')
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>text</th>
                                        <th>type</th>

                                        <th>Created at</th>

                                        <th>delete</th>


                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $i = 0 ?>

                                    @if ( $qes->count() > 0)

                                    @foreach ($qes as $qes)
                                        <?php $i++ ?>

                                        <tr>
                                            <td>{{ $i}}</td>
                                            <td>{{$qes->question}}</td>
                                            <td>{{$qes->question_type}}</td>

                                            <td>{{$qes->created_at}}</td>

                                          <td><form action="{{ route('Question.destroy',$qes->id) }}" method="post">
                                                  @csrf
                                                  @method('delete')

                                                  <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deleteCourse">

                                              </form>
                                          </td>



                                        </tr>


                                    @endforeach
                                    @endif

                                    </tbody>


                                </table>

                            </div>


                        </div>


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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



