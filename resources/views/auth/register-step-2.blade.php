@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Step 2</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('step_2', $user->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address">{{ old('address') }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">

                                @if ($errors->has('date_of_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('membership_type') ? ' has-error' : '' }}">
                            <label for="membership_type" class="col-md-4 control-label">Membership Type</label>

                            <div class="col-md-6">
                                <select id="membership_type" class="form-control" name="membership_type">
                                    <option value="silver">Silver</option>
                                    <option value="black">Black</option>
                                    <option value="gold">Gold</option>
                                    <option value="vip">VIP</option>
                                    <option value="vvip">VVIP</option>
                                </select>

                                @if ($errors->has('membership_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('membership_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number_credit_card') ? ' has-error' : '' }}">
                            <label for="number_credit_card" class="col-md-4 control-label">Credit Card Number</label>

                            <div class="col-md-6">
                                <input id="number_credit_card" type="text" class="form-control" name="number_credit_card">

                                @if ($errors->has('number_credit_card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number_credit_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type_credit_card" class="col-md-4 control-label">Credit Card Type</label>

                            <div class="col-md-6">
                                <select id="type_credit_card" class="form-control" name="type_credit_card">
                                    <option value="visa">Visa</option>
                                    <option value="master_card">Master Card</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('expired_credit_card') ? ' has-error' : '' }}">
                            <label for="expired_credit_card" class="col-md-4 control-label">Credit Card Expired Date</label>

                            <div class="col-md-6">
                                <input id="expired_credit_card" type="text" class="form-control" name="expired_credit_card" value="{{ old('expired_credit_card') }}">
                                @if ($errors->has('expired_credit_card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expired_credit_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
<script>
    $( function() {
        $( "#date_of_birth" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
        $( "#expired_credit_card" ).datepicker({
          dateFormat: "yy-mm-dd"
        });
    } );
</script>

@endsection
