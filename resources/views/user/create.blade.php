@extends('layouts.default')

@section('content')
    <h1 class="text-center text-gray-900 text-4xl">Create new account</h1>
    <form class="mt-6" id="registerForm">
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
        document.addEventListener('DOMContentLoaded', bindFormSubmitEvent);

        function bindFormSubmitEvent() {
            document.getElementById('registerForm').addEventListener('submit', validateAndSend)
        }

        async function validateAndSend(event) {
            event.preventDefault();

            const form = event.target;

            if (validate(form) === false) {
                return false;
            }

            await send(form);
        }

        function validate(form) {
            if (form.password.value !== form.passwordConfirmation.value) {
                alert("The password don't match.");
                return false;
            }
        }

        async function send(form) {
            const response = await fetch('{{ url(route('api.user.store')) }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: parseForm(form)
            });

            const data = await response.json()
            console.log(data)
        }

        function parseForm(form) {
            return JSON.stringify({
                name: form.name.value,
                email: form.email.value,
                password: form.password.value,
                password_confirmation: form.passwordConfirmation.value
            });
        }
    </script>
@endsection
