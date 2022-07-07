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
                    <input type="text" id="question" name="question" value="{{ old('question') ?? $questions->question }}" class="form-control">
                    <div>{{ $errors->first('question') }}</div>
                </div>
                <div id="searchResponse"></div>
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
        <!--<div class="col-12">
            <br>
            <div id="searchResponse"></div>
        </div>-->
    </div>
@endsection

@section('scripts')
    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open( 'POST', '{{ route('qanda.uploadimage') }}', true );
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send( data );
            }
        }

        function SimpleUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create( document.querySelector( '#answer' ), {
                extraPlugins: [ SimpleUploadAdapterPlugin ],
            })
            .then( answer => {
                console.log(answer);
            })
            .catch( error => {
                console.error( error );
            });

        $(document).ready(function() {
            $("#question").keyup(function(){
                var value = $(this).val();
                $('#searchResponse').html('');
                if (value.length >= 3) {
                    $.ajax({
                        type: "GET",
                        url: '/qanda/searchQuestion',
                        data: {'value': value},
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function() {
                                $.each(this, function(k, v) {
                                    console.log('each:: ' + v.id + ' :: '+ k +' :: '+ v.question +' :: '+ v.answer);
                                    var htmlContent = "<h4>" + v.question + "</h4><h5>" + v.answer + "</h5><a class='btn btn-primary' href=/qanda/"+v.id+"/edit role='button'>Edit</a>";
                                    $('#searchResponse').html(htmlContent);
                                });
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
