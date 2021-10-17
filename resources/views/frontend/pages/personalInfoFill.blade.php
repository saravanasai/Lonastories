@extends('layouts.FronendMaster')
@section('content')
    {{-- <section> --}}
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-12">
                    <form action="{{ route('user.personalInfoFillStore') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-nav text-center">
                                <h2 class="text-light">Fill Your Details</h2>
                            </div>
                            <div class="card-body font-weight-bold text-secondary">
                                <h3 class="font-weight-bold text-center">Personal Information</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label" for="Original_Name">
                                                Name
                                            </label>
                                            <input class="form-control" id="Original_Name" name="Original_Name"
                                                placeholder="Full Name" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Per_mail">
                                                Personal Mail ID
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Per_mail" name="Per_mail"
                                                placeholder="etc@gmail.com" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Education_Qualification">
                                                Education Qualification
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Education_Qualification"
                                                name="Education_Qualification" placeholder="Your Qualifications" type="text"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label" for="Marital_Status">
                                                Marital Status
                                                <span class="asteriskField">

                                                </span>
                                            </label>
                                            <select class="select form-control" id="Marital_Status" name="Marital_Status"
                                                >
                                                <option value="unmarried">
                                                    unmarried
                                                </option>
                                                <option value="Married">
                                                    Married
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label" for="Spouse_name">
                                                Spouse name
                                                <span class="asteriskField">

                                                </span>
                                            </label>
                                            <input class="form-control" id="Spouse_name" name="Spouse_name"
                                                placeholder="Enter Your Spouse Name" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label" for="Spouse_DOB">
                                                Spouse DOB
                                                <span class="asteriskField">

                                                </span>
                                            </label>
                                            <input class="form-control" id="Spouse_DOB" name="Spouse_DOB"
                                                placeholder="MM/DD/YYYY" type="text" onclick="type='date'"
                                                onblur="type='text'"  />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Father_Name">
                                                Father Name
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Father_Name" name="Father_Name"
                                                placeholder="Your Father Name" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Mother_Name">
                                                Mother Name
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Mother_Name" name="Mother_Name"
                                                placeholder="Your Mother Name" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Resi_type">
                                                Residence Type
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <select class="select form-control" id="Resi_type" name="Resi_type" required>
                                                <option value="Own House">
                                                    Own House
                                                </option>
                                                <option value="Family Owned House">
                                                    Family Owned House
                                                </option>
                                                <option value="Rented">
                                                    Rented
                                                </option>
                                                <option value="Lease">
                                                    Lease
                                                </option>
                                                <option value="Company Provided ">
                                                    Company Provided
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Residence_Mobile_No">
                                                Residence Telephone/Mobile No
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Residence_Mobile_No"
                                                name="Residence_Mobile_No" placeholder="01234 56789" type="text"
                                                pattern="\d*" maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Pr_Address_mobile_no">
                                                Permanent Address Mobile No
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Pr_Address_mobile_no"
                                                name="Pr_Address_mobile_no" placeholder="01234 56789" type="text"
                                                pattern="\d*" maxlength="10" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Current_Address">
                                                Current Address with Pin code
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Current_Address" name="Current_Address"
                                                placeholder="Address With Pincode" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Pr_Address">
                                                Permanent Address & Pin code
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Pr_Address" name="Pr_Address"
                                                placeholder="Address With Pincode" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Current_Address_Landmark">
                                                Current Address Landmark
                                            </label>
                                            <input class="form-control" id="Current_Address_Landmark"
                                                name="Current_Address_Landmark" placeholder="Land Mark" type="text"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Pr_Address_Landmark">
                                                Permanent Address Landmark
                                            </label>
                                            <input class="form-control" id="Pr_Address_Landmark"
                                                name="Pr_Address_Landmark" placeholder="Land Mark" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="No_of_years_cur_resi">
                                                No of years in current Residence
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="No_of_years_cur_resi"
                                                name="No_of_years_cur_resi" placeholder="etc., 12 " type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="No_of_years_cur_city">
                                                No-years in current City
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="No_of_years_cur_city"
                                                name="No_of_years_cur_city" placeholder="etc., 12" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h4 class="font-weight-bold text-center">Work Information</h4>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Total_work_expirence">
                                                Total work expirence
                                            </label>
                                            <input class="form-control" id="Total_work_expirence"
                                                name="Total_work_expirence" placeholder="Work Experience" type="text"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="DOJ_of_current_company">
                                                DOJ of current company
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="DOJ_of_current_company"
                                                name="DOJ_of_current_company" placeholder="Date of joining" type="text"
                                                onclick="type='date'" onblur="type='text'" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Of_Address_contact_no">
                                                Office Address contact No.
                                            </label>
                                            <input class="form-control" id="Of_Address_contact_no" type="text"
                                                name="Of_Address_contact_no" placeholder="01234 56789" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Of_mail">
                                                Official Mail ID
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Of_mail" name="Of_mail"
                                                placeholder="etc@gmail.com" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Of_Address">
                                                Office Address with Pin code
                                            </label>
                                            <input class="form-control" id="Of_Address" name="Of_Address"
                                                placeholder="Address With Pincode" type="text" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Of_Address_Landmark">
                                                Office Address Landmark
                                            </label>
                                            <input class="form-control" id="Of_Address_Landmark"
                                                name="Of_Address_Landmark" placeholder="Land Mark" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Salary_account_bank_name">
                                                Salary account Bank Name
                                            </label>
                                            <input class="form-control" id="Salary_account_bank_name"
                                                name="Salary_account_bank_name"
                                                placeholder="Bank Name Of Your Salary Account" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Salary_account_bank_ac_no">
                                                Salary account Bank Account Number
                                            </label>
                                            <input class="form-control" id="Salary_account_bank_ac_no"
                                                name="Salary_account_bank_ac_no" placeholder="Salary Account Number"
                                                type="text" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label " for="Salary_account_bank_ac_no">
                                                IFSC Code
                                            </label>
                                            <input class="form-control" id="ifsc_code"
                                                name="ifsc_code" placeholder="IFSC Code"
                                                type="text" required/>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <h4 class="font-weight-bold text-center">Reference Information</h4>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_1_name">
                                                Ref. Name
                                            </label>
                                            <input class="form-control" id="Reference_1_name" name="Reference_1_name"
                                                placeholder="Reference 1" type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_1_contact_no">
                                                Ref. Contact Number
                                            </label>
                                            <input class="form-control" id="Reference_1_contact_no"
                                                name="Reference_1_contact_no" placeholder="Reference 1 contact no."
                                                type="text" required maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_1_complete_address">
                                                Ref. Address with pincode
                                            </label>
                                            <input class="form-control" id="Reference_1_complete_address"
                                                name="Reference_1_complete_address" placeholder="Reference 1 Address"
                                                type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Relation_1_type">
                                                Relation Type
                                            </label>
                                            <input class="form-control" id="Relation_1_type" name="Relation_1_type"
                                                placeholder="Type Of Relation 1" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_2_name">
                                                Ref. Name
                                            </label>
                                            <input class="form-control" id="Reference_2_name" name="Reference_2_name"
                                                placeholder="Reference 2" type="text"  required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_2_contact_no">
                                                Ref. Contact Number
                                            </label>
                                            <input class="form-control" id="Reference_2_contact_no"
                                                name="Reference_2_contact_no" placeholder="Reference 2 contact no."
                                                type="text" maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Reference_1_complete_address">
                                                Ref. Address with pincode
                                            </label>
                                            <input class="form-control" id="Reference_1_complete_address"
                                                name="Reference_2_complete_address" placeholder="Reference 2 Address"
                                                type="text" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label " for="Relation_2_type">
                                                Relation Type
                                            </label>
                                            <input class="form-control" id="Relation_2_type" name="Relation_2_type"
                                                placeholder="Type Of Relation 2" type="text" required />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-success btn-block"
                                    value="">Submit Your Details</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- </section> --}}
@endsection
