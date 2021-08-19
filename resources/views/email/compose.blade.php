@extends('layouts.admin' , ['course_id' => Session::get('course_id')])
@section('content')
<div class="container">
    <div class="row inbox">   
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body message">
                    <p class="text-center">New Message</p>
                    <form class="form-horizontal" action="/email" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="to" class="col-sm-1 control-label">To:</label>
                            <div class="col-sm-11">
                                  <input type="email" class="form-control select2-offscreen" id="to" placeholder="Type email" tabindex="-1" name="to">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="cc" class="col-sm-1 control-label">CC:</label>
                            <div class="col-sm-11">
                                  <input type="email" class="form-control select2-offscreen" id="cc" placeholder="Type email" tabindex="-1" name="cc">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="bcc" class="col-sm-1 control-label">SUBJECT:</label>
                            <div class="col-sm-11">
                                  <input type="text" class="form-control select2-offscreen" id="bcc" placeholder="Type email" tabindex="-1" name="subject">
                            </div>
                          </div>
                     
   
                    
                        <div class="col-sm-11 col-sm-offset-1">
                            
                            <div class="btn-toolbar" role="toolbar">
                                
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-bold"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-italic"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-underline"></span></button>
                                </div>
        
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-align-left"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-align-right"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-align-center"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-align-justify"></span></button>
                                </div>
                                
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-indent"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-outdent"></span></button>
                                </div>
                                
                                <div class="btn-group">
                                    <button class="btn btn-default"><span class="fa fa-list-ul"></span></button>
                                    <button class="btn btn-default"><span class="fa fa-list-ol"></span></button>
                                </div>
                                <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>	
                                <button class="btn btn-default"><span class="fa fa-paperclip"></span></button>
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="fa fa-tags"></span> <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">add label <span class="label label-danger"> Home</span></a></li>
                                        <li><a href="#">add label <span class="label label-info">Job</span></a></li>
                                        <li><a href="#">add label <span class="label label-success">Clients</span></a></li>
                                        <li><a href="#">add label <span class="label label-warning">News</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <br>	
                            
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="body" rows="12" placeholder="Click here to reply" name="body"></textarea>
                            </div>
                            
                            <div class="form-group">	
                                <button type="submit" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </form>	
                </div>	
            </div>	
        </div><!--/.col-->		
    
    </div>
    </div>
@endsection