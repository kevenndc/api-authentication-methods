@extends('layouts.default')

@section('content')
    <h1 class="text-center text-gray-900 text-4xl">Create new account</h1>
    <form method="POST" class="mt-6" onsubmit="validateAndSend(this)">
        <div class="mb-2">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" class="block w-full p-2 border-2 rounded border-gray-200">
        </div>
        <div class="mb-2">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" class="block w-full p-2 border-2 rounded border-gray-200">
        </div>
        <div class="mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="block w-full p-2 border-2 rounded border-gray-200">
        </div>
        <div class="mb-2">
            <label for="passwordConfirmation">Password confirmation</label>
            <input type="password" name="passwordConfirmation" id="passwordConfirmation" class="block w-full p-2 border-2 rounded border-gray-200">
        </div>
        <button type="submit" class="block w-full mx-auto px-5 py-4 mt-4 bg-gray-900 text-white">Submit</button>
    </form>
    <script>
        function validateAndSend(form) {
            validate(form);
            send(form);
        }

        function validate(form) {
            if (form.password.value !== form.passwordConfirmation.value) {
                return alert("The password don't match.");
            }
        }

        function send(form) {
            fetch('{{ url(route('api.account.store')) }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: parseForm(form)
            });
        }

        function parseForm(form) {
            return JSON.stringify({
                name: form.name.value,
                email: form.email.value,
                password: form.password.value,
            });
        }
    </script>
@endsection
