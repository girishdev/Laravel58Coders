@extends('layout')

@section('title')
    Add Question and Answers
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add Question and Answers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/qanda" method="POST">

                <div class="form-group">
                    <label for="topic">Topic: </label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="" disabled>Select Question and Answers Topic</option>
                        @foreach($topics as $topicsValue)
                            <option value="{{ $topicsValue }}">{{ $topicsValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qtype">Question Type: </label>
                    <select name="qtype" id="qtype" class="form-control">
                        <option value="" disabled>Select Question Type</option>
                        @foreach($qtype as $qtypeValue)
                            <option value="{{ $qtypeValue }}">{{ $qtypeValue }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="question">Question: </label>
                    <input type="text" name="question" value="{{ old('question') ?? $questions->question }}" class="form-control">
                    <div>{{ $errors->first('question') }}</div>
                </div>

                <div class="form-group">
                    <label for="answer">Answer: </label>
                    <textarea class="form-control" id="answer" name="answer" rows="8"></textarea>
                    <div>{{ $errors->first('answer') }}</div>
                </div>

                <div class="form-group">
                    <label for="link">Link: </label>
                    <input type="text" name="link" value="{{ old('link') ?? $questions->link }}" class="form-control">
                    <div>{{ $errors->first('link') }}</div>
                </div>

                @csrf
                <button type="submit" class="btn btn-primary">Add Question and Answers</button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#answer' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection