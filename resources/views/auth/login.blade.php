@extends('layouts.app')

@section('title')
    <title>Login Aplikasi | Sinar Mutiara Tasikmalaya</title>
@endsection

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Masuk untuk memulai sesi</p>
​
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @if (session('error'))
                @alert(['type' => 'danger'])
                    {{ session('error') }}
                @endalert
            @endif
            <div class="form-group has-feedback">
                <input type="text"
                    name="username" 
                    class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" 
                    placeholder="{{ __('Username') }}"
                    value="{{ old('username') }}">
                <span class="fa fa-user form-control-feedback"></span>
                <p class="text-danger"> {{ $errors->first('username') }}</p>
            </div>
            <div class="form-group has-feedback">
                <input type="password" 
                    name="password"
                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} " 
                    placeholder="{{ __('Password') }}">
                <span class="fa fa-lock form-control-feedback"></span>
                <p class="text-danger">{{ $errors->first('password') }}</p>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Ingat Saya') }}
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </div>
        </form>          
    </div>
</div>
@endsection
