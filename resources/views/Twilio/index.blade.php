@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4 col-md-push-2">
            <div class="panel panel-primary client-controls">
                <div class="panel-heading">
                    <h3 class="panel-title">Make a call</h3>
                </div>
                <div class="panel-body">
                    <p><strong>Status</strong></p>
                    <div class="well well-sm" id="call-status">
                        Connecting to Twilio...
                    </div>
                    <button class="btn btn-lg btn-success answer-button" disabled>Answer call</button>
                    <button class="btn btn-lg btn-danger hangup-button" disabled onclick="hangUp()">Hang up</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-md-push-2 call_customer">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-lg call-customer-button">
                            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                            Call customer
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop