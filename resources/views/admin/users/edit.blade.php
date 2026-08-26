<h1>Gebruiker bewerken</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Naam</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        >
    </div>

    <div>
        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username', $user->username) }}"
        >
    </div>

    <div>
        <label for="email">E-mail</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        >
    </div>

    <div>
        <label>
            <input
                type="checkbox"
                name="is_admin"
                value="1"
                @checked(old('is_admin', $user->is_admin))
            >
            Admin
        </label>
    </div>

    <button type="submit">
        Wijzigingen opslaan
    </button>
</form>
