@component('mail::message')
# Tus Credenciales

Estas son tus credenciales para acceder a {{ config('app.name') }}

@component('mail::table')
	| Username | Contraseña |
	|:----------|:------------|
	|{{ $user->email }} | {{ $password }} |
@endcomponent


@component('mail::button', ['url' => url('login')])
	Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
