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
                  EXITSING LOAN INFO ADD FORM
                  <div class="card-tools">
                      <a href="{{route('ExistingLoans.show',$cus_id)}}" class="btn btn-sm btn-primary"><i class="fas fa-backward px-2"></i>BACK</a>
                  </div>
              </div>
         <form action="{{route('ExistingEmiInfoAddAdmin.store')}}" enctype="multipart/form-data" method="post">
             @csrf
             <input type="hidden" name="cus_id" value="{{$cus_id}}">
                  <div class="container mt-5">
                      <div class="row">
                          <div class="col col-md-4">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                @error('Bank_Name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                                <input type="text" id="bank_name" placeholder="Bank Name" name="Bank_Name" class="form-control">
                              </div>
                          </div>
                          <div class="col col-md-4">
                            <div class="form-group">
                                <label for="type_of_loan">Type of Loan</label>
                                @error('type_of_loan')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <select id="type_of_loan" name="type_of_loan" class="form-control custom-select">
                                    <option selected value="" disabled="">Type Of Loan</option>
                                    <option value="Personal Loan" >Personal Loan</option>
                                    <option value="Home Loan" >Home Loan</option>
                                    <option value="Bussiness Loan" >Bussiness Loan</option>
                                    <option value="Mortage Loan" >Mortage Loan</option>
                                    <option value="Education Loan" >Education Loan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col col-md-4">
                            <div class="form-group">
                                <label for="loan_amount">Loan Amount</label>
                                @error('loan_amount')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <input type="number" id="loan_amount" name="loan_amount" placeholder="Loan Amount" class="form-control">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col col-md-4">
                          <div class="form-group">
                              <label for="roi">Roi</label>
                              @error('roi')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                              <input type="number" id="roi" name="roi" placeholder="rate of interest" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-4">
                          <div class="form-group">
                              <label for="Tenure">Tenure</label>
                              @error('Tenure')
                              <div class="text-danger">{{$message}}</div>
                              @enderror
                              <input type="number" id="Tenure" placeholder="In Months" name="Tenure" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-4">
                          <div class="form-group">
                              <label for="existing_emi">Existing Emi</label>
                              <input type="text" id="existing_emi" name="existing_emi" class="form-control" placeholder="Emi" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                          <div class="form-group">
                              <label for="inputEstimatedBudget">Emi Shedule</label>
                              @error('Emi_Shedule')
                                    <div class="text-danger"><Strong>{{$message}}</Strong></div>
                              @enderror
                              <input type="file" name="Emi_Shedule" id="inputEstimatedBudget" class="form-control">
                            </div>
                        </div>
                        <div class="col col-md-6">
                          <div class="form-group mt-4 py-2">
                              <div class="float-right">
                                <button type="button" id="calculate_btn" class="btn  btn-primary"><i class="fas fa-calculator px-1"></i>CALCULATE</button>
                                <button type="submit" id="add_btn" class="btn  btn-success"><i class="fas fa-paper-plane px-1"></i>ADD</button>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
        </form>
       </div>
    </div>
    @endsection
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>

       $(function()
       {
            //to disable submit button
            $('#add_btn').prop('disabled',true);

          //script to calcuate teh emi and validation for all feilds
          $('body').on('click','#calculate_btn',function()
          {

                $('#loan_amount').removeClass('is-invalid');
                $('#roi').removeClass('is-invalid');
                $('#Tenure').removeClass('is-invalid');



                let loan_amount= $('#loan_amount').val();
                let roi= $('#roi').val();
                let Tenure= $('#Tenure').val();
                validation_status=true;

                if(loan_amount=="")
                {
                    $('#loan_amount').addClass('is-invalid');
                    validation_status=false;
                }
                if(roi=="")
                {
                    $('#roi').addClass('is-invalid');
                    validation_status=false;
                }
                if(Tenure=="")
                {
                    $('#Tenure').addClass('is-invalid');
                    validation_status=false;
                }

                  //section to append valuteto emi
                  if(validation_status)
                  {
                    $('#existing_emi').val(calculate_emi(loan_amount,roi,Tenure));
                    $('#add_btn').prop('disabled',false);
                  }

          });

        //uility function
        function calculate_emi(Ln_amount, Roi, Tennure) {
            var r = Number(Roi) / 12 / 100;
            var n = Tennure;
            var p = Ln_amount;
            var TotalEmi = Math.round(p * r * Math.pow((1 + r), n) / (Math.pow((1 + r), n) -
                1));
            return TotalEmi;
        }


       });


    </script>
