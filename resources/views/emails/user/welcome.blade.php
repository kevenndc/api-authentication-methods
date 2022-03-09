@php
    /** @var $userName string */
    /** @var $token string */
@endphp

@component('mail::message')
    @component('mail::panel')
        Your account was successfully created. You can now use our APIs with your token.
        @component('mail::table')
            | Token |
            |:-----:|
            | **{{ $token }}** |
        @endcomponent
    @endcomponent
@endcomponent
