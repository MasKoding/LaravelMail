<x-mail::message>

Dear {{ $email }}


<h1 style="color: red">{{ $messageTo }}</h1>

{{-- <img src={{ public_path('image/img-kopi1.png') }}/> --}}
<x-mail::button :url="'https://laravel.com/'">
Click Here
</x-mail::button>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
