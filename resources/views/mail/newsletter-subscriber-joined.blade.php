<x-mail::message>
Hello

Thank you for joining for the newsletter of {{ config('app.name') }}

Please click the button below to verify your email address
<x-mail::button :url="route('newsletter.verify', $subscriber->hash)">
Verify Email
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
