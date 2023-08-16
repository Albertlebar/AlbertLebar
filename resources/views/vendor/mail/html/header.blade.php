<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!-- <img src="https://lebar.uk/assets/img/logo.png" style="max-width: 75%;" class="logo" alt="Albert Lebar"> -->
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
