@component('mail::message')
    # Introduction

    The body of your message.
    {{ $details['title'] }}
    {{ $details['body'] }}


    Thanks,
    {{ config('app.name') }}
@endcomponent
