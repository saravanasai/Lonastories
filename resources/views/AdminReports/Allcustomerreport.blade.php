@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    {{-- <h2 class="mb-4">All Customers</h2> --}}
                </div>
                <div class="col mt-1">
                    @if (session('admin'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
     <div>
    <div class="container">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">ALL MEMBERS</h3>

              <div class="card-tools">
                    <form action="{{route('allcustomer.export')}}" method="post">
                        @csrf
                        <input type="hidden" name="export_all">
                        <button type="submit" class="btn btn-primary">
                        <i class="fas fa-file-export px-2"></i>Export
                        </button>
                    </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body  p-0">
              @include('components.all-customer-table',$customer)
             {{-- <x-all-customer-table :customer="$customer">
             </x-all-customer-table> --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                    {{$customer->links()}}

            </div>
          </div>

    </div>
    </div>
    </div>
@endsection
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
