@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="panel panel-default content-block" id="step_1" style="display:none;">
                <div class="panel-heading">
                    <h3>Step 1: Please let me know something. It just saves your entry into local storage.</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="full_name">What is full name?</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" />
                    </div>
                    <div class="form-group">
                        <label for="location">Where are you from?</label>
                        <select type="text" class="form-control" name="location" id="location">
                            <option value="usa">USA</option>
                            <option value="canada">Canada</option>
                            <option value="uk">UK</option>
                            <option value="brazil">Brazil</option>
                        </select>
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
                        <label for="age">How old are you?</label>
                        <input type="number" class="form-control" name="age" id="age" />
                    </div>
                    <div class="form-group">
                        <label for="marriage">Are you single?</label>
                        <select class="form-control" name="marriage" id="marriage">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
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
                        <label for="hours_per_week">How many hours a week?</label>
                        <select class="form-control" name="hours_per_week" id="hours_per_week">
                            <option value="10">Less than 10 hours</option>
                            <option value="20">Less than 20 hours</option>
                            <option value="30">Less than 30 hours</option>
                            <option value="40">Less than 40 hours</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="when_to_start">When are you goint to start this project?</label>
                        <select class="form-control" name="when_to_start" id="when_to_start">
                            <option value="immediately">Immediately</option>
                            <option value="week_1">In a week.</option>
                            <option value="month_1">In a month.</option>
                            <option value="not_sure">Not sure yet.</option>
                        </select>
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
                        <label for="like">Do you like this survey style?</label>
                        <select class="form-control" name="like" id="like">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <button class="btn btn-default form-control step_control" data-target="step_3">Prev</button>
                        </div>
                        <div class="col-lg-2 col-lg-offset-8 col-md-3 col-md-offset-6 col-sm-4 col-sm-offset-4 col-xs-6">
                            <button class="btn btn-primary form-control step_control" data-target="final">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default content-block" id="final" style="display:none;">
                <div class="panel-heading">
                    <h3>Final: Please check what you entered.</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <pre id='output'></pre>
                    </div>
                    <div class="form-group">
                        <label for="hire_me">Is this correct and would you hire me?</label>
                        <select class="form-control" name="hire_me" id="hire_me">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <button class="btn btn-default form-control step_control" data-target="step_4">Prev</button>
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