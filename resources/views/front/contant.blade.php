@extends('front.layout.layout2')
@section('contant')
<div id="mainBody">
    <div class="container">
        <hr class="soften">
        <h1>Visit us</h1>
        <hr class="soften"/>	
        <div class="row">
            <div class="span4">
            <h4>Contact Details</h4>
            <p>	Ecomerce,<br/> CA 93727, 
                <br/><br/>
               muhammad99wasim@gmail.com<br/>
                ﻿phone 0344 1427077<br/>
               
                web:ecomerceshop.com
            </p>		
            </div>
                
            <div class="span4">
            <h4>Opening Hours</h4>
                <h5> Monday - Friday</h5>
                <p>09:00am - 09:00pm<br/><br/></p>
                <h5>Saturday</h5>
                <p>09:00am - 07:00pm<br/><br/></p>
                <h5>Sunday</h5>
                <p>12:30pm - 06:00pm<br/><br/></p>
            </div>
            <div class="span4">
            <h4>Email Us</h4>
            <form class="form-horizontal">
            <fieldset>
              <div class="control-group">
               
                  <input type="text" placeholder="name" class="input-xlarge"/>
               
              </div>
               <div class="control-group">
               
                  <input type="text" placeholder="email" class="input-xlarge"/>
               
              </div>
               <div class="control-group">
               
                  <input type="text" placeholder="subject" class="input-xlarge"/>
              
              </div>
              <div class="control-group">
                  <textarea rows="3"  placeholder="write message here" id="textarea" class="input-xlarge"></textarea>
               
              </div>
    
                <button class="btn btn-large" type="submit">Send Messages</button>
    
            </fieldset>
          </form>
            </div>
        </div>
    </div>
    
@endsection