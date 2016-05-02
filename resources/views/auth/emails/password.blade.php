<form method="POST" action="/password/email">
    {!! csrf_field() !!}

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    Click here to reset your password: {{ url('password/reset/'.$token) }}

    <div>
        <button type="submit">
            Send Password Reset Link
        </button>
    </div>
</form>