@component('mail::message')
    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Verify
    @endcomponent
    {{ config('app.name') }}

@endcomponent