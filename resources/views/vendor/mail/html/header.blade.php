<tr>
<td class="header">
<a href="https://lebar.uk" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://lebar.uk/assets/img/logo.png" style="height: 48px !important;width: 130px !important;" class="logo" alt="Albert Lebar">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
