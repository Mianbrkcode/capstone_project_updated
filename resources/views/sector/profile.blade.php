@extends('layouts.app')


@section('header')

    @section('title')
      Profile
    @endsection

@endsection

@section('content')
    

<div class="wrapper">
    
    {{-- sidebar here --}}

    @include('layouts.sidebar')

    <div class="main">
        
        @include('layouts.navigation')
        {{-- navigation bar --}}

        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Admin Dashboard</h4>
                </div>
      
            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-4 mb-5">
                    <div class="row ">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                    class="rounded-circle mt-5" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                    class="font-weight-bold">{{ Auth::user()->responder_name }}</span><span
                                    class="text-black-50">{{ Auth::user()->email}}</span><span> </span>
                            </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">

                                @if (session()->has('success-bt'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success-bt') }}
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Edit Profile</h4>
                                </div>

                                <form action="{{ route('edit_profile') }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="labels" for="name">Name</label>
                                            <input name="responder_name" type="text" class="form-control"
                                                placeholder="Change Name here"
                                                value="{{ old('responder_name', auth()->user()->responder_name) }}">

                                                @error('name')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-12"><label for="email" class="labels">Email</label>
                                            <input name="email" type="text" class="form-control"
                                                placeholder="Change Email here"
                                                value="{{ old('email', auth()->user()->email) }}">

                                                @error('email')
                                                    <div class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid px-4">
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row justify-content-center">

                        <div class="col-md-6 align-items-center  border-right">
                            <div class="p-3 py-5">
                                {{-- For alert message --}}
                                @if (session()->has('password-success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('password-success') }}
                                    </div>
                                @endif

                                @if (session()->has('error-msg'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error-msg') }}
                                    </div>
                                @endif


                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Change Password</h4>
                                </div>
                                <form method="POST" action="{{ route('password.update')}}">
                                    @csrf
                                    @method('patch')

                                    <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label for="current_password" class="labels">Current Pasword</label>
                                                <input id="current_password" type="password" name="current_password" class="form-control"
                                                    placeholder="Enter Current Password">
                                            </div>

                                            @error('current_password')
                                                <div class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <div class="col-md-12"><label for="password" class="labels">New Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                    placeholder="Enter New Password">
                                            </div>

                                            @error('password')
                                                <div class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror

                                            <div class="col-md-12"><label for="password_confirmation" class="labels">Confirm
                                                    Password</label>
                                                <input type="password" id="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Re-enter New Password">
                                            </div>
                                    </div>

                                    @error('password_confirmation')
                                        <div class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror



                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                            type="submit">Save Profile</button></div>
                                    </div>
                                </form>
                        </div>

                    </div>
                </div>
            </div>     
    </main>
        
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>E-Ligtas</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Terms</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

@endsection

@section('scripts')

  

@endsection






