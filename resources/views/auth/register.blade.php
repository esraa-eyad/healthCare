@include('website.header')


<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Registered User </h1>
        <div class="container">
            <div class="form-group row">

                <div class="col-md-8">


                </div>
            </div>

        </div>
        <div class="container">
            <div class="form-group row">

                <div class="col-md-8">


                </div>
            </div>

        </div>

        @include('partials._errors')

        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">

            @csrf

            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Name</label>
                    <input  placeholder="Name...." id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>


                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">Email</label>
                    <input  placeholder="Email...." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                     @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">identity</label>
                    <input  placeholder="Number of Identity...." id="name" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" required autocomplete="name" autofocus>
                    @error('identity')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">mobile</label>
                    <input  placeholder="mobile...." id="mobile" type="mobile" class="form-control @error('phone') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                    @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="col-12 "></div>
                <br>
                    @foreach($question as $question)
                    @if($question->question_type=='mcq')
                        <div class="col-12 ">
                                <label for="fullName">{{$question->question}}</label>


                            <select  name="{{$question->id}}"  id="{{$question->id}}" class="custom-select">
                                    <option name="{{$question->id}}" value="{{$question->option_1}}">{{$question->option_1}}</option>
                                    <option name="{{$question->id}}" value="{{$question->option_2}}">{{$question->option_2}}</option>
                                    <option name="{{$question->id}}" value="{{$question->option_3}}">{{$question->option_3}}</option>
                                    <option name="{{$question->id}}" value="{{$question->option_4}}">{{$question->option_4}}</option>
                                </select>

                        </div>
                        <div class="col-12 "></div>
                        <br>

                    @endif
                    @if($question->question_type=='tf')
                        <div class="col-12  ">
                            <label  value="{{$question->id}}" for="fullName">{{$question->question}}</label>

                            <div class="form-check">
                                <input  class="form-check-input" type="radio"  name="{{$question->id}}" value="yes">

                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input  class="form-check-input" type="radio"  name="{{$question->id}}" value="no">
                                <label class="form-check-label">No</label>
                            </div>

                        </div>
                            <div class="col-12 "></div>
                            <br>
                        @endif
                        @if($question->question_type=='fib')
                    <div class="col-12">
                        <label  value="{{$question->id}}">{{$question->question}}</label>
                      <textarea name="{{$question->id}}"  id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                    </div>
                            <div class="col-12 "></div>
                            <br>
                        @endif
                    @endforeach
                <div class="col-12 "></div>
                <br>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">password</label>

                    <input placeholder="Password...." id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <label for="fullName">password confirm</label>

                    <input placeholder="password confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

            </div>



            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->


@include('website.footer')
