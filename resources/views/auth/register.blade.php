@extends('layouts.app')

@section('title')
新規会員登録
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/signup.css') }}" type="text/css" />
@endsection

@section('content')
    <div class="container">
  
        <div class="signup">

           <div class="title">
             <h1>アカウントを作成</h1>
           </div>
           <form method="POST" action="{{ route('register') }}">
               @csrf
             <div class="name">
               <h3>名前</h3>
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               @error('name')
                    <p class="invalid-feedback" role="alert">{{ $message }}</p>
                @enderror
             </div>
  
             <div class="mailaddres">
               <h3>メールアドレス</h3>
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <p class="invalid-feedback" role="alert">{{ $message }}</p>
                @enderror
             </div>
  
             <div class="password">
               <h3>パスワード</h3>
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <p class="invalid-feedback" role="alert">{{ $message }}</p>
                @enderror
             </div>
  
             <div class="verificarion">
               <h3>もう一度パスワードを入力してください</h3>
               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
             </div>

             <button class="signup-btn">アカウントを作成</button>
  
          </form>
        </div>
    </div>




<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-8">-->
<!--            <div class="card">-->
<!--                <div class="card-header">{{ __('Register') }}</div>-->

<!--                <div class="card-body">-->
<!--                    <form method="POST" action="{{ route('register') }}">-->
<!--                        @csrf-->
                        
<!--                        <div class="form-group row">-->
<!--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>-->

<!--                                @error('name')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">-->

<!--                                @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">-->

<!--                                @error('password')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row mb-0">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Register') }}-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
