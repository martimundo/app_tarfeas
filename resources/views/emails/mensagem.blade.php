@component('mail::message')
# Introdução

Corpo da Mensagem.

@component('mail::button', ['url' => ''])
Texto do Botão.
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
