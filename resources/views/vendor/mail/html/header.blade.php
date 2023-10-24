<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Gestão de Tarefas')
<img src="http://localhost:8000/img/logo.png" class="logo" alt="Gestão de Tarefas">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
