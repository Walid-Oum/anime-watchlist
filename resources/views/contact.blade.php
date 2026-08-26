<h1>Contact</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('contact.store') }}">
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
        <label for="subject">Onderwerp</label>
        <input
            type="text"
            id="subject"
            name="subject"
            value="{{ old('subject') }}"
            required
        >
    </div>

    <div>
        <label for="message">Bericht</label>
        <textarea
            id="message"
            name="message"
            rows="6"
            required
        >{{ old('message') }}</textarea>
    </div>

    <button type="submit">
        Versturen
    </button>
</form>
