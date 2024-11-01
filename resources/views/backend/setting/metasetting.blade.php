@extends('layouts.dashboard')
@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Meta Settings</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item active"><a href="#!">Meta Settings</a></li>
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
                            <button class="btn btn-success btn-sm mb-3 btn-round" data-toggle="modal" data-target="#user_register"><i class="feather icon-plus"></i>Add Meta Settings</button>
                        </div>
                    </div>
                    <div class="table table-responsive table-hover">
                        <table id="report-table" class="table table-bordered text-center table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    <th>Meta Title</th>
                                    <th>Meta Tag</th>
                                    <th>Meta Description</th>
                                    <th>Pages</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metasettings as $sl=>$metasetting)
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{$metasetting->title}}</td>
                                        <td>{{$metasetting->meta_title}}</td>
                                        <td>{{$metasetting->meta_tag}}</td>
                                        <td>{{ Str::limit($metasetting->meta_description, 30, '...') }}</td>
                                        <td>{{$metasetting->pages}}</td>
                                        <td>
                                            <span class="badge badge-{{$metasetting->status == 1 ? 'success' : 'danger'}}">{{$metasetting->status == 1 ? 'Active' : 'Deactive'}}</span>
                                        </td>
                                        <td>
                                            <button type="button" value="{{$metasetting->id}}" class="btn btn-info btn-sm edit-btn" data-user-id="{{$metasetting->id}}" data-toggle="modal" data-target="#modals-default">
                                                <i class="feather icon-edit"></i>&nbsp;
                                            </button>
                                            <a href="{{route('meta.setting.delete', $metasetting->id)}}" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp; </a>

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

@if ($errors->has('file'))
    <div class="modal fade show" id="modals-default" aria-modal="true" style="display: block;">
@else
    <div class="modal fade" id="modals-default">
@endif
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{route('meta.setting.update')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Update Meta Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-sm-12">
                            <input type="hidden" name="meta_id" id="meta_id">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $metasetting->title }}" placeholder="Enter your Title">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $metasetting->meta_title }}" placeholder="Enter your Meta Title">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Meta Tag</label>
                                <input type="text" name="meta_tag" id="meta_tag" class="form-control" value="{{ $metasetting->meta_tag }}" placeholder="Enter your Meta Tag">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Meta Description</label>
                                <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ $metasetting->meta_description }}" placeholder="Enter your Meta Description">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Pages</label>
                                <select name="pages" id="pages"  class="form-control">
                                    <option value="home" {{ $metasetting->pages=='home'?'select':'' }}>Home</option>
                                    <option value="about" {{ $metasetting->pages=='about'?'select':'' }}>About</option>
                                    <option value="services" {{ $metasetting->pages=='services'?'select':'' }}>Services</option>
                                    <option value="services_product" {{ $metasetting->pages=='services_product'?'select':'' }}>Services Product</option>
                                    <option value="services_product_details" {{ $metasetting->pages=='services_product_details'?'select':'' }}>Services Product Details</option>
                                    <option value="our_products" {{ $metasetting->pages=='our_products'?'select':'' }}>Our Products</option>
                                    <option value="product_details" {{ $metasetting->pages=='product_details'?'select':'' }}>Product Details</option>
                                    <option value="portfolio_details" {{ $metasetting->pages=='portfolio_details'?'select':'' }}>Portfolio Details</option>
                                    <option value="our_protfolio" {{ $metasetting->pages=='our_protfolio'?'select':'' }}>Our Protfolio</option>
                                    <option value="our_cliends" {{ $metasetting->pages=='our_cliends'?'select':'' }}>Our Cliends</option>
                                    <option value="contact" {{ $metasetting->pages=='contact'?'select':'' }}>Contect</option>
                                </select>
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

@if ($errors->has('file'))
    <div class="modal show" id="user_register" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" style="display: block;" aria-modal="true">
@else
    <div class="modal" id="user_register" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
@endif
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Meta Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('meta.setting.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter your Title">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Enter your Meta Title">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Meta Tag</label>
                                    <input type="text" name="meta_tag" class="form-control" placeholder="Enter your Meta Tag">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control" placeholder="Enter your Meta Description">
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Pages</label>
                                    <select name="pages" id="pages"  class="form-control">
                                        <option value="home">Home</option>
                                        <option value="about">About</option>
                                        <option value="services">Services</option>
                                        <option value="services_product">Services Product</option>
                                        <option value="services_product_details">Services Product Details</option>
                                        <option value="our_products">Our Products</option>
                                        <option value="product_details">Product Details</option>
                                        <option value="portfolio_details">Portfolio Details</option>
                                        <option value="our_protfolio">Our Protfolio</option>
                                        <option value="our_cliends">Our Cliends</option>
                                        <option value="contact">Contect</option>
                                    </select>
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
            url: '/editmeta/' + edit_id,
            data: {'meta_id': edit_id},
            dataType: 'json',
            success: function(data) {
                $('#meta_id').val(data.meta.id);
                $('#title').val(data.meta.title);
                $('#meta_title').val(data.meta.meta_title);
                $('#meta_tag').val(data.meta.meta_tag);
                $('#meta_description').val(data.meta.meta_description);
                $('#pages').val(data.meta.pages);
                $('#status').val(data.meta.status);
            }
        });
    });
</script>

@endsection
