@extends('layouts.main')

@section('main')
    <h1>Add a tweet</h1>

    <form action="/tweets" method="POST">
        @csrf
        <div>
            <label for='tweet-text'> What do you want to tweet (255 characters max)</label>
        </div>
        <div>
            <textarea id='tweet-text' maxLength="255" name="text"></textarea>
            @if ($errors->has('text'))
                @foreach ($errors->get('text') as $message)
                    <pre>{{ $message }}</pre>
                @endforeach
            @endif
        </div>
        <div>
            <button>Add Tweet</button>
        </div>
    </form>
@endsection