{{-- <table width="100%">
        <tr>
            <td width="30%"> <img src="{{ URL::asset('css/dist/img/user2-160x160.jpg') }}" > </td>
            <td><h1>SAI</h1></td>
        </tr>
    </table> --}}
    <br><br><br><br>
    <center>
            <h3> Report For Month => {{ $month }} - {{ $year }}</h3>
    </center>
    <hr>
    <br>
            <table class="table table-hover" width="100%" border="1">
                <tr>
                    <th>#</th>
                    <th>Bill Date</th> 
                    <th>Bill Number</th>
                    <th>Customer Name</th>
                    <th>Company Name</th>
                    <th>Model Name</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th>HSN</th> 
                    <th>GST</th> 
                    <th>GST % </th> 
                    <th>CGST</th> 
                    <th>CGST %</th> 
                    <th>SGST</th> 
                    <th>SGST %</th> 
                    <th>Grand Amount</th>
                </tr>
                <?php $print_total = 0; $rate = 0; ?>
                @foreach($sale_report as $item)
                    <tr>
                        <td align="center">
                            {{ $inc }}
                        </td>

                        <td align="center">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                        </td>

                        <td align="center">
                            {{ $item->bill_number }}
                        </td>
                        
                        <td>
                            @foreach($Customers as $customer_name)
                                @if($customer_name->id == $item->customer_id)
                                {{ $customer_name->name }}
                                @endif
                            @endforeach
                        </td>

                        <td>
                            @foreach($purchase_items as $pur_items) 
                                @if($item->item_id == $pur_items->id)
                                    @foreach($company_names as $c_name)
                                        @if($c_name->id ==  $pur_items->company_name)
                                            {{ $c_name->company_name }}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>
        
                        <td>
                            @foreach($purchase_items as $pur_items) 
                                @if($item->item_id == $pur_items->id)
                                    @foreach($model_names as $m_name)
                                        @if($m_name->id ==  $pur_items->model_name)
                                            {{ $m_name->model_name }}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>

                        {{-- <td>
                            @foreach($purchase_items as $pur_items)
                                @if($pur_items->id == $item->item_id)
                                    {{ $pur_items->company_name }} => {{ $pur_items->model_name }}
                                @endif
                            @endforeach                            
                        </td> --}}

                        {{-- Rate --}}
                        <?php $rate = $item->sale_price * (100 / ($item->percent_gst + 100)); ?>
                        <td align="center">
                            @if($item->balance_amount == 0)
                           {{ round($rate, 2) }}
                           @else
                           <?php $rate = $rate - $item->balance_amount; ?>
                           {{ round($rate, 2)  }}
                           @endif
                        </td>
                        
                        <td align="center">
                            {{ $item->quantity }} 
                        </td>

                        <td align="center">
                            @foreach($purchase_items as $pur_items)
                                @if($pur_items->id == $item->item_id)
                                    {{ $pur_items->hsn }}
                                @endif
                            @endforeach
                        </td>

                        <td align="center">
                            {{-- {{ round(($item->sale_price * $item->percent_gst)/100,2) }} --}}
                            {{ round(($rate * $item->percent_gst)/100,2) }}
                        </td>

                        <td align="center">
                            {{ $item->percent_gst }}
                        </td>

                        <td align="center">
                            {{-- {{ round(($item->sale_price * ($item->percent_gst/2))/100,2) }} --}}
                            {{ round(($rate * ($item->percent_gst/2))/100,2) }}
                        </td>

                        <td align="center">
                            {{ $item->percent_gst/2 }}
                        </td>

                        <td align="center">
                            {{-- {{ round(($item->sale_price * ($item->percent_gst/2))/100,2) }} --}}
                            {{ round(($rate * ($item->percent_gst/2))/100,2) }}
                        </td>

                        <td align="center">
                            {{ $item->percent_gst/2 }}
                        </td>

                        <td align="center">
                            {{ $item->total }} 
                        </td>
                       
                    </tr>
                    <?php $print_total = $print_total + $item->total;?>
                    <?php $inc++; ?>
                @endforeach
                
            </table>
            <br><br>
            <table class="table table-hover" width="100%">
                <tr>
                    <td>Total Amount : <b> {{ $print_total }} /-</b></td>
                    <td>Total Amount in Words : <b> {{ displaywords($print_total) }} /- </b></td>

                </tr>
            </table>

            
            <br><br>
            Printed On : {{ date('d-M-Y') }}
    
    




{{-- php Function for number to word conversion --}}
<?php
function displaywords($number){
$no = (int)floor($number);
$point = (int)round(($number - $no) * 100);
$hundred = null;
$digits_1 = strlen($no);
$i = 0;
$str = array();
$words = array('0' => '', '1' => 'One', '2' => 'Two',
'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
'13' => 'Thirteen', '14' => 'Fourteen',
'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
'60' => 'Sixty', '70' => 'Seventy',
'80' => 'Eighty', '90' => 'Ninety');
$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
while ($i < $digits_1) {
$divider = ($i == 2) ? 10 : 100;
$number = floor($no % $divider);
$no = floor($no / $divider);
$i += ($divider == 10) ? 1 : 2;


if ($number) {
 $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
 $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
 $str [] = ($number < 21) ? $words[$number] .
     " " . $digits[$counter] . $plural . " " . $hundred
     :
     $words[floor($number / 10) * 10]
     . " " . $words[$number % 10] . " "
     . $digits[$counter] . $plural . " " . $hundred;
} else $str[] = null;
}
$str = array_reverse($str);
$result = implode('', $str);


$points = ($point) ?
"" . $words[floor($point / 10) * 10] . " " . 
   $words[$point = $point % 10] : ''; 

if($points != ''){        
echo $result . "Rupees  " . $points . " Paise Only";
} else {

echo $result . "Rupees Only";
}

}
?>

    
    