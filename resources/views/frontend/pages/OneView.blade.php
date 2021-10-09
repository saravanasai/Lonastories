@extends('layouts.FronendMaster')
<style>
    th {
        text-align: center !important;
    }

</style>
@section('content')
    <section class="bg-transparent m-0 p-0">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <img src="{{ asset('frontend/img/oneview.png') }}" class="rounded" alt=""
                    style="width: 80vw">
            </div>
            <div class="row justify-content-center pt-4">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-gray">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h4 class="mb-0 text-center text-light">Add Your Existing Loan Detials</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.existingEmiShedule') }}" method="POST"
                                enctype="multipart/form-data" id="basic-form">
                                @csrf
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Name of
                                                    the Bank
                                                </label>
                                                <input class="form-control" id="bnkNme" name="bank_name" type="text"
                                                    required oninput="this.value = this.value.replace(/[^a-z]/, '')">
                                                <small class="bnkNme text-danger" hidden>Required*</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Type of
                                                    Loan
                                                </label>
                                                <input class="form-control" id="loanTyp" type="text" name="type_of_loan"
                                                    required>
                                                <small class="loanTyp text-danger" hidden>Required*</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Loan
                                                    Amount
                                                </label>
                                                <input type="text" id="amnt" class="form-control" name="loan_amount"
                                                    placeholder="" value="" required oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">ROI</label>
                                                <input type="text" id="roi" name="roi" class="form-control"
                                                    placeholder="In %" required oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Tenure
                                                </label>
                                                <input type="text" id="tenure" class="form-control" name="tenure"
                                                    placeholder="In Months" required oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">EMI
                                                </label>
                                                <input type="text" id="emi" name="emi" class="form-control"
                                                    placeholder="From Your Loan Taken Date" style="background: transparent;"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Upload Your
                                                    Schedule
                                                </label>
                                                <input type="file" name="shedule_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pt-md-4">
                                        <div class="col-md-12 text-center">
                                            <button type="button" onclick="Emi()" id="getEmi"
                                                class="btn btn-darkblue"><b>Get
                                                    Emi</b></button>
                                            <button type="submit" id="add" class="btn btn-success">Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4 text-center text-dark">One View Table</h3>
                    <div class="table-responsive rounded ">
                        <table class="table table-bordered align-items-center text-light">
                            <thead class="bg-gray">
                                <tr class="">
                                    <th class="">S.no</th>
                                    <th class="
                                    ">Lender Name</th>
                                    <th class=" ">Loan Type</th>
                                        <th class="
                                    ">Loan Amount
                                    </th>
                                    <th class="">
                                    ROI</th>
                                    <th class="">Tenure</th>
                                    <th class=" ">EMI</th>
                                    <th class="">Schedule</th>
                                </tr>
                            </thead>
                            <tbody id=" frontend_existing_loan_detail">
                                @foreach ($emi_shedules as $emi_shedule)
                                    <tr class="text text-dark text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $emi_shedule->emi_sh_name_of_bank }}</td>
                                        <td>{{ $emi_shedule->emi_sh_type_of_loan }}</td>
                                        <td>{{ $emi_shedule->emi_sh_loan_amount }}</td>
                                        <td>{{ $emi_shedule->emi_sh_roi }}</td>
                                        <td>{{ $emi_shedule->emi_sh_tenure }}</td>
                                        <td>{{ $emi_shedule->emi_sh_emi }}</td>
                                        @if ($emi_shedule->emi_shedule_status==0)
                                        <td>
                                            <form action="{{route('user.existingEmiSheduleRestoreStore')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col col-md-6">
                                                            <div class="form-group">
                                                                @error('shedule_file')
                                                                    <div class="text-danger">{{$message}}</div>
                                                                @enderror
                                                                <input type="hidden" name="shedule_id" value="{{ $emi_shedule->id}}">
                                                                <input type="file" name="shedule_file" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col col-md-6">
                                                            <button type="submit" id="add" class="btn btn-success">Upload
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        @else
                                        <td><a href="{{asset('SheduleDocs/'.$emi_shedule->emi_sh_file)}}" download="Shedule{{$emi_shedule->id}}" class="btn btn-sm btn-primary">Shedule</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--================================= Scripting=================================================== -->

<script type="text/javascript">
    //Add Your Existing Loan Detials============================
    function Emi() {
        let valid = true;
        let loanTyp = $('#loanTyp').val();
        let bnkNme = $('#loanTyp').val();
        let loanTke = $('#loanTke').val();

        let P = parseInt($('#amnt').val());
        let rate = parseInt($('#roi').val());
        let n = parseInt($('#tenure').val());

        // let n = tkeMnth + tenure;

        let r = rate / (12 * 100);
        let prate = (P * r * Math.pow((1 + r), n)) / (Math.pow((1 + r), n) - 1);
        let emi = (Math.ceil(prate * 100) / 100).toFixed(0);


        if (isNaN(emi)) {
            emi = 'Enter The Valid Amount';
            $('#emi').css("color", "#FF7F7F");
        } else {
            emi = '₹ ' + emi;
            $('#emi').css("color", "#000");
        }
        // emi = isNaN(emi) ?  : ;

        $('#emi').val(emi);
    };
    //Add Your Existing Loan Detials============================
</script>

<!--================================= Scripting=================================================== -->
