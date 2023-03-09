@extends('components.layout')

@section('title', 'Login')
@section('content')

    <section class="vh-100" style="background-color: #ebebee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img
                                    src="https://d39l2hkdp2esp1.cloudfront.net/img/photo/167882/167882_00_2x.jpg?20190325020656"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{route('authenticate') }}" method="post">
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Joe's Recipes</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>

                                        <div class="form-outline mb-4">
                                            <input name="email" type="email" id="form2Example17"
                                                   class="form-control form-control-lg" value="{{old('email')}}"/>
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="password" type="password" id="form2Example27"
                                                   class="form-control form-control-lg"/>
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input name="remember" value="1" type="checkbox" class="form-check-input"
                                                   id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>


                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                                href="{{url('register') }}"
                                                style="color: #393f81;">Register here</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
