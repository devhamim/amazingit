@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Customer</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Customer</a></li>
        </ol>
    </div>
    <div class="row">
        <!-- customar project  start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center m-l-0">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-success btn-sm mb-3 btn-round" data-toggle="modal" data-target="#customer_add"><i class="feather icon-plus"></i> add Customer</button>
                        </div>
                    </div>
                    <div class="table table-bordered text-center table-striped">
                        <table id="report-table" class=" mb-0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Busines Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Added By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer_list as $sl=>$customer)
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$customer->customer_name}}</td>
                                        <td>{{$customer->busines_name}}</td>
                                        <td>{{$customer->customer_phone}}</td>
                                        <td>{{$customer->customer_email == null ? 'null': $customer->customer_email}}</td>
                                        <td>{{$customer->customer_address == null ? 'null': $customer->customer_address}}</td>
                                        <td>
                                            @if ($customer->rel_to_customer != null )
                                                {{$customer->rel_to_customer->name}}
                                            @else
                                                Null
                                            @endif
                                        </td>
                                        <td><a href="{{route('customer.delete', $customer->id)}}" class=""><i class="fa fa-trash"></i> </a></td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- customar project  end -->
    </div>
</div>

{{-- customer update --}}
@if ($errors->has('user_name')||$errors->has('user_email') || session('user_password'))
    <div class="modal fade show" id="modals-default" aria-modal="true" style="display: block;">
@else
    <div class="modal fade" id="modals-default">
@endif
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('user.update') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Name</label>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <input type="text" name="user_name" id="name" class="form-control" placeholder="Enter your name" >
                        @error('user_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col">
                        <label class="form-label">Email</label>
                        <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter your email">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="mobile">Mobile</label>
                            <input type="mobile" name="mobile" class="form-control" id="mobile" placeholder="Enter your Mobile">
                            @error('mobile')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="1">Super Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Employee</option>
                            </select>
                            @error('role')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <label class="form-label">New Password</label>
                        <input type="password" name="user_password" class="form-control" placeholder="Password">
                        @if(session('user_password'))
                            <span class="text-danger">{{session('user_password')}}</span>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col mb-0">
                        <label class="form-label">Confirm password</label>
                        <input type="password" name="user_password_confirmation" class="form-control" placeholder="Confirm password">
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 mb-5">
                        <div class="form-group fill">
                            <label class="floating-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- customer add --}}
@if ($errors->has('customer_name')||$errors->has('customer_phone') ||$errors->has('busines_name'))
    <div class="modal show" id="customer_add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: block;" aria-modal="true">
@else
      <div class="modal" id="customer_add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
@endif
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('customer.add')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="customer_name">Name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="Name">
                            @error('customer_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="busines_name">Business Name</label>
                            <input type="text" name="busines_name" class="form-control" id="busines_name" placeholder="Business Name">
                            @error('busines_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="customer_phone">Mobile</label>
                            <input type="number" name="customer_phone" class="form-control" id="customer_phone" placeholder="Mobile">
                            @error('customer_phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="customer_email">Email</label>
                            <input type="email" name="customer_email" class="form-control" id="customer_email" placeholder="Email">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label" for="customer_address">Address</label>
                            <input type="text" name="customer_address" class="form-control" id="customer_address" placeholder="Address">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $('.edit-btn').click(function() {
        var edit_id = $(this).data('user-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/editUser/' + edit_id,
            data: {'user_id': edit_id},
            dataType: 'json',
            success: function(data) {
                $('#user_id').val(data.user.id);
                $('#name').val(data.user.name);
                $('#email').val(data.user.email);
                $('#mobile').val(data.user.mobile);
                $('#role').val(data.user.role);
                $('#status').val(data.user.status);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
@endsection
