<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <!-- <link href="https://fonts.cdnfonts.com/css/santral-blackitalic" rel="stylesheet"> -->
    <style>
        @font-face {
            font-family: 'Santral-Medium';
            font-style: normal;
            font-weight: 400;
            src: local('Santral-Medium'), url({{ storage_path('fonts/SantralMedium.woff') }}) format('woff'); 
        }
        body {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: "Santral-Medium";
        }
        .page-break {
            page-break-after: always;
            page-break-inside: avoid;
        }
        footer{
            position: fixed;
            bottom: 10px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /*color: white;*/
            text-align: center;
            line-height: 20px;
        }
        .td_tag {
            font-size: 12px; 
            line-height: 15px;
        }
    </style>
</head>

<body>
    <div style="position: relative">

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="20%" align="left" valign="middle">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="60%" align="center" valign="top"><strong><img src="{{ asset('assets/img/logo.png') }}" width="200" height="50" alt=""/></strong>
                                </td>
                                <td width="20%" align="left" valign="middle">
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td width="20%" align="left" valign="middle">
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span style="font-size: 15px;">ORDER TO</span>
                                                    <div class="td_tag">{{ $order->shipping_address_first_name }}  {{ $order->shipping_address_last_name }}</div>
                                                    <!-- <div class="td_tag">Nature's Art LTD</div> -->
                                                    <div class="td_tag">{{ $order->shipping_address_1 }}</div>
                                                    <div class="td_tag">{{ $order->shipping_address_2 }}</div>
                                                    <div class="td_tag">{{ $order->shipping_city }}</div>
                                                    <div class="td_tag">{{ $order->shipping_country }}</div>
                                                    <div class="td_tag">{{ $order->shipping_postcode }}</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="50%" align="center" valign="top"><strong></strong>
                                </td>
                                <td width="30%" align="left" style="vertical-align: baseline;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td width="60%">Order No.</td>
                                                <td width="40%"><strong>{{ $order->order_number }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="60%">Date:</td>
                                                <td width="40%">{{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td >&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr style="">
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">ITEM CODE</span></td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">TITLE</span></td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">DESCRIPTION</span></td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">QTY</span></td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">RATE</span></td>
                                    <td width="10%" height="25" align="center" bgcolor="#e5dddf" valign="middle" style="border-right: 1px solid #fff"><span style="font-size: 12px; color: #78bd7d;">AMOUNT</span></td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                </tr>
                                @foreach($order->orderItem as $id=>$item)
                                    <tr>
                                        <td></td>
                                        <td class="td_tag" align="center">{{ $item->itemDetails->item_code }}</td>
                                        <td class="td_tag" align="left">{{ $item->itemDetails->item_title }}</td>
                                        <td class="td_tag" align="left">{{ $item->itemDetails->item_description }}</td>
                                        <td class="td_tag" align="center">{{ $item->quantity }}</td>
                                        <td class="td_tag" align="center">{{ number_format((float)$item->itemDetails->total_retail, 2, '.', '') }}</td>
                                        <td class="td_tag" align="right">&pound; {{ number_format((float)$item->price, 2, '.', '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="40%" height="25" align="center" valign="middle" style="border-right: 1px solid #fff">&nbsp;</td>
                                    <td width="15%" align="right" valign="middle"><span style="font-size: 12px; color: #808080; font-weight: bold">SUB TOTAL</span></td>
                                    <td width="30%" align="right" valign="middle"><span style="font-size: 12px; font-weight: bold">&pound; {{ number_format((float)$order->sub_total, 2, '.', '') }}</span></td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="40%" height="25" align="center" valign="middle" style="border-right: 1px solid #fff">&nbsp;</td>
                                    <td width="15%" align="right" valign="middle"><span style="font-size: 12px; color: #808080; font-weight: bold">VAT TOTAL</span></td>
                                    <td width="30%" align="right" valign="middle"><span style="font-size: 12px; font-weight: bold">&pound; {{ number_format((float)$order->vat, 2, '.', '') }}</span></td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="40%" height="25" align="center" valign="middle" style="border-right: 1px solid #fff">&nbsp;</td>
                                    <td width="15%" align="right" valign="middle"><span style="font-size: 12px; color: #808080; font-weight: bold">TOTAL</span></td>
                                    <td width="30%" align="right" valign="middle"><span style="font-size: 12px; font-weight: bold">&pound; {{ number_format((float)$order->order_total, 2, '.', '') }}</span></td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                    <td width="1%" align="center" valign="middle">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <footer>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td align="center">
                                <div style="font-size: 12px; line-height: 15px; font-weight: bold; margin-bottom: 10px; ">Albert Lebar</div>
                                <div class="td_tag">100 Hatton Garden</div>
                                <div class="td_tag">London</div>
                                <div class="td_tag">EC1N 8NX</div>
                                <div class="td_tag">lebarltd@gmail.com</div>
                                <div class="td_tag">VAT Registration NO.: 401041670</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </footer>
        </div>
    </body>
    </html>
