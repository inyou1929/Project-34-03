{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout> --}}

@extends('layouts.masterauthen')
@section('content')

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Password Reset</h4>
                  <p class="mb-0">Enter your email to reset password</p>
                </div>
                <div class="card-body">

                    <!-- Session Status -->
                    @if(session()->has('status'))
                        <span class="text-success mb-4">
                            {{ session('status') }}
                        </span>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                
                        <!-- Email Address -->
                        <div>
                            <label for="email">
                                {{ __("Email") }}
                            </label>
                            <input 
                                type="text" 
                                id="email" 
                                class="form-control form-control-lg block mt-1 mb-2 w-full" 
                                type="email" 
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="example@gmail.com"
                                required 
                                autofocus
                            />
                            @error('email')
                                <span class="text-danger mb-2"> 
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                
                        <button class="btn btn-primary" type="submit">
                            {{ __("Email Password Reset Link") }}
                        </button>
                    </form>

                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Return to Login ?
                    <a href="{{ route ('login') }}" class="text-primary text-gradient font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
