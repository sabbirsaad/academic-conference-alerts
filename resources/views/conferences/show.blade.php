<h1>{{ $conference->title }}</h1>

<ul>
    <li> website: {{ $conference->url }} </li>
    <li> Start At: {{ \Carbon\Carbon::parse($conference->start_at)->format('d M, Y') }} </li>
    <li> Start At: {{ \Carbon\Carbon::parse($conference->end_at)->format('d M, Y') }} </li>
    <li> Event Type: {{ $conference->type }} </li>
    <li> Total Views: {{ $conference->views }} </li>
    <li> Published At: {{ \Carbon\Carbon::parse($conference->published_at)->diffForHumans() }} </li>
</ul>

<b>Address</b>
<li>{{ $conference->address->address_line_1 }}</li>
<li>{{ $conference->address->address_line_2 }}</li>
<li>{{ $conference->address->city }}</li>
<li>{{ $conference->address->state }}</li>
<li>{{ $conference->address->postal_code }}</li>
<li>{{ $conference->address->country->name }}</li>

<b>Organizers</b>:
@foreach($conference->organizers as $organizer)
    <li>{{ $organizer->name }}</li>
@endforeach

<b>Categories</b>:
@foreach($conference->categories as $category)
    <li>{{ $category->name }}</li>
@endforeach

<b>Related Conferences</b>:
@foreach($relatedConferences as $conference)
    <li>{{ $conference->title }}</li>
@endforeach

<h2>Get Weekly Email</h2>
<p>Register now to get weekly email newsletter FREE in your area.</p>
<form action="">
    <li>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Type your valid email">
    </li>
    <li>
        <label for="email">Your area</label>
        <select>
            <option value="1">New York</option>
        </select>
    </li>

    <li>
        <button type="submit">Subscribe now</button>
    </li>
</form>

