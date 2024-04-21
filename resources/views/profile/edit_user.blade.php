@extends('dashboard.layouts.layout')

@section('title','السيرة الذاتية')


@section('style')
    
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection