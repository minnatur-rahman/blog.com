@component('mail::message')
    <p>Hello {{ $user->name }}</p>

    @component('mail:button',['url' => $url])
        Verify
    @endcomponent

    <p>In case you have issues please contact us.</p>

    Thanks <br/>
    {{ config('app.name') }}

@endcomponent