@extends('frontend.master.master')
@section('title', $metaSettings->title ?? 'Nugortech IT - Terms Conditions')
@section('meta_description', $metaSettings->meta_description ?? 'Terms Conditions' )
@section('meta_title', $metaSettings->meta_title ?? 'Nugortech IT - Terms Conditions' )
@section('meta_tag', $metaSettings->meta_tag ?? ' Terms Conditions' )
@section('content')
<div class="container page-content">
    <div class="border-bottom mb-4">
        <div class="breadcrumbs row align-items-center justify-content-between d-none d-md-flex">
            <div class="col-12">
                <ul class="breadcrumbs_content list-unstyled">

                    <li><span>Terms and Conditions</span></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="row mt-5 mb-7">
        <div class="col-12 py-5">
            {!! $terms->first()->terms_conditions !!}
        </div>
    </div>
</div>
@endsection
