@component('mail::message')
# {{$tarefa}}

Data Limite de Conclusão: {{$data_limite_conclusao}}''

@component('mail::button', ['url' => $url])
Visualizar Tarefa
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
