@extends('frontend.layouts.user')
@section('title')
    {{ __('All Schema') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="site-card">
                <div class="site-card-header">
                    <h3 class="title">{{ __('All The Schemas') }}</h3>
                    {{-- <a href="{{ route('user.custom.plan') }}" class="site-btn grad-btn">{{ __('Custom Plan') }}</a> --}}
                    {{-- <a href="{{ route('custom-plan') }}" class="site-btn grad-btn">{{ __('Custom Plan') }}</a> --}}
                    <a href="{{ route('user.custom-plan') }}" class="site-btn grad-btn">{{ __('Custom Plan') }}</a>
                </div>
                <div class="site-card-body">
                    <div class="row">
                        @foreach($schemas as $schema)

                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="single-investment-plan">
                                    <img
                                        class="investment-plan-icon"
                                        src="{{ asset($schema->icon) }}"
                                        alt=""
                                    />
                                    @if($schema->badge)
                                        <div class="feature-plan">{{$schema->badge}}</div>
                                    @endif

                                    <h3>{{$schema->name}}</h3>
                                    <p>{{$schema->schedule->name . ' '. ($schema->interest_type == 'percentage' ? $schema->return_interest.'%' : $currencySymbol.$schema->return_interest ) }}</p>
                                    <ul>
                                        <li>{{ __('Investment') }} <span class="special">
                                            {{ $schema->type == 'range' ? $currencySymbol . $schema->min_amount . '-' . $currencySymbol . $schema->max_amount : $currencySymbol . $schema->fixed_amount }}
                                        </span></li>
                                        <li>{{ __('Capital Back') }}
                                            <span>{{ $schema->capital_back ? 'Yes' : 'No' }}</span></li>
                                        <li>{{ __('Return Type') }} <span>{{ ucwords($schema->return_type) }}</span>
                                        </li>
                                        <li>{{ __('Number of Period') }}
                                            <span>{{ ($schema->return_type == 'period' ? $schema->number_of_period : 'Unlimited').($schema->number_of_period == 1 ? ' Time' : ' Times' )  }}</span>
                                        </li>
                                        <li>{{ __('Profit Withdraw') }} <span>{{ __('Anytime') }}</span></li>
                                    </ul>
                                    <div class="holidays"><span class="star">*</span>@if( null != $schema->off_days) {{ implode(', ', json_decode($schema->off_days,true))  .' '.__('are')}}  @else {{ __('No Profit') }} @endif {{ __('Holidays') }}</div>
                                    <a href="{{route('user.schema.preview',$schema->id)}}"
                                       class="site-btn grad-btn w-100 centered"><i
                                            class="anticon anticon-check"></i>{{ __('Invest Now') }}</a>
                                </div>
                            </div>
                        @endforeach

                        @foreach($userCustomPlans as $customPlan)
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="single-investment-plan">
                                <!-- Custom plan details -->
                                <h3>{{ $customPlan->plan_name }}</h3>
                                <p>{{ __('Custom Plan Details Here') }}</p>
                                <ul>
                                    <li>{{ __('Investment') }} <span class="special">{{ $customPlan->min_amount }} - {{ $customPlan->max_amount }}</span></li>
                                    <li>{{ __('Interest Rate') }} <span>{{ $customPlan->interest_rate }}</span></li>
                                    <li>{{ __('Investment Term') }} <span>{{ $customPlan->term }} {{ __('days') }}</span></li>
                                </ul>
                                <!-- Add more details as needed -->
                    
                                <!-- Link to invest or further details -->
                                <a href="{{ route('user.schema.preview', $customPlan->id) }}" class="site-btn grad-btn w-100 centered">
                                    <i class="anticon anticon-check"></i>{{ __('Invest Now') }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
