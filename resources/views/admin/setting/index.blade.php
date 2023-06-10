@extends('layouts.admin')

@section('title', 'Admin Setting')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <form action="{{ url('/admin/settings') }}" method="POST">
                @csrf

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="website_name">Website Name</label>
                                <input style="border: solid skyblue;" type="text" name="website_name" id="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="website_url">Website URL</label>
                                <input style="border: solid skyblue;" type="text" name="website_url" id="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="page_title">Page Title</label>
                                <input style="border: solid skyblue;" type="text" name="page_title" id="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="meta_keyword">Meta Keywords</label>
                                <textarea style="border: solid skyblue;" name="meta_keyword" id="meta_keyword" class="form-control" cols="30" rows="4">{{ $setting->meta_keyword ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea style="border: solid skyblue;" name="meta_description" id="meta_description" class="form-control" cols="30" rows="4">{{ $setting->meta_description  ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="address">Address</label>
                                <textarea style="border: solid skyblue;" name="address" id="address" class="form-control" cols="30" rows="4">{{ $setting->address ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="phone1">Phone 1 *</label>
                                <input style="border: solid skyblue;" type="text" name="phone1" id="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="phone2">Phone No. 2</label>
                                <input style="border: solid skyblue;" type="text" name="phone2" id="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="email1">Email Id 1 *</label>
                                <input style="border: solid skyblue;" type="email" name="email1" id="email1" value="{{ $setting->email1 ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="email2">Email Id 2</label>
                                <input style="border: solid skyblue;" type="email" name="email2" id="email2" value="{{ $setting->email2 ?? '' }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website - Medias Social</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3 form-group">
                                <label for="facebook">Facebook (Optional)</label>
                                <input style="border: solid skyblue;" type="text" name="facebook" id="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="twitter">Twitter (Optional)</label>
                                <input style="border: solid skyblue;" type="text" name="twitter" id="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="instagram">Instagram (Optional)</label>
                                <input style="border: solid skyblue;" type="text" name="instagram" id="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3 form-group">
                                <label for="youtube">Youtube (Optional)</label>
                                <input style="border: solid skyblue;" type="text" name="youtube" id="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-lg btn-primary text-white">Save Setting</button>
                </div>
            </form>
        </div>
    </div>

@endsection
