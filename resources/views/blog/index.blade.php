@extends('mastersheet')
@section('title', 'Blog')
@section('content')
<div class="container marketing">
          <div class="col-xs-12" style="height:60px;"> </div>
            <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
           </div>
       <div class="container col-md-8 col-md-offset-2">
            @if (session('status'))
                 <div class="alert alert-success">
                      {{ session('status') }}
                </div>
            @endif

            @if ($posts->isEmpty())
               <p> There is no post.</p>
            @else
                @foreach ($posts as $post)
                    <div class="panel panel-default">
                         <div class="panel-heading">
                         <a href="{!! action('BlogController@show', $post->slug) !!}">
                         {!! $post->title !!}</a>
                         </div>
                         <div class="panel-body">
                              {!! mb_substr($post->content,0,500) !!}
                         </div>
                    </div>
                @endforeach
             @endif
       </div>
            <div class="col-xs-12" style="height:230px;"> </div>
            <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
           </div>
</div>
<hr>
@endsection
