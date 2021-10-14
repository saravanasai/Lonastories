<table width="100%" >
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>EX-LN-AMOUNT :</strong> {{$ln_comparison->ex_ln_loan_amount}}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>NEW-LN-AMOUNT : </strong>{{$ln_comparison->ln_com_new_loan_amount}}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>Ex-Roi :</strong> {{$ln_comparison->ex_ln_roi }}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> New-Ln-Roi : </strong>{{$ln_comparison->ln_com_new_roi }}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> Ex-Ln-Tennure:</strong> {{$ln_comparison->ex_ln_tennure }}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> New-Ln-Tennure : </strong>{{$ln_comparison->ln_com_new_tennure  }}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> Ex-Ln-Tennure:</strong> {{$ln_comparison->ex_ln_tennure }}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> New-Ln-Tennure : </strong>{{$ln_comparison->ln_com_new_tennure  }}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> Ex-Pos:</strong> {{$ln_comparison->ex_ln_pos}}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>  New-Emi  : </strong>{{$ln_comparison->ln_com_new_emi}}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> Paid Emi:</strong> {{$ln_comparison->ex_ln_no_of_emi_paid}}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>  New-OutFlow : </strong>{{$ln_comparison->ln_com_new_proposed_outflow}}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong> Balance Emi:</strong> {{$ln_comparison->ex_ln_balance_emi}}</p>
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>  Existing OutFlow : </strong> {{$ln_comparison->ex_ln_exsting_out_flow }}</p>
        </td>
    </tr>
    <tr>
        <td align="left" style="width: 25%; text-align: center;">
            {{-- <p><strong> Balance Emi:</strong> {{$ln_comparison->ex_ln_balance_emi}}</p> --}}
        </td>
        <td align="left" style="width: 25%; text-align: center;">
            <p><strong>  Gross-Savings : </strong> {{$ln_comparison->ln_com_new_gross_sav}}</p>
        </td>
    </tr>
</table>
