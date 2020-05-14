@extends('layouts.app')

@section('title')
お問い合わせフォーム
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}" type="text/css" />
@endsection

@section('content')
      <div class="container">
  
        <div class="contact-form">

          <div class="title">
            <h1>お問い合わせ</h1>
          </div>
          <form action="{{ action('ContactController@create') }}" method="post">
             
            <div class="contents">
             
              <div class="name">
                <label>名前</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
    
              <div class="mailaddress">
                <label>メールアドレス</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
    
              <div class="contact">
                <label>お問い合わせ内容</label>
                <textarea name="body" id="" cols="30" rows="10"></textarea>
              </div>
            </div>
            
            <button class="send-btn">送信する</button>
            @csrf
  
          </form>
        </div>
      </div>

@endsection