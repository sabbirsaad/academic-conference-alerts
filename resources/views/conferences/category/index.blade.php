<h1>Conferences in {{ $category->title }}</h1>
<p>There are total {{ $conferences->count() }} upcoming conferences in {{ $category->title }}</p>
<p>Contribute in this community by adding new conference, if you feel that there are more conferences that are not enlisted here yet.</p>

@foreach($conferences as $conference)
    <h2>{{ $conference->title }}</h2>
    <br>
@endforeach

<b>Related Conferences</b>:
@foreach($relatedConferences as $conference)
    <li>{{ $conference->title }}</li>
@endforeach