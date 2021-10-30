@include('website.header')

<!-- Back to top button -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Appointments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create of Appointments</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->



        <div class="row">
            <div class="col-lg-8">


                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Create Appointment</h3>
                    <form action="{{ route('appointments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('partials._errors')
                        @include('partials._session')


                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="email">Name Of Hospital</label>

                                <select class="browser-default custom-select" name="category_id" id="category" class="form-control">
                                    <option selected>Select category</option>
                                    @foreach($hospital as $hospital)
                                        <option value=" {{ $hospital->id }} ">{{ $hospital->nameOfHospital }}</option>
                                    @endforeach

                                </select>

                                <label for="email">Day</label>

                                <select class="browser-default custom-select" name="day" id="day" class="form-control">

                                </select>
                            </div>



                            <div class="col-md-6">

                                <label for="email">vaccines</label>
                                <select class="browser-default custom-select" name="subcategories_id" id="subcategory" class="form-control">

                                </select>
                                <label for="email">date</label>

                                <select  class="browser-default custom-select save-data" name="date" id="date" class="form-control">

                                </select>

                            </div>
                        </div>




                        <div class="form-group">
                            <input type="submit" value="submit" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>


            @include('website.user.sidebar')


        </div> <!-- .row -->


    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .banner-home -->

<footer class="page-footer">
    <div class="container">

        <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
</footer>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#category').on('change',function(e) {
            var cat_id = e.target.value;
            $.ajax({
                url:"{{ route('subCat') }}",
                type:"GET",
                data: {
                    cat_id: cat_id
                },
                success:function (data) {
                    //console.log(cat_id)
                    $('#subcategory').empty();
                    $('#num').empty();

                    $.each(data.subcategories,function(index,subcat){
                           //console.log(subcat)
                        $('#subcategory').append('<option value="'+subcat.id+'">'+subcat.name+ '' +


                            '</option>');








                    })
                }
            })
        });
    });
</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#category').on('change',function(e) {
            var cat_id = e.target.value;
            $.ajax({
                url:"{{ route('subDay') }}",
                type:"GET",
                data: {
                    cat_id: cat_id
                },
                success:function (data) {
                   console.log(cat_id)
                    $('#day').empty();
                    $('#day').append('<option  selected></option>');
                    $.each(data.subcategories,function(index,subcat){
                        //console.log(subcat)
                        $('#day').append('<option value="'+subcat.id+'">'+subcat.day+ '' +


                            '</option>');








                    })
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#day').on('change',function(event) {

        event.preventDefault();
        let name = $("select[name=category_id]").val();
        let day = $("select[name=day]").val();
        $.ajax({
            url:"/ajax-request",
            type:"GET",
            data: {
                name: name,
                day:day
            },
            success:function (data) {

                $('#date').empty();

                $.each(data.subcategories, function (index, subcat) {
                    $('#date').append('<option value=" ' + subcat.id + '">' +

                        '' + subcat.date + '' +
                        '|' +
                        '' + subcat.time + '' +
                        '|' +


                        '</option>');
                })
            }
        })

    });
</script>

