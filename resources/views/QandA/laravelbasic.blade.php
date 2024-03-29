@extends('layout')

@section('title', 'Question and Answers')

@section('content')
    <h1>Question and Answers</h1>
    <p><a href="/qanda/create">Add Question and Answers</a></p>

    @foreach ($laravelBasic as $key => $question)
        <p><b>Question Number: </b>{{ ++$key }}</p>
        <p><b>Topic: </b>{{ $question->topic }}</p>
        <p><b>Question Type: </b>{{ $question->qtype }}</p>
        <p><b>Question: </b>{{ $question->question }}</p>
        <p><b>Answer: </b>{!! $question->answer !!}</p>
        @isset($question->link)
            <p><b>Link: </b><a href="{{ $question->link }}" target="_blank">{{ $question->link }}</a></p>
        @endisset
        <form action="/qanda/{{ $question->id }}" method="POST">
            @method('DELETE')
            @csrf
            <p>
                <b>Created At: </b>{{ $question->created_at }} |
                <a class="btn btn-primary btn-sm" href="/qanda/{{ $question->id }}/edit" role="button">Edit</a> |
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </p>
        </form>
        <hr>
    @endforeach

    <div class="container">
        <iframe width="420" height="315"
            src="https://www.youtube.com/embed/awshbXT0fkk">
        </iframe>
    </div>

    <div class="pagination">
        {!! $laravelBasic->render() !!}
    </div>

@endsection
