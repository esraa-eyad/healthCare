
@include('website.header')



<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="{{ route('Hospital.profile') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Vaccine</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">index <a class="btn btn-primary ml-lg-3" href="{{ route('vaccine.create') }}">{{ __('create') }}</a>
                    </h3>
                    @include('partials._errors')
                    @include('partials._session')
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>

                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Number') }}</th>

                                <th scope="col">{{ __('available') }}</th>
                                <th scope="col">{{ __('edit') }}</th>
                                <th scope="col">{{ __('delete') }}</th>

                            </tr>

                            </thead>
                            @foreach($hospital_vaccine as $hospital_vaccine)

                                <tbody>

                                <tr>

                                    <td>{{$hospital_vaccine->name}}</td>
                                    <td>{{$hospital_vaccine->numOfVaccine}}</td>

                                @if($hospital_vaccine->numOfVaccine == 0)
                                     <td>unavailable</td>
                                    @else
                                        <td>available</td>
                                    @endif
                                    <td><a class="" href="{{ route('vaccine.edit',$hospital_vaccine->id) }}">{{ __('Edit') }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('vaccine.destroy',$hospital_vaccine->id) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="button" onclick="confirm('{{ __("Are you sure you want to delete this vaccine?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            </tbody>

                            @endforeach

                        </table>


                    </div>
                </div>

            </div>

            @include('website.hospital.sidebar')

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->
