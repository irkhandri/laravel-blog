<x-layout>

    <br>
    <h1>
        Please verify your email through email we have sent you
    </h1>

    <p> Did not get the email? </p>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf

        <input type="submit" class="w3-button w3-theme w3-margin-top" value="Send againt"></input>

    </form>




</x-layout>