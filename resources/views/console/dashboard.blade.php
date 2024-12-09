@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <ul id="dashboard">
        <li><a href="/console/facilities/list">Manage Facilities</a></li>
        <li><a href="/console/providers/list">Manage Providers</a></li>
        <li><a href="/console/provinces/list">Manage Provinces</a></li>
        <li><a href="/console/types/list">Manage Types</a></li>
        <li><a href="/console/bookings/list">Manage Bookings</a></li>
        <li><a href="/console/users/list">Manage Users</a></li>
        <li><a href="/console/logout">Log Out</a></li>
    </ul>

</section>

@endsection
