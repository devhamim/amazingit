@extends('layouts.dashboard')
@section('content')
    <!-- [ Layout content ] Start -->
    <div class="layout-content">

        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Messages</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item">Messages</li>
                    <li class="breadcrumb-item active">Messages</li>
                </ol>
            </div>
            <form action="{{route('message.sent')}}" method="POST">
                @csrf
            <div class=" overflow-hidden">
                <div class="row">
                    <div class="col-md-7 m-auto card">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label class="form-label">Number</label>
                                            <input type="text" name="number" class="form-control" value="{{ old('number') }}" placeholder="Enter your address">
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" name="message" rows="5" placeholder="Enter your Message">{{ old('message') }}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                </div>
            </div>
        </form>

        </div>
        <!-- [ content ] End -->
    @endsection
