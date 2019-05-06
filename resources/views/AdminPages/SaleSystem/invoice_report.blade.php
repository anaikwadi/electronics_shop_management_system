{{-- <table width="100%">
        <tr>
            <td> <img src="{{asset('businessbox/img/client/avatar-2.jpg')}}" height="100" width="50"> </td>
            <td>
                <h1>SAI</h1>
                S/G No. 151/60, Opp. Malpani Plaza,
                Janata Raja Road, Vidya Nagar,
                Sangamner - 422 605 
            </td>
        </tr>
    </table> --}}
         {{-- <style>
            header { position: fixed; top: -30px; left: 0px; right: 0px; height: 50px; }
            footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 20%; }
          </style> --}}
    {{-- <br> <br> <br> <br>  --}}
    {{-- <header> --}}
            <font size="1">
            {{-- <table width="100%" style="position: fixed; top: -30px; left: 0px; right: 0px; height: 50px;"> --}}
                    <table width="100%" >
                    <tr>
                        {{-- <td> <img src="{{asset('businessbox/img/client/avatar-2.jpg')}}" height="100" width="50"> </td> --}}
                        <td width="40%"></td>
                        <td>
                            <h4>SAI ELECTRONICS</h4>
                            S/G No. 151/60, Opp. Malpani Plaza,
                            Janata Raja Road, Vidya Nagar,
                            Sangamner - 422 605 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p align="right">                            
                                    Bill Date : {{ \Carbon\Carbon::parse($bill_date)->format('d-M-Y') }}
                                </p>
                        </td> 
                    </tr>
                </table> 
            </font>
    {{-- </header> --}}
               
<center style="position: fixed; top: 90px; left: 0px; right: 0px; height: 50px;"> 
        <font size="1">
    <h3>  
        <b> 
            GSTIN : 27ADTFS1821K1ZL <br> 
            Invoice Number : #{{ $last_bill_number }}
        </b>
    </h3></font>
</center>

<font size="1">
<table width="100%">
<tr>
<td>
     From
</td>

<td>
     To
</td>
</tr>

<tr>
<td>            
          <strong>SAI ELECTRONICS & HOME APPLIANCES.</strong><br>
</td>

<td>
      <label > Name: </label><b> @foreach($Customers as $cust) @if($cust->id == $customer_id) {{ $cust->name }} @endif @endforeach</b>
</td>
</tr>

<tr>
<td>
        S/G No. 151/60, Opp. Malpani Plaza,<br>
        Janata Raja Road, Vidya Nagar,<br>
        Sangamner - 422 605 <br><br> 
</td>

<td>
        <label > Address: </label> <b>  @foreach($Customers as $cust) @if($cust->id == $customer_id) {{ $cust->address }} @endif @endforeach </b>
</td>
</tr>

<tr>
<td>
        <b>Mobile:</b> +91 77 09 161 143 / +91 77 44 050 516<br>
</td>

<td>
        <label > Mobile: </label> <b>  @foreach($Customers as $cust) @if($cust->id == $customer_id) {{ $cust->mobile }} @endif @endforeach </b>
</td>
</tr>

<tr>
<td>
        <b>Email:</b> electronicsai1@gmail.com    
</td>

<td>
        <label > Email: </label> <b>  @foreach($Customers as $cust) @if($cust->id == $customer_id) {{ $cust->email }} @endif @endforeach </b>
</td>
</tr>

</table>
<h4>Order Summary</h4>
<table class="table table-hover" width="100%" border="1" style="border-collapse: collapse;">
        <tr>
            <th>#</th>              
            {{-- <th>Company => Model Name</th> --}}
            <th>Company Name</th>
            <th>Model Name</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>GST Percent</th>
            <th>CGST</th>
            <th>SGST</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>

        <?php  $final_total = 0;?>
        @foreach($bill_sale_items as $items)
        <tr>
            <td align="center">{{ $inc }}</td>

            <td>
                @foreach($purchase_items as $pur_items) 
                    @if($items->item_id == $pur_items->id)
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
                    @if($items->item_id == $pur_items->id)
                        @foreach($model_names as $m_name)
                            @if($m_name->id ==  $pur_items->model_name)
                                {{ $m_name->model_name }}
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </td>
            

            

            <td align="center">{{ $items->quantity }}</td>

            <?php $rate = $items->sale_price * (100 / ($items->percent_gst + 100));  ?>
            <td align="center">{{ round($rate, 2) }}</td>
            
            <td align="center">{{ $items->percent_gst }} %</td>

            <?php $gst = $items->percent_gst/2; ?>
            <td align="center"> {{ round(($rate * $gst ) /100,2) }} </td>
            <td align="center"> {{ round(($rate * $gst ) /100,2) }} </td>

            <td align="center">{{ $items->sale_price }}</td>

            <?php $total = $items->quantity * $items->sale_price;  ?>
            <td align="center">{{ $total }}</td>
            
        </tr>    
        <?php $inc++; $final_total = $final_total + $total;?>
        @endforeach
        <tr>
            <td colspan="9"> </td>
            <td align="center"> <b> Total ={{ $final_total }} </b> </td>
        </tr>
