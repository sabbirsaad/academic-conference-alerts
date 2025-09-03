<h1>Conferences in {{ $country->name }} ({{ $country->alpha2 }})</h1>
<p>There are total {{ $conferences->count() }} upcoming conferences in India.</p>
<p>Contribute in this community by adding new conference, if you feel that there are more conferences that are not enlisted here yet.</p>

@foreach($conferences as $conference)
    <h2>{{ $conference->title }}</h2>
    <hr>
@endforeach

<b>Related Conferences</b>:
@foreach($relatedConferences as $conference)
    <li>{{ $conference->title }}</li>
@endforeach
