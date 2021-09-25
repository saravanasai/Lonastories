<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
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
                        <td>{{$cus->upd}}</td>
                        <td>{{$cus->crt}}</td>
                      </tr>
                      @endforeach
                </tbody>
              </table>
        </div>

    </div>

</div>
