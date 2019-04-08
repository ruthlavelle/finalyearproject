@extends('layouts.project-home')

@section('content')

<!-- Title -->
<h1>{{$project->name}}</h1>

<!-- Author -->
<p class="lead">
    Project Manager: {{$project->project_manager->user->name}}
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Last Updated: {{$project->updated_at->diffForHumans()}}</p>

<hr>

<hr>

<!-- Post Content -->
<p class="lead">{{$project->description}}</p>

<hr>

<!-- Project Comments -->
<!-- Only display if user is logged in -->
@if(Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>

    {!! Form::open(['method'=>'POST', 'action'=>'ProjectCommentsController@store']) !!}

        <input type="hidden" name="project_id" value="{{$project->id}}">

        <div class="form-group">
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'3']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

</div>

@endif

<hr>

<h3>Project Discussions</h3>

<br>

<!-- Posted Comments -->

@if(count($comments) > 0)

    @foreach($comments as $comment)

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="http://placehold.it/64x64" alt="">
            </a>

            <div class="media-body">

                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>

                <p>{{$comment->body}}</p>

                <button class="toggle-reply btn btn-primary">Reply</button>

                <div class="form-opening">
                {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                <div class="form-group">
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'1']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
                </div>


                <!-- Nested Comment -->
                @if(count($comment->replies) > 0)

                    @foreach($comment->replies as $reply)

                        <div id="nested-comment" class="media">

                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>

                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>

                                <p>{{$reply->body}}</p>
                            </div>
                            @endforeach
                            @endif
                            </div>
                    <!-- End Nested Comment -->
            </div>

        </div>

    @endforeach
@endif

@stop

@section('scripts')
    <script>
        $(".toggle-reply").click(function(){
            $(this).next().slideToggle("slow");
        });
    </script>
@stop