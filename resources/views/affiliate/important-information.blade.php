@extends('layouts.layout1')


@section('content')
    <section class="register">
        <img class="background-image" src="{{asset("images/new/login_bck.jpg")}}" alt="background">
        <div class="register-form" data-id="1">
            <h3 class="title">Registration</h3>
            <div class="registration-stages">
                <a class="registration-stage" data-id="1">
                    <div class="stage-img">
                        <svg width="30" height="32" viewBox="0 0 30 32" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.3083 5.45033L24.3428 0.484818C24.1891 0.331112 24.0067 0.209186 23.8058 0.126C23.605 0.042815 23.3898 0 23.1724 0C22.955 0 22.7398 0.042815 22.539 0.126C22.3382 0.209186 22.1557 0.331112 22.002 0.484818L17.0365 5.45033C16.7261 5.76074 16.5517 6.18175 16.5517 6.62074C16.5517 7.05973 16.7261 7.48074 17.0365 7.79115C17.3469 8.10156 17.7679 8.27595 18.2069 8.27595C18.6459 8.27595 19.0669 8.10156 19.3773 7.79115L21.5172 5.65115V11.6125C21.5205 12.5979 21.2267 13.5614 20.6742 14.3774C20.1217 15.1934 19.3361 15.824 18.4199 16.1869C17.0199 16.7452 15.8008 17.6785 14.8966 18.8843C13.9923 17.6785 12.7732 16.7452 11.3732 16.1869C10.457 15.824 9.67143 15.1934 9.11893 14.3774C8.56643 13.5614 8.27265 12.5979 8.27589 11.6125V5.65115L10.4158 7.79115C10.7262 8.10156 11.1472 8.27595 11.5862 8.27595C12.0252 8.27595 12.4462 8.10156 12.7566 7.79115C13.0671 7.48074 13.2414 7.05973 13.2414 6.62074C13.2414 6.18175 13.0671 5.76074 12.7566 5.45033L7.79113 0.484818C7.63743 0.331112 7.45497 0.209186 7.25415 0.126C7.05333 0.042815 6.83809 0 6.62072 0C6.40335 0 6.18811 0.042815 5.98729 0.126C5.78647 0.209186 5.60401 0.331112 5.45031 0.484818L0.4848 5.45033C0.174388 5.76074 0 6.18175 0 6.62074C0 7.05973 0.174388 7.48074 0.4848 7.79115C0.795213 8.10156 1.21622 8.27595 1.65521 8.27595C2.0942 8.27595 2.51521 8.10156 2.82562 7.79115L4.96555 5.65115V11.6125C4.96549 13.2588 5.45882 14.8675 6.38187 16.2307C7.30492 17.594 8.61534 18.6494 10.144 19.2607C11.0602 19.6236 11.8457 20.2541 12.3982 21.0701C12.9507 21.886 13.2446 22.8495 13.2414 23.8349V30.3448C13.2414 30.7838 13.4158 31.2048 13.7262 31.5152C14.0366 31.8256 14.4576 32 14.8966 32C15.3355 32 15.7565 31.8256 16.0669 31.5152C16.3773 31.2048 16.5517 30.7838 16.5517 30.3448V23.8349C16.5486 22.8495 16.8424 21.886 17.3949 21.07C17.9474 20.254 18.7329 19.6235 19.649 19.2605C21.1777 18.6492 22.4881 17.5939 23.4112 16.2306C24.3342 14.8674 24.8276 13.2588 24.8276 11.6125V5.65115L26.9675 7.79115C27.2779 8.10156 27.6989 8.27595 28.1379 8.27595C28.5769 8.27595 28.9979 8.10156 29.3083 7.79115C29.6187 7.48074 29.7931 7.05973 29.7931 6.62074C29.7931 6.18175 29.6187 5.76074 29.3083 5.45033Z"/>
                        </svg>

                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Registration Type</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="2">
                    <div class="stage-img">
                        <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 23.5538C28.5364 23.5538 32.2143 19.0869 32.2143 13.5768C32.2143 8.06656 31.0066 3.59961 24 3.59961C16.9931 3.59961 15.7856 8.06656 15.7856 13.5768C15.7858 19.0869 19.4635 23.5538 24 23.5538Z"/>
                            <path d="M39.497 38.3849C39.345 28.7859 38.0913 26.0508 28.4982 24.3193C28.4982 24.3193 27.1475 26.04 24.0001 26.04C20.8526 26.04 19.5022 24.3193 19.5022 24.3193C10.0137 26.0317 8.68355 28.7264 8.50872 38.0729C8.4945 38.8362 8.48795 38.8762 8.48535 38.7876C8.48585 38.9536 8.48659 39.2606 8.48659 39.7961C8.48659 39.7961 10.7706 44.4003 24.0002 44.4003C37.2298 44.4003 39.514 39.7961 39.514 39.7961C39.514 39.4521 39.5143 39.2128 39.5145 39.0502C39.5119 39.1049 39.5066 38.9987 39.497 38.3849Z"/>
                            <path d="M35.3993 21.7724C39.0839 21.7724 42.0708 18.1445 42.0708 13.6692C42.0708 9.19386 41.0901 5.56592 35.3993 5.56592C34.4421 5.56592 33.6184 5.66891 32.9099 5.86117C34.2243 8.28424 34.4044 11.2273 34.4044 13.5766C34.4044 16.2366 33.6834 18.7761 32.3555 20.8789C33.2682 21.4488 34.3024 21.7724 35.3993 21.7724Z"/>
                            <path d="M47.9853 33.8178C47.8616 26.0217 46.8436 23.8003 39.0521 22.394C39.0521 22.394 37.9553 23.7917 35.3989 23.7917C35.2932 23.7917 35.1907 23.7884 35.0898 23.7839C36.7141 24.5162 38.1917 25.5358 39.2798 27.0279C41.161 29.6074 41.5935 33.0725 41.6828 38.1631C46.9247 37.1272 47.999 34.9642 47.999 34.9642C47.999 34.6823 47.999 34.4889 47.9995 34.3567C47.9974 34.4032 47.9931 34.3199 47.9853 33.8178Z"/>
                            <path d="M12.6004 21.7725C13.6974 21.7725 14.7314 21.449 15.6445 20.8791C14.3166 18.7764 13.5956 16.2368 13.5956 13.5769C13.5956 11.2275 13.7757 8.28437 15.0899 5.86141C14.3814 5.66915 13.5578 5.56616 12.6004 5.56616C6.90966 5.56616 5.9292 9.1941 5.9292 13.6695C5.9292 18.1446 8.91607 21.7725 12.6004 21.7725Z"/>
                            <path d="M12.9094 23.7839C12.8088 23.7884 12.7063 23.7917 12.6003 23.7917C10.0439 23.7917 8.94714 22.394 8.94714 22.394C1.1559 23.8003 0.13761 26.0216 0.0142185 33.8178C0.00618195 34.32 0.00210186 34.4032 0 34.3566C0.000247278 34.4888 0.000494556 34.6822 0.000494556 34.9641C0.000494556 34.9641 1.07492 37.1271 6.31647 	38.163C6.40611 33.0725 6.83835 29.6074 8.71976 27.0278C9.80779 25.536 11.2852 24.5162 12.9094 23.7839Z"/>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Registration</h3>
                    </div>
                </a>
                <a class="registration-stage" data-id="finish">
                    <div class="stage-img">
                        <svg width="37" height="37" viewBox="0 0 37 37" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.3567 1.71171C24.2235 -4.15083 16.0918 7.25073 7.95876 3.28547V2.44196C7.95876 1.39437 7.10885 0.544458 6.06134 0.544458C5.01382 0.544458 4.16406 1.39437 4.16406 2.44196V35.1026C4.16406 36.1501 5.01382 37 6.06134 37C7.10885 37 7.95876 36.1501 7.95876 35.1026V21.2662C15.6891 25.0338 23.4195 14.9206 31.1511 18.9452C31.508 19.1317 31.9368 19.1194 32.2813 18.9092C32.626 18.7006 32.8361 18.3275 32.8361 17.9235C32.8361 12.8319 32.8361 7.73992 32.8361 2.64687C32.836 2.27764 32.6567 1.92784 32.3567 1.71171Z" fill="#94A2B3"/>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="37" height="37" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="stage-name">
                        <h3 class="stage-title">Finish</h3>
                    </div>
                </a>
            </div>
                <div class="ms-ua-box">
                    {!! Form::open(['route' => ['affiliate.important'], 'method' => 'POST', 'id' => 'clientDetailsForm',  'class' => 'm-form m-form--label-align-right']) !!}
                    @csrf
                    <div class="form-group w-100 mb-0">
                            {{ Form::text('full_name',  $client->full_name(), ['class' => 'form-control m-input',  'placeholder' => 'FULL NAME']) }}
                    </div>
                    <div class="form-group w-100 mb-0">
                        {{ Form::text('business_name',  $client->clientDetails->business_name, ['class' => 'form-control m-input', 'id'=>"business_name", 'placeholder' => 'Company name (if any)']) }}

                    </div>
                    <div class="form-group w-100 mb-0">
                        <div class="register_or">
                            <label for="social_number" class="social_number">
                                {{ Form::text('ssn',  $client->clientDetails->ssn, ['class' => 'form-control m-input ssn', 'id'=>"social_number", 'placeholder' => 'Social security number']) }}
                                @error('ssn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </label>
                            <p>or</p>
                            <label for="ein_number" class="ein_number">
                                {{ Form::text('ein',  $client->clientDetails->ein, ['class' => 'form-control m-input ein', 'id'=>"ein_number", 'placeholder' => 'EIN Number']) }}
                                @error('ssn')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="form-group w-100 mb-0">
                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Full Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group w-100 mb-0">
                        {{ Form::text('phone_number',  $client->clientDetails->phone_number, ['class' => 'form-control m-input phone', 'id'=>"phone_number", 'placeholder' => 'Phone Number']) }}

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group w-100 mb-0">
                        <select class="form-control" name="secret_questions_id" id="secret_question">
                            <option disabled="disabled" selected="selected">Choose Secret Question</option>

                            @foreach($secrets as $value)

                                <option value="{{$value->id}}" {{$client->secret_questions_id == $value-> id ? "selected" : ""}}>{{$value->question}}</option>
                            @endforeach
                        </select>
                        @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group w-100 mb-0">
                        <input id="secret_answer" type="text" class="form-control phone" name="secret_answer" value="{{ !empty(old('secret_answer')) ? old('secret_answer') : $client->secret_answer  }}" required autocomplete="secret_answer" placeholder="Please answer in secret question">
                        @error('secret_answer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="basic-button">
                        <input class="login" type="submit" value="Save" name="">
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>


        @include('helpers.chat')
    </section>
@endsection

@section('scripts')
    <script>
        var $type ="{{auth()->user()->role}}"
    </script>
    <script src="{{ asset('js/site/clients/verify.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.validate.min.js?v=2') }}" ></script>
    <script src="{{ asset('js/lib/jquery.mask.min.js?v=2') }}" defer></script>
    <script src="{{ asset('js/site/affiliates/important_info.js?v=2') }}" ></script>

@endsection



