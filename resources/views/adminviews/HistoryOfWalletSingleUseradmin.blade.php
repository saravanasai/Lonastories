@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h4 class="mb-4">TRANSACTION HISTORY OF CUSTOMER</h4>
                </div>
                <div class="col mt-1">
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('wallteByAdmin.show',$point_given_info[0]->spr_to_user) }}">Back</a></p>
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
                        <div class="card card-purple">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active text-white" href="#activity"
                                            data-toggle="tab">Points Earned</a></li>
                                    <li class="nav-item"><a class="nav-link text-white" href="#timeline" data-toggle="tab">Points Redeemed</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Assign To
                                        </a>
                                    </li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- first tab --}}
                                    <div class="tab-pane active" id="activity">
                                        <div class="card">
                                            <div class="card-body table-responsive p-0">
                                              <table class="table table-hover text-nowrap">
                                                <thead>
                                                  <tr>
                                                    <th>Sno</th>
                                                    <th>Points Given</th>
                                                    <th>Time</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($point_given_info as $points_given )
                                                      <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$points_given->points_given}}</td>
                                                        <td>{{$points_given->created_at->diffForHumans()}}</td>
                                                      </tr>
                                                    @endforeach

                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>

                                    </div>
                                    <!-- / end of first tab.tab-pane -->
                                    <!-- start of second tab.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <div class="card">
                                            <div class="card-body table-responsive p-0">
                                              <table class="table table-hover text-nowrap">
                                                <thead>
                                                  <tr>
                                                    <th>Sno</th>
                                                    <th>Points Redeemed</th>
                                                    <th>Time</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($points_redemed_info as $points_redemed )
                                                      <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$points_redemed->points_redeemed }}</td>
                                                        <td>{{$points_redemed->created_at->diffForHumans()}}</td>
                                                      </tr>
                                                    @endforeach

                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <!-- / end of second tab.tab-pane -->
                                    <div class="tab-pane" id="settings">
                                        {{-- <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Leader Name</th>
                                                    <th>Phone Number</th>
                                                    <th>status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leader_info as $single_leader)
                                                <form action="{{route('cl_enquieryAssign.store')}}" method="post">
                                                    @csrf
                                                    <tr>
                                                        <td>{{ $single_leader->firstname }}</td>
                                                        <td>{{ $single_leader->phonenumber }}</td>
                                                        <td>{{ $single_leader->status }}</td>
                                                        <td><button type="submit"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-clipboard-check px-1"></i>Assign</button>
                                                        </td>
                                                        <input type="hidden" value="{{ $single_leader->id }}"
                                                            name="leader_id">
                                                        <input type="hidden" value="{{ $cl_enquiery->q_enq_id}}"
                                                            name="q_enq_id">
                                                        </td>
                                                    </tr>
                                                </form>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-right">
                                            {{$leader_info->links()}}
                                        </div> --}}
                                    </div>
                                    <!-- /.tab-pane -->
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

