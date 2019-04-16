@extends('layouts.app')

<!-- Page Content -->
@section('content')

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <!-- Portfolio Item Heading -->
            <h1 class="my-4">{{$project->name}}
                <small></small>
            </h1>

            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-md-2" align="center">
                    <br>
                    @if($project->RAG_id == 1)
                        <img class="img-fluid" src="/images/RedLight.jpg" alt="">
                    @elseif($project->RAG_id == 2)
                        <img class="img-fluid" src="/images/AmberLight.jpg" alt="">
                    @elseif($project->RAG_id == 3)
                        <img class="img-fluid" src="/images/GreenLight.jpg" alt="">
                    @else
                        <img class="img-fluid" src="/images/BlankImage.jpg" alt="">
                    @endif
                </div>

                <div class="col-md-5">
                    <h3 class="my-3">Project Description</h3>
                    <p>{{$project->description}}</p>
                    <h3 class="my-3">Current Staus Details</h3>
                    <ul>
                        <li><b>Current RAG Status: </b> {{$project->RAG->name}}</li>
                        <li><b>Spend to date:</b> €{{$project->spend}}</li>
                        <li><b>Current Stage:</b> {{$project->stage}}</li>
                        <li>IT Team:</li>
                    </ul>
                </div>
            </div>

            <!-- comments section -->
            <div class="col-md-12 col-md-offset-0 comments-section">

                <!-- comment form -->
                <h4>Post a comment:</h4>
                {!!  Form::open(['method'=>'POST', 'action'=>'ProjectCommentsController@store']) !!}
                <input type="hidden" name="project_id" value="{{$project->id}}">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                {!! Form::submit('Submit Comment', ['class'=>'btn btn-primary btn-sm pull-right'])  !!}
                {!! Form::close()!!}

            <!-- Display total number of comments on this post  -->
                @if(count($comments) > 0)
                    <h2><span id="comments_count">{{count($comments)}}</span> Comment(s)</h2>
                    <hr>

                    <!-- comments wrapper -->
                    @foreach($comments as $comment)

                        <div id="comments-wrapper">
                            <div class="comment clearfix">
                                <div class="comment-details">
                                    <span class="comment-name">{{$comment->author}}</span>
                                    <span class="comment-date">{{$comment->created_at->diffForHumans()}}</span>
                                    <p>{{$comment->body}}</p>

                                    <a class="reply-btn" href="#" >reply</a>

                                    <div class="comment-reply">
                                    {!!  Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}

                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                                    {!! Form::submit('Submit', ['class'=>'btn btn-primary btn-sm pull-right'])  !!}

                                    {!! Form::close()!!}
                                    </div>

                                </div>
                            </div>
                        </div>

                                @if(count($comment->replies) > 0)

                                    @foreach($comment->replies as $reply)

                                        <div>
                                            <!-- reply -->
                                            <div class="comment reply clearfix">
                                                <div class="comment-details">

                                                    <span class="comment-name">{{$reply->author}}</span>
                                                    <span class="comment-date">{{$reply->created_at->diffForHumans()}}</span>
                                                    <p>{{$reply->body}}</p>

                                                </div>
                                            </div>
                                            @endforeach
                                            @endif

                                            @endforeach
                                            @endif













                            </div>
    </div>
</div>
    </div>


@stop

        @section('scripts')




        <script>$(".comment-details .reply-btn").click(function(){

            $(this).next().slideToggle("slow");

            });
        </script>
            @stop