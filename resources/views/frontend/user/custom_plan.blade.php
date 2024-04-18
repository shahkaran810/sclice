@extends('frontend.layouts.user')

@section('title', __('Create Custom Plan'))

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3>{{ __('Create Your Custom Investment Plan') }}</h3>
                </div>
                <div class="site-card-body">
                    <form action="{{ route('user.custom-plan-submit') }}" method="POST">
                    {{-- <form action="" method="POST"> --}}
                        @csrf
                        <div class="mb-3">
                            <label for="planName" class="form-label">{{ __('Plan Name') }}</label>
                            <input type="text" class="form-control" id="planName" name="plan_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="minAmount" class="form-label">{{ __('Minimum Amount') }}</label>
                            <input type="number" class="form-control" id="minAmount" name="min_amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="maxAmount" class="form-label">{{ __('Maximum Amount') }}</label>
                            <input type="number" class="form-control" id="maxAmount" name="max_amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="interestRate" class="form-label">{{ __('Interest Rate (%)') }}</label>
                            <input type="text" class="form-control" id="interestRate" name="interest_rate" required>
                        </div>
                        <div class="mb-3">
                            <label for="term" class="form-label">{{ __('Investment Term (in days)') }}</label>
                            <input type="number" class="form-control" id="term" name="term" required>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
