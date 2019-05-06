<br><br><br><br>
<center>
        <h3> {{ $title }}</h3>
        <h3> Report For Month => {{ $month }} - {{ $year }}</h3>
</center>
<hr>
<br>
        <table class="table table-hover" width="100%" border="1">
            <tr>
                <th>#</th>
                <th width="50%">Name</th> 
                <th width="30%">Expense Amount</th>
            </tr>

            @php $total = 0; @endphp
            @foreach($DailyExpenses_report as $expense)
            <tr>
                <td align="center"> {{ $inc }}     </td>

                <td> {{ $expense->name }} </td>

                <td align="center">  {{ $expense->expense_amount }} </td>
            </tr>
            @php $inc++; $total = $total + $expense->expense_amount;  @endphp
            @endforeach
        </table>

<br><br>
        <table class="table table-hover" width="100%">
            <tr>
                    <th width="50%">Amount : <b> {{ $total }} /-</b></td>
                <td>Amount in Words : <b> {{ displaywords($total) }} /- </b></td>

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

    
    