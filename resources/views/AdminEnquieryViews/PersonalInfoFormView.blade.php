@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h4 class="mb-4">PEROSONAL INFO FORM VIEW</h4>
                </div>
                <div class="col mt-1">
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('customer.master') }}">Back</a></p>
                        </div>
                </div>
            </div>
        </div>
     <div>
    <div class="container mt-2">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">TAB 1</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">TAB 2</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- first tab --}}
                                    <div class="tab-pane active" id="activity">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Original Name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Original_Name}}"  disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Education Qualification</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Education_Qualification}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Marital Status</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"  value="{{$pr_form->Marital_Status}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Spouse name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Spouse_name}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Spouse DOB</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Spouse_DOB}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Father Name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Father_Name}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mother Name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Mother_Name}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Current Address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Current_Address}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Residence Mobile No</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Residence_Mobile_No}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Current Address Landmark</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Current_Address_Landmark}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Resi type</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Resi_type}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of years current residence</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->No_of_years_cur_resi}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">No of years current city</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->No_of_years_cur_city}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Permanent Address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Pr_Address}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Permanent Address Mobile No</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Pr_Address_mobile_no}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Permanent Address Landmark</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Pr_Address_Landmark}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / end of first tab.tab-pane -->
                                    <!-- start of second tab.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Office Address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Of_Address}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Office Address Landmark</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Of_Address_Landmark}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Office Address contact no</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Of_Address_contact_no}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Permanent mail</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Per_mail}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Office Mail</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Of_mail}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Salary Account bank name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Salary_account_bank_name}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Salary account bank ac no</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Salary_account_bank_ac_no}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">DOJ of current company</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->DOJ_of_current_company}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Total work expirence</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Total_work_expirence}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 1 name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_1_name}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 1 contact_no</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_1_contact_no}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 1 complete address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_1_complete_address}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Relation 1 type</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Relation_1_type}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 2 name</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_2_name}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 2 contact</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_2_contact_no}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reference 2 complete address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Reference_2_complete_address}}" disabled>
                                                  </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Relation 2 type</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$pr_form->Relation_2_type}}" disabled>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / end of second tab.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
     </div>
     </div>
 @endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

