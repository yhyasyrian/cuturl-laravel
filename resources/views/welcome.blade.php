<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    @if (str_replace('_', '-', app()->getLocale()) == 'ar') dir="rtl"
        @else
        dir="ltr" @endif>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('welcome.title') }}</title>
    <!-- Fonts -->
    @if (str_replace('_', '-', app()->getLocale()) == 'ar')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
    <style>
        body:lang(ar) {
            font-family: 'Noto Kufi Arabic', sans-serif;
        }

        body:lang(en) {
            font-family: 'Ubuntu', sans-serif;
        }
        
        .en {
            direction: ltr;
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container text-center mt-5">
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger"><p class="m-0">{{ $message }}</p></div>
            @endforeach
            @if (isset($success))
                <div class="alert alert-success"><p class="m-0">{{ __('welcome.url_success') }}</p></div>
            @endif
        <h1 class="text-primary">{{ __('welcome.title') }}</h1>
        <form action="{{ Route('ctreat.link') }}" method="POST" class="mt-5 p-3 bg-emerald-500">
            @csrf
            <input type="url" placeholder="https://domain.com" name="url" class="form-control en" required>
            <input type="submit" value="{{ __('welcome.button') }}" name="run" class="btn btn-outline-success mt-2">
        </form>
        <table class="table table-hover table-light mt-5 table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('welcome.url') }}</th>
                    <th scope="col">{{ __('welcome.url_to') }}</th>
                    <th scope="col">{{ __('welcome.visitis') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($Link as $row)
                <tr class="en">
                    <th scope="row">{{ $i++ }}</th>
                    <td class="en"><a href="{{ url('').'/'.$row->code }}" title="{{ url('').'/'.$row->code }}">{{ mb_substr(url('').'/'.$row->code,0,45) }}</a></td>
                    <td class="en"><a href="{{ $row->url }}" title="{{ $row->url }}">{{ mb_substr($row->url,0,45) }}</a></td>
                    <td>{{ $row->count_visit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $Link->links() !!}
        </div>
    </div>
</body>

</html>
