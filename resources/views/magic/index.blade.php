@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="panel panel-default content-block" id="step_1" style="display:none;">
                <div class="panel-heading">
                    <h3>Step 1: Please answer to my questions</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="step_1_param_1">What is full name?</label>
                        <input type="text" class="form-control" id="step_1_param_1" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-lg-offset-10 col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8 col-xs-6 col-xs-offset-6">
                            <button class="btn btn-primary form-control step_control" data-target="step_2">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default content-block" id="step_2" style="display:none;">
                <div class="panel-heading">
                    <h3>Step 2: Please answer to my questions</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="step_2_param_1">What is full name?</label>
                        <input type="text" class="form-control" id="step_2_param_1" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <button class="btn btn-default form-control step_control" data-target="step_1">Prev</button>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-3 col-md-offset-6 col-sm-4 col-sm-offset-4 col-xs-6">
                            <button class="btn btn-primary form-control step_control" data-target="step_3">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default content-block" id="step_3" style="display:none;">
                <div class="panel-heading">
                    <h3>Step 3: Please answer to my questions</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="step_3_param_1">What is full name?</label>
                        <input type="text" class="form-control" id="step_3_param_1" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <button class="btn btn-default form-control step_control" data-target="step_2">Prev</button>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-3 col-md-offset-6 col-sm-4 col-sm-offset-4 col-xs-6">
                            <button class="btn btn-primary form-control step_control" data-target="step_4">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default content-block" id="step_4" style="display:none;">
                <div class="panel-heading">
                    <h3>Step 4: Almost done. Please enter the last answers.</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="step_4_param_1">What is full name?</label>
                        <input type="text" class="form-control" id="step_4_param_1" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <button class="btn btn-default form-control step_control" data-target="step_3">Prev</button>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-3 col-md-offset-6 col-sm-4 col-sm-offset-4 col-xs-6">
                            <button class="btn btn-primary form-control step_control" data-target="">Finish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection