@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Step 3</div>

                <div class="panel-body">
                    <p>
                        Congratulations <b> {!! $user->last_name !!} </b>, You Finished The Registration
                    </p>
                    <p>
                        Please, Follow This <a href="{{ route('login') }}">Login</a> Form
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
