<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Demo - Text Summarization</h1>
            </div>
            <form method="POST">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-2">
                        <span>Input</span>
                    </div>
                    <div class="col-md-10">
                        <textarea style="width: 100%" rows="20" name="input">{{ old('input') }}</textarea>
                    </div>
                    <div class="col-md-2 text-left mt-4">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                    <div class="col-md-12 mt-4">
                        <p>Output:</p>
                        <div style="padding: 10px; border: solid 1px #c1c1c1"></div>
                        <p>{!! @$output !!}</p>
                    </div>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
