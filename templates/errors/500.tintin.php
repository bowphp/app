#extends('layout')

#block('title', '500 - Internal Server Error')

#block('content')
<div>
    <h1>500</h1>
    <p>
        {{ $exception->getMessage() }} <br>
        <a href="/">Back</a>
    </p>
</div>
#endblock
