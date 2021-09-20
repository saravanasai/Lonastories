<div>
    <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Phonenumber</th>
            <th>Email</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customer as $cus )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cus->name}}</td>
                <td>{{$cus->cus_phonenumber}}</td>
                <td>{{$cus->email}}</td>
                <td>{{$cus->created_at}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
