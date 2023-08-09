@if(isset($action) && $action == 'edit')
<tr id="item_{{ $row->id }}">
  <td>1</td>
  <td>
      {{ $row->itemDetails->item_code }}
    </td>
    <td class="pro-thumbnail"><img width="40px;" height="40px" src="{{asset($row->itemDetails->photo_0)}}"></td>
    <td class="pro-title">
      <input type="hidden" name="old_item_id[{{ $row->id }}]" value="{{ $row->id }}">
      {{ $row->itemDetails->item_title }}
    </td>
    <td>
      {{ $row->size }}
    </td>
    <td style="width: 100px;">
      <input type="number" id="qty_{{ $row->id }}" value="{{ $row->quantity }}" name="old_qty[{{ $row->id }}]" class="form-control qty">
    </td>
    <td>
      @if(App\Models\User::find($invoice->user_id)->user_type == 0)
      <input type="hidden" name="item_price" id="item_price_{{ $row->id }}" value="{{ $row->itemDetails->total_trade }}">
      @else
      <input type="hidden" name="item_price" id="item_price_{{ $row->id }}" value="{{ $row->itemDetails->total_retail }}">
      @endif
      <input type="hidden" name="old_total_item_price[{{ $row->id }}]" id="total_item_price_{{ $row->id }}" class="total_item_price" value="{{ $row->price }}">
        <p id="item_total_{{ $row->id }}">&pound; {{ number_format((float)$row->price, 2, '.', '') }}</p>
    </td>
    <td>
      <a href="javascript:void(0)" data-id="{{ $row->id }}" class="btn btn-xs btn-danger mr-1 delete-item" title="Delete"><i class="fa fa-trash"></i></a>
    </td>
</tr>
@else
@foreach($itemDetails as $id=>$item)
<?php
    $rowCount = 1;
?>
<tr id="item_{{ $item->id }}">
  <td>{{ $rowCount }}</td>
    <td>
      {{ $item->item_code }}
    </td>
    <td class="pro-thumbnail"><img width="40px;" height="40px" src="{{asset($item->photo_0)}}"></td>
    <td class="pro-title">
      <input type="hidden" name="item_id[]" value="{{ $item->id }}">
      {{ $item->item_title }}
    </td>
    <td>
      {!! Form::select('size['. $item->id .']', $item->itemSize->pluck('size','size')->toArray() ?? [],  $userRoleId ?? '', ['class' => 'form-control select2','data-control'=>"select2", 'id'=>'customer']) !!}
    </td>
    <td style="width: 100px;">
      <input type="number" id="qty_{{ $item->id }}" name="qty[{{ $item->id }}]" class="form-control qty">
    </td>
    <td>
      @if($userType == 0)
      <input type="hidden" name="item_price" id="item_price_{{ $item->id }}" value="{{ $item->total_trade }}">
      @else
      <input type="hidden" name="item_price" id="item_price_{{ $item->id }}" value="{{ $item->total_retail }}">
      @endif
      <input type="hidden" name="total_item_price[{{ $item->id }}]" id="total_item_price_{{ $item->id }}" class="total_item_price" value="">
        <p id="item_total_{{ $item->id }}">&pound; 0.00</p>
    </td>
    <td>
      <a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-xs btn-danger mr-1 delete-item" title="Delete"><i class="fa fa-trash"></i></a>
    </td>
</tr>
<?php
  $rowCount++;
?>
@endforeach
@endif