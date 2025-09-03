<x-mail::message>
Dear {{ $conference->creator->first_name }},

This is a quick note to let you know the conference you submitted to {{ env('APP_NAME') }} has now been approved. Hurray!

To try not to overwhelm our readers your conference is now in a queue and will be published soon, it will also be shared on Twitter through the account, the Facebook page, and included in this week's newsletter.

<x-mail::button :url="$conference->link()">
Check now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
