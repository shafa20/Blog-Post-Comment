@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <!-- Profile Header -->
                <div class="mb-4">
                    <h2 class="h4 text-dark">{{ __('Profile') }}</h2>
                </div>

                <!-- Update Profile Information Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Update Profile Information') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Update Password Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('Update Password') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Delete User Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0 text-danger">{{ __('Delete Account') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
