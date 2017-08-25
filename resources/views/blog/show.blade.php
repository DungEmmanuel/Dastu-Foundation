@extends('mastersheet')
@section('title', 'View a post')
@section('content')
  <div class="container marketing">

   <div class="col-xs-12" style="height:60px;"> </div>
            <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
           </div>
    <div class="container col-md-8 col-md-offset-2"> 
         <div class="well well bs-component">
              <div class="content">
                   <h2 class="header">{!! $post->title !!}</h2> 

                   <div class='list-group gallery'>


                         @if($images->count())

                             @foreach($images as $image)

                                @if($image->post_id == $post->id)

                                   <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>

                                      <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">

                                          <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />


                                       </a>
                                   </div> <!-- col-6 / end -->

                                  @endif

                             @endforeach

                          @endif
                          <div class="clearfix"></div>

                    </div> <!-- list-group / end -->

                   <p> {!! $post->content !!} </p>
              </div>
              <div class="clearfix"></div> 
         </div>
        @foreach($comments as $comment)
              <div class="well well bs-component">
                   <div class="content">
                     {!! $comment->content !!}
                    
                     <br>
                     <br>
                     <!--{!! $userr->name !!}  &nbsp;  &nbsp; &nbsp; --> {!! $comment->created_at !!} &nbsp; &nbsp; {!! $userid !!}
                   </div>
               </div>
        @endforeach
        <div class="well well bs-component">
        <form class="form-horizontal" method="post" action="/comment">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 

              @foreach($errors->all() as $error)
                   <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
              @if(session('status'))
                 <div class="alert alert-success">
                      {{ session('status') }}
                 </div>
              @endif
                 <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
                <input type="hidden" name="post_id" value="{!! $post->id !!}"> 

                 <!-- <input type="hidden" name="post_type" value="App\Post"> -->
               <fieldset>
                      <legend>Comment</legend>

                      <div class="form-group"> 
                           <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                            </div>
                      </div>
                      <div class="form-group">
                           <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Post</button>
                           </div>
                      </div>
               </fieldset>
          </form>
          </div>
    </div>


   <div class="col-xs-12" style="height:230px;"> </div>
            <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
           </div>
    </div>
    <hr>
@endsection