@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Privacy Policy')
@section('meta_description', $metaSettings->meta_description ?? 'Privacy Policy' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Privacy Policy' )
@section('meta_tag', $metaSettings->meta_tag ?? 'Privacy Policy' )
@section('content')

<div class="container page-content">
    <div class="border-bottom py-4">
        <div class="breadcrumbs row align-items-center justify-content-between d-none d-md-flex">
            <div class="col-12">
                <ul class="breadcrumbs_content list-unstyled">

                    <li><span>Delivery Policy</span></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="row mt-5 mb-7">
        <div class="col-12 py-5">
            {!! $privacy_policy->first()->privacy_policy !!}
        </div>
    </div>
</div>

@endsection
