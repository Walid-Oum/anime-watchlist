<h1>Gebruikersbeheer</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('admin.users.create') }}">
    Nieuwe gebruiker toevoegen
</a>

<hr>

@foreach($users as $user)
    <div>
        <p>
            <strong>{{ $user->name }}</strong>
            - {{ $user->email }}

            @if($user->is_admin)
                - Admin
            @else
                - Gebruiker
            @endif
        </p>

        <a href="{{ route('admin.users.edit', $user) }}">
            Bewerken
        </a>
    </div>

    <hr>
@endforeach
