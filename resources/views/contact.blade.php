@extends('mastersheet')
@section('title', 'Contact')

@section('content')
     <div class="container marketing">

              <div class="col-xs-12" style="height:60px;"> </div>
              <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
              </div>

        

              <div class="text-center">
                    <h1> Contact Us </h1>
              </div>

        

         <div class="container col-md-8 col-md-offset-2">

               <!-- <div class="container"> -->
                <!-- Example row of columns -->
                    <!-- <div class="row"> -->
                           <div class="col-md-4">
                               <div class="panel panel-info">
                                    <div class="panel-heading">
                                          <h3 class="panel-title">Phone Lines</h3>
                                    </div>
                                    <div class="panel-body">
                                          <p>+2348035872783 <br/> +2348061366714 </p>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-8">
                             <div class="panel panel-info">
                                    <div class="panel-heading">
                                          <h3 class="panel-title">Office Address</h3>
                                    </div>
                                    <div class="panel-body">
                                          
                                       <p>Munchogopyeng, Sabon Barki, Jos South L.G.A, Plateau State, Nigeria </p>
                                    </div>
                             </div>
                                 
                            </div>

                     <!-- </div> -->
                <!-- </div> -->

      
         </div>

         

         <div class="container col-md-8 col-md-offset-2">
                 <div class="alert alert-info" role="alert">
                             <strong>Better Still!</strong> Drop Us a Message.
                 </div>

              <div class="well well bs-component">
                  <form class="form-horizontal" method="post">
                        @foreach ($errors->all() as $error)
                               <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if (session('id'))
                        <div class="alert alert-success">
                             {{ session('id') }}
                        </div>
                        @endif
            
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <fieldset>
                            <legend>Send Us A Mail.</legend>
                            <div class="form-group">
                                <label for="title" class="col-lg-2 control-label">Phone-Number | Email-Address.</label>
                                <div class="col-lg-10">
                                        <input type="text" class="form-control" id="title" placeholder="PhoneNo.| Email-Address" name="phoneemail">
                                </div>
                            </div>
                            <div class="form-group">
                                     <label for="content" class="col-lg-2 control-label">Message.</label>
                                     <div class="col-lg-10">
                                           <textarea class="form-control" rows="3" id="content" name="message"></textarea>
                                           <span class="help-block">Feel free to ask us any question.</span>
                                     </div>
                            </div>

                            <div class="form-group">
                                  <div class="col-lg-10 col-lg-offset-2">
                                       <button class="btn btn-default">Cancel</button>
                                       <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                            </div>
                        </fieldset>
                   </form>
             </div>
        </div>
  </div>

 <hr>
            
@endsection