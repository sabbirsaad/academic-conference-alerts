<x-mail::message>
Hello Admin

A new conference has been created.

Title : {{ $conference->title }}

<x-mail::button :url="env('APP_URL') . '/admin/conferences?activeTab=Unpublished'">
Review now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
