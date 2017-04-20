@extends('master')
@section('title', 'All categories')
@section('content')
<div class="container marketing">
<div class="col-xs-12" style="height:60px;"> </div>
            <div class="control-group">
                    <div class="btn-toolbar">
                    </div>
           </div>

<div class="container col-md-8 col-md-offset-2"> <div class="panel panel-default">
           <div class="panel-heading"> 
                <h2> All categories </h2>
          </div>
          @if (session('status'))
              <div class="alert alert-success"> 
                   {{ session('status') }}
              </div>
          @endif
          @if ($categories->isEmpty())
               <p> There is no category.</p>
          @else
          <table class="table">
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{!! $category->name !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
           </table>
        @endif
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