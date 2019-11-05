<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Employee Number</th>
            <th>Action</th>
        </tr>        
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <th>{{$user->profile->full_name}}</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @empty
        <tr>
            <th colspan="4">No Users</th>
        </tr>
        @endforelse
    </tbody>    
</table>