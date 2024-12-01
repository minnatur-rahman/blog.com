@component('mail::message')

    Hi, {{ $user->name }}. Forgot Your Password?

    <p>It happens. Click the link below to reset your password.</p>

    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Verify
    @endcomponent

    

    {{ config('app.name') }}

@endcomponent