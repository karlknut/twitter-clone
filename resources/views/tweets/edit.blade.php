@extends('layouts.main')

@section('main')
    <h1>Edit tweet</h1>

    <form action="/tweets/{{ $tweet->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for='tweet-text'>What do you want to change the tweet to? (255 characters max)</label>
        </div>
        <div>
            <input id='tweet-text' maxLength="255" name="text" type="text" value="{{ $tweet->text }}">
            @if ($errors->has('text'))
                @foreach ($errors->get('text') as $message)
                    <pre>{{ $message }}</pre>
                @endforeach
            @endif
        </div>
        <div>
            <button>Edit Tweet</button>
        </div>
    </form>
@endsection