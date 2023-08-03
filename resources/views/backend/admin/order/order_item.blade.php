@foreach($itemDetails as $id=>$item)
<?php
    $rowCount = 1;
?>
<tr>
  <td>{{ $rowCount }}</td>
    <td class="pro-thumbnail"><img width="80px;" height="80px" src="{{asset($item->photo_0)}}"></td>
    <td class="pro-title">
      {{ $item->item_title }}
    </td>
    <td>
      
    </td>
    <td>

    </td>
    <td>
        &pound; {{ number_format((float)$item->price, 2, '.', '') }}
    </td>
</tr>
<?php
  $rowCount++;
?>
@endforeach