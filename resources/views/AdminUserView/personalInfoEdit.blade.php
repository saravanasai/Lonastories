@extends('layouts.master')
<style>
    .scroll {
    max-height: 85vh;
    overflow-y: auto;
}
</style>
@section('content')
    <!-- Main content -->
    <div class="content">
       <div class="container mt-3">
          <div class="card card-purple">
              <div class="card-header">
                  PERSONAL INFO FORM EDIT
                  <div class="card-tools">
                      <a href="{{route('PersonalInfoAdmin.show',$pr_info->pr_form_of_user)}}" class="btn btn-sm btn-primary"><i class="fas fa-backward px-2"></i>BACK</a>
                  </div>
              </div>
         <form action="{{route('PersonalInfoAdd.update',$pr_info->pr_form_of_user)}}" method="post">
             @csrf
             @method('PUT')
             <input type="hidden" name="cus_id" value="{{$pr_info->pr_form_of_user}}">
              <div class="card-body scroll">
                   {{-- first tab --}}
                   <div class="tab-pane active" id="textactivity">
                    <div class="row">
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Original Name</label>
                                @error('Original_Name')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Original_Name" value="{{$pr_info->Original_Name}}" id="text"   >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Education Qualification</label>
                                @error('Education_Qualification')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Education_Qualification" value="{{$pr_info->Education_Qualification}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Marital Status</label>
                                @error('Marital_Status')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Marital_Status" value="{{$pr_info->Marital_Status}}" id="text"   >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Spouse name</label>
                                @error('Spouse_name')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Spouse_name" value="{{$pr_info->Spouse_name}}" id="text"  >
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">Spouse DOB</label>
                                @error('Spouse_DOB')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="date" class="form-control" value="{{$pr_info->Spouse_DOB}}" name="Spouse_DOB" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Father Name</label>
                                @error('Father_Name')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" name="Father_Name" value="{{$pr_info->Father_Name}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Mother Name</label>
                                @error('Mother_Name')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Mother_Name" value="{{$pr_info->Mother_Name}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group">
                                <label for="text">Current Address</label>
                                @error('Current_Address')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror

                                <textarea class="form-control" name="Current_Address"  rows="3">{{$pr_info->Current_Address}}</textarea>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Residence Mobile No</label>
                                @error('Residence_Mobile_No')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="number" class="form-control" name="Residence_Mobile_No" value="{{$pr_info->Residence_Mobile_No}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group">
                                <label for="text">Current Address Landmark</label>
                                @error('Current_Address_Landmark')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Current_Address_Landmark" value="{{$pr_info->Current_Address_Landmark}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Resi type</label>
                                <select class="form-control" name="resi_type">
                                    @error('resi_type')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                    @enderror
                                    <option value="">Choose Resident Type</option>
                                    <option value="Own House">Own House</option>
                                    <option value="Family Owned House">Family Owned House</option>
                                    <option value="Rented">Rented</option>
                                    <option value="Lease">Lease</option>
                                    <option value="Company Provided">Company Provided</option>
                                  </select>
                              </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">No of years current residence</label>
                                @error('No_of_years_cur_resi')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="number" name="No_of_years_cur_resi" value="{{$pr_info->No_of_years_cur_resi}}" class="form-control" id="text"  >
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">No of years current city</label>
                                @error('No_of_years_cur_city')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="number" name="No_of_years_cur_city" class="form-control" value="{{$pr_info->No_of_years_cur_city}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="form-group">
                                <label for="text">Permanent Address</label>
                                @error('Pr_Address')
                                    <div class="text-danger"><strong>Enter Permanent Address</strong></div>
                                @enderror
                                <textarea class="form-control" name="Pr_Address"  rows="3">{{$pr_info->Pr_Address}}</textarea>
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Permanent Address Mobile No</label>
                                @error('Pr_Address_mobile_no')
                                    <div class="text-danger"><strong>Enter Phone Number</strong></div>
                                @enderror
                                <input type="text" name="Pr_Address_mobile_no" value="{{$pr_info->Pr_Address_mobile_no}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Permanent Address Landmark</label>
                                @error('Pr_Address_Landmark')
                                    <div class="text-danger"><strong>Enter The Permanent Address</strong></div>
                                @enderror
                                <input type="text" name="Pr_Address_Landmark" value="{{$pr_info->Pr_Address_Landmark}}" class="form-control" id="text"  >
                              </div>
                        </div>
                    </div>
                    </div>
                <!-- / end of first tab.tab-pane -->
                <!-- start of second tab.tab-pane -->
                <div class="tab-pane" id="texttimeline">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group">
                                <label for="text">Office Address</label>
                                @error('Of_Address')
                                    <div class="text-danger"><strong>Enter Office Address</strong></div>
                                @enderror
                                <textarea class="form-control" name="Of_Address"  rows="3">{{$pr_info->Of_Address}}</textarea>
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Office Address Landmark</label>
                                @error('Of_Address_Landmark')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Of_Address_Landmark" value="{{$pr_info->Of_Address_Landmark}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Office Address contact no</label>
                                @error('Of_Address_contact_no')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="number" name="Of_Address_contact_no" value="{{$pr_info->Of_Address_contact_no}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">Permanent mail</label>
                                @error('Per_mail')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="email" name="Per_mail" value="{{$pr_info->Per_mai}}" class="form-control" id="text"  >
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Office Mail</label>
                                @error('Of_mail')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="email" name="Of_mail" value="{{$pr_info->Of_mail}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Salary Account bank name</label>
                                @error('Salary_account_bank_name')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Salary_account_bank_name" value="{{$pr_info->Salary_account_bank_name}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Salary account bank ac no</label>
                                @error('Salary_account_bank_ac_no')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Salary_account_bank_ac_no" value="{{$pr_info->Salary_account_bank_ac_no}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">DOJ of current company</label>
                                @error('DOJ_of_current_company')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="date" name="DOJ_of_current_company" value="{{$pr_info->DOJ_of_current_company}}" class="form-control" id="text"  >
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Total work expirence</label>
                                @error('Total_work_expirence')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="number" class="form-control" value="{{$pr_info->Total_work_expirence}}" name="Total_work_expirence" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Reference 1 name</label>
                                @error('Reference_1_name')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Reference_1_name" value="{{$pr_info->Reference_1_name}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Reference 1 contact_no</label>
                                @error('Reference_1_contact_no')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="number" name="Reference_1_contact_no" value="{{$pr_info->Reference_1_contact_no}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Reference 1 complete address</label>
                                @error('Reference_1_complete_address')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Reference_1_complete_address" value="{{$pr_info->Reference_1_complete_address}}" class="form-control" id="text"  >
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">Relation 1 type</label>
                                @error('Relation_1_type')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Relation_1_type" value="{{$pr_info->Relation_1_type}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">Reference 2 name</label>
                                @error('Reference_2_name')
                                    <div class="text-danger"><strong>{{$message}}</strong></div>
                                @enderror
                                <input type="text" name="Reference_2_name" value="{{$pr_info->Reference_2_name}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <label for="text">Reference 2 contact</label>
                                @error('Reference_2_contact_no')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="number" name="Reference_2_contact_no" value="{{$pr_info->Reference_2_contact_no}}" class="form-control" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Reference 2 complete address</label>
                                @error('Reference_2_complete_address')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" class="form-control" name="Reference_2_complete_address" value="{{$pr_info->Reference_2_complete_address}}" id="text"  >
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="text">Relation 2 type</label>
                                @error('Relation_2_type')
                                    <div class="text-danger"><strong>Fill This Feild</strong></div>
                                @enderror
                                <input type="text" name="Relation_2_type" class="form-control" value="{{$pr_info->Relation_2_type}}" id="text"  >
                              </div>
                        </div>
                    </div>
                </div>
                <!-- / end of second tab.tab-pane -->
              </div>
          </div>
            <div class="float-right">
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane px-1"></i>UPDATE</button>
            </div>
        </form>
       </div>
    </div>
    @endsection
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

