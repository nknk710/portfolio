@extends('layouts.app')

@section('title')
お問い合わせ一覧
@endsection

@section('page_css')
<link rel="stylesheet" href="{{ secure_asset('css/contact_index.css') }}" type="text/css" />
@endsection


@section('content')

        <div class="container">
  
          <div class="top-wrapper">
            <div class="title">
              <h2>お問い合わせ一覧</h2>
            </div>
            
          </div>
          @if(count($contacts)>0)

              <div class="contact-list">
                  <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">名前</th>
                                <th width="20%">email</th>
                                <th width="40%">お問い合わせ内容</th>
                                <th width="10%">お問い合わせ日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <th>{{ $contact->name }}</th>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->body }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
              {{ $contacts->links() }}
          @endif
        </div>

      
@endsection