<!DOCTYPE html>
<html>

<head>
    <title>All countries</title>
</head>

<body>
    <div>
        <div>
            <h1>Listed All Countries</h1>
        </div>
        <div>
            <form action="{{ url('/') }}" method="POST">
                @csrf
                <label for="country">Select Country: </label>
                <select name="country" id="country">
                    @foreach($countries as $value)
                    <option value="{{ $value->code }}">{{ $value->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="Get Time">
            </form>
        </div>
        <br>
        {{ session('result') }}
    </div>
</body>

</html>