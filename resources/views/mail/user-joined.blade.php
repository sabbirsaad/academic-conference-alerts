<x-mail::message>
Hello {{ $user->first_name }}

You have joined the {{ config('app.name') }} community. We are excited to have you on board.
To get started, please click the button below to verify your email address.

<x-mail::button :url="$user->getVerificationLink()">
    Verify now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
