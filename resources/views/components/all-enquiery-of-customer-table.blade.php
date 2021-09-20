<div>
    <div>
        <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
        <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Phonenumber</th>
                <th>Email</th>
                <th>product</th>
                <th>sub product</th>
                <th>Location</th>
                <th>Pro Generation status</th>
                <th>Pro Acceptenace status</th>
                <th>Documents Collected status</th>
                <th>status</th>
                <th>Bussiness Name</th>
                <th>Lead generated Name</th>
                <th>Lead converted Name</th>
                <th>Source team</th>
                <th>Lead Channel</th>
                <th>Bank name</th>
                <th>Lead Vendor name</th>
                <th>Loan amount applied</th>
                <th>Login Refer Number</th>
                <th>Amount Approved</th>
                <th>Roi</th>
                <th>Tennure</th>
                <th>Emi</th>
                <th>Insurance</th>
                <th>processing Fee</th>
                <th>Stamp Duty</th>
                <th>Gap Interest Emi</th>
                <th>Insurance Premium</th>
                <th>Other Charges</th>
                <th>Last Updated</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user_info as $cus )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->cus_phonenumber}}</td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->productname}}</td>
                    <td>{{$cus->subproductname}}</td>
                    <td>{{$cus->current_loation}}</td>
                    @if($cus->profile_gen_status==1)
                    <td>Yes</td>
                    @else
                    <td>No</td>
                    @endif
                    @if($cus->profile_accepted_status==1)
                    <td>Accepted</td>
                    @else
                    <td>Denied</td>
                    @endif
                    @if($cus->documents_collected_status==1)
                    <td>Collected</td>
                    @else
                    <td>Not Collected</td>
                    @endif
                    <td>{{$cus->status_code}}</td>
                    @if($cus->con_lead_before_info==1)
                    <td>{{$cus->con_lead_bussiness_name}}</td>
                    <td>{{$cus->con_lead_lg_name}}</td>
                    <td>{{$cus->con_lead_lc_name}}</td>
                    <td>{{$cus->con_lead_source_team}}</td>
                    <td>{{$cus->con_lead_channel}}</td>
                    <td>{{$cus->con_lead_bank_name}}</td>
                    <td>{{$cus->con_lead_vendor_name}}</td>
                    <td>{{$cus->con_lead_loan_amount_applied}}</td>
                    <td>{{$cus->con_lead_login_ref_no }}</td>
                    <td>{{$cus->con_lead_loan_amount_aproved}}</td>
                    <td>{{$cus->con_lead_roi}}</td>
                    <td>{{$cus->con_lead_tennure}}</td>
                    <td>{{$cus->con_lead_emi}}</td>
                    <td>{{$cus->con_lead_insurance_status}}</td>
                    <td>{{$cus->con_lead_pf_gst}}</td>
                    <td>{{$cus->con_lead_stamp_duty}}</td>
                    <td>{{$cus->con_lead_gap_inter_emi}}</td>
                    <td>{{$cus->con_lead_insurance_premium}}</td>
                    <td>{{$cus->con_lead_other_charges }}</td>
                    <td>{{$cus->updated_at}}</td>
                    <td>{{$cus->created_at}}</td>
                    @else
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    <td>NOT FILLED</td>
                    @endif
                  </tr>
                  @endforeach
            </tbody>
          </table>
    </div>

</div>
