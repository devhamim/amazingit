@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Shop Category</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Shop Category</a></li>
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
                            <button class="btn btn-success btn-sm mb-3 btn-round" data-toggle="modal" data-target="#user_register"><i class="feather icon-plus"></i>Category</button>
                        </div>
                    </div>
                    <div class="table table-responsive table-hover">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopcategorys as $sl=>$shopcategory)
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{$shopcategory->name}}</td>
                                        <td>
                                            <span class="badge badge-{{$shopcategory->status == 1 ? 'success' : 'danger'}}">{{$shopcategory->status == 1 ? 'Active' : 'Deactive'}}</span>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$shopcategory->id}}" class="btn btn-info btn-sm edit-btn" data-user-id="{{$shopcategory->id}}" data-toggle="modal" data-target="#modals-default">
                                                <i class="feather icon-edit"></i>&nbsp;
                                            </button>
                                            {{-- <a href="{{route('shop.category.delete', $shopcategory->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp; </a> --}}

                                        </td>
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


<div class="modal fade" id="modals-default">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('shop.category.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-sm-12">
                            <input type="hidden" name="shopcategory_id" id="shopcategory_id">
                            <div class="form-group">
                                <label class="form-label">Name *</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="clearfix"></div>
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


    <div class="modal" id="user_register" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('shop.category.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div class="clearfix"></div>
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
            url: '/editshopcategory/' + edit_id,
            data: {'shopcategory_id': edit_id},
            dataType: 'json',
            success: function(data) {
                $('#shopcategory_id').val(data.shopcategory.id);
                $('#name').val(data.shopcategory.name);
            }
        });
    });
</script>

@endsection
