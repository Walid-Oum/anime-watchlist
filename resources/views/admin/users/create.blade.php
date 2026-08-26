<h1>Nieuwe gebruiker</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <div>
        <label for="name">Naam</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
        >
    </div>

    <div>
        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="{{ old('username') }}"
        >
    </div>

    <div>
        <label for="email">E-mail</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
    </div>

    <div>
        <label for="password">Wachtwoord</label>
        <input
            type="password"
            id="password"
            name="password"
            minlength="8"
            required
        >
    </div>

    <div>
        <label>
            <input
                type="checkbox"
                name="is_admin"
                value="1"
            >
            Admin
        </label>
    </div>

    <button type="submit">
        Gebruiker aanmaken
    </button>
</form>
