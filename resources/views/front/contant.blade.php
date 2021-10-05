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
            <p>	18 Fresno,<br/> CA 93727, USA
                <br/><br/>
                info@bootsshop.com<br/>
                ﻿Tel 123-456-6780<br/>
                Fax 123-456-5679<br/>
                web:bootsshop.com
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
                  <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
               
              </div>
    
                <button class="btn btn-large" type="submit">Send Messages</button>
    
            </fieldset>
          </form>
            </div>
        </div>
    </div>
    
@endsection