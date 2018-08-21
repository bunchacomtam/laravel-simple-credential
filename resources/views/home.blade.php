@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-6">
                        First Name : {{Auth::user()->first_name}}
                        <br>
                        Last Name : {{Auth::user()->last_name}}
                        <br>
                        Email : {{Auth::user()->email}}
                    </div>
                    <div class="col-md-6">
                        Adress : {{Auth::user()->personalData->address}}
                        <br>
                        Date of Birth : {{Auth::user()->personalData->date_of_birth}}
                        <br>
                        Membership Type : {{Auth::user()->personalData->membership_type}}
                        <br>
                        Number Credit Card : {{Auth::user()->personalData->number_credit_card}}
                        <br>
                        Type Credit Card : {{Auth::user()->personalData->type_credit_card}}
                        <br>
                        Expired Credit Card : {{Auth::user()->personalData->expired_credit_card}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
