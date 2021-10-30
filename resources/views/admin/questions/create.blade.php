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
                        <h3 class="mb-0">{{ __('Create Questions') }}</h3>

                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('Question.index') }}">back to list</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    @include('partials._errors')
                    @include('partials._session')

                        <!-- general form elements disabled -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">General Elements</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body"  class="modal" id="AddQueModal">
                                <form action="{{ route('Question.store') }}" method="post" id="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-md-6 labelContent">
                                                <label for="question-type" class="control-label">Question Type</label>
                                            </div>
                                            <div class="col-md-6" >
                                                <!-- Assign a role as well. Default: Faculty -->
                                                <input type="radio" value="mcq" name="question-type" class="pull-left form-group" required="" />
                                                <label for="mcq">&nbsp;&nbsp;MCQ</label>
                                                <br>
                                                <input type="radio" value="tf" name="question-type" class="pull-left form-group" required="" />
                                                <label for="tf">&nbsp;&nbsp;True Or False</label>
                                                <br>

                                                <input type="radio" value="fib" name="question-type" class="pull-left form-group" required="" />
                                                <label for="fib">&nbsp;&nbsp;Fill the Blank</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="question-text" class=" control-label">Question</label>
                                            </div>

                                                <textarea  class="form-control" id="question-text" name="question-text" placeholder="Enter Question..."></textarea>
                                        </div>
                                    </div>
                                    <div class="box mcq">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="question-text" class=" control-label">if question  MCQ</label>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Option 1: </label>
                                                </div>
                                                <div class="col-md-5">
                                                    <input name="option1" type="text" class=""  id="option1" placeholder="Option 1" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="input-group form-group">
                                                    <div class="col-md-6">
                                                        <label>Option 2: </label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input name="option2" type="text" class=""  id="option2" placeholder="Option 2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="input-group form-group">
                                                    <div class="col-md-6">
                                                        <label>Option 3: </label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input name="option3" type="text" class=""  id="option3" placeholder="Option 3" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="input-group form-group">
                                                    <div class="col-md-6">
                                                        <label>Option 4: </label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input name="option4" type="text" class=""  id="option4" placeholder="Option 4" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn_quiz">Save</button>
                                    </div>

                                </form>
                            </div>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
