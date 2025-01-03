@component('mail::message')
<p>Hello {{ $user->name }}</p>
    {{-- @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Verify
    @endcomponent
    <p>In case you have issues please contact our contact us.</p>
    {{ config('app.name') }} --}}

@endcomponent