</table>

<br>

<table class="table" width="100%" border="1"  style="border-collapse: collapse;">
        <tr>
                <td align="center"> <b> Amount Paid </b> </td>
                <td align="center"> <b> Payment Method </b> </td>
                @if($last_bill_paid_bal_details->balance_amount != 0)
                <td align="center"> <b> Balance Amount </b> </td>
                <td align="center"> <b> Payment Due Date </b> </td>
                @endif
        </tr>
        
        
        <tr>
                <td align="center"> {{ $last_bill_paid_bal_details->paid_amount }} /- </td>
    
                <td align="center" rowspan="2"> 
                    @if($last_bill_paid_bal_details->payment_method == 1)
                        Cash
                    @elseif($last_bill_paid_bal_details->payment_method == 2)
                        Card
                    @elseif($last_bill_paid_bal_details->payment_method == 3)
                        Cheque
                    @elseif($last_bill_paid_bal_details->payment_method == 3)
                        Credit
                    @endif
                </td>
                @if($last_bill_paid_bal_details->balance_amount != 0)
                <td align="center"> {{ $last_bill_paid_bal_details->balance_amount }} /- </td>
                <td align="center" rowspan="2"> {{ \Carbon\Carbon::parse($last_bill_paid_bal_details->due_date)->format('d-M-Y') }} </td>
                @endif
        </tr>
    
        <tr>
            <td>   Amount Paid in Words : <b> <font size="1"> {{ displaywords($last_bill_paid_bal_details->paid_amount) }} /- </font></b> </td>
            @if($last_bill_paid_bal_details->balance_amount != 0)
            <td>  Balance Amount in Words : <b> <font size="1"> {{ displaywords($last_bill_paid_bal_details->balance_amount) }} /- </font> </b> </td>
            @endif
        </tr>
    </table>
  
        <table class="table" width="100%" >
                <tr>
                        <td align="center"> <b> Name </b> </td>
                        <td align="center"> <b> Branch Name </b> </td>
                        <td align="center"> <b> Bank </b> </td>
                        <td align="center"> <b> Account Number </b> </td>
                        <td align="center"> <b> IFSC Code </b> </td>
                </tr>

                <tr>
                        <td align="center">  SAI ELECTRONICS </td>
                        <td align="center">  SANGAMNER  </td>
                        <td align="center">  IDBI Bank  </td>
                        <td align="center">  0610102000009331  </td>
                        <td align="center">  IBKL0000610  </td>
                </tr>
                
        </table>
    </font>

{{-- <footer> --}}
        <font size="1">

        <table class="table" width="100%">
                <tr>
                        <td align="center" width="60%"> <b> DECLARATIONS </b> </td>
                        <td align="center" width="40%"> <b> For SAI ELECTRONICS </b> </td>
                </tr>

                <tr>
                        <td>
                            <p align="justify"><font size="-4">
                            "I/ We hereby certify that my/ our regidtration certificate under the Maharashtra Goods and Service Tax is in force on the date on which the value of the goods specify in this tax invoice is made by me/ us and that the transaction of sale covered by this tax invoice has been effected by me/ us and it shall be accounted for in the turnover od sale while filling of return and due tax, if any, payable on the sale has been paid or shall be paid."
                            </font></p>
                        </td>
                        <td> </td>
                </tr>

                <tr>
                        <td></td>
                        <td align="center"> <b> Authorised Signatory</b> <br>
                            Printed on : {{ \Carbon\Carbon::parse(date("Y-m-d"))->format('d-M-Y') }}  At : {{ date("h:i:s") }}
                        </td>
                </tr>
        </table>
        </font>
{{-- </footer> --}}







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
