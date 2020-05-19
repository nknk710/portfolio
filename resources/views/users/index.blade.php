@extends('layouts.app')

@section('title')
フォローリスト
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/follow.css') }}" type="text/css" />
@endsection


@section('content')
    <div class="container">

      <div class="title">
        <h1>フォロー一覧</h1>
      </div>

      <div class="follow-list">
        @foreach ($all_users as $user)
          <div class="follow-user">
            @if ($profile->profile_image)
              <img class="profile_img" src="{{ $user->profile_image }}">
            @else
              <img class="profile_img" src="{{ secure_asset('image/ja_2016_01.webp') }}" name="profile_image" alt="">
            @endif
            
            <a href="#">{{ $user->user_name }}</a>
            
            @if (auth()->user()->isFollowed($user->id))
                <div class="px-2">
                    <span class="px-1 bg-secondary text-light">フォローされています</span>
                </div>
            @endif
            <div class="d-flex justify-content-end flex-grow-1">
                @if (auth()->user()->isFollowing($user->id))
                    <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" class="btn btn-danger">フォロー解除</button>
                    </form>
                @else
                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}

                        <button type="submit" class="btn btn-primary">フォローする</button>
                    </form>
                @endif
            </div>
          
          </div>
         @endforeach
      </div>
      <div class="my-4 d-flex justify-content-center">
        {{ $all_users->links() }}
      </div>
        
      
    </div>

@endsection
