@extends('layouts.app')

<!-- Page Content -->
@section('content')

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <!-- Portfolio Item Heading -->
            <h2 class="my-4" align="center">{{$project->name}}<br>
                <small><i>Project Manager: {{$project->project_manager}}</i></small>
            </h2>

            <br>

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

                <div class="col-md-10">
                    <p>{{$project->description}}</p>
                </div>

            </div>

            <br>

            <div class="row justify-content-center">
                <div class="col-md-2">
                </div>

                <div class="col-md-5">
                    <b>Business Department:</b> {{$project->department->name}}<br>
                    <b>Business Owner:</b> {{$project->user->name}}<br>
                    <b>Project Status:</b> {{$project->status->name}}<br>
                </div>

                <div class="col-md-5">
                    <b>Project Budget: </b> €{{$project->cost}}<br>
                    <b>Spend to Date:</b> €{{$project->spend}}<br>
                    <b>Expected Return on Investment:</b> €{{$project->ROI}}<br>
                </div>

            </div>

            <br>

            <div class="row">
                <div class="col-md-2">
                </div>

                <div class="col-md-10">
                    @if(Auth::user()->checkAdmin())
                        <h5><b>Post an Update</b></h5>
                        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@status', $project->id]]) !!}
                        {!! Form::textarea('update', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        <br>
                        <div class="btn-group btn-group-justified" align="center">
                            <div class="btn-group">
                                {!! Form::submit('Submit Update', ['class'=>'btn btn-primary'])  !!}
                                {!! Form::close()!!}
                            </div>

                            <div class="btn-group">
                            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-primary">Amend Project Details</a>
                            </div>
                        </div>
                    @elseif(Auth::user()->checkPM())
                        <h5><b>Post an Update</b></h5>
                        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@status', $project->id]]) !!}
                        {!! Form::textarea('update', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        <br>
                        <div class="btn-group btn-group-justified" align="center">
                            <div class="btn-group">
                                {!! Form::submit('Submit Update', ['class'=>'btn btn-primary'])  !!}
                                {!! Form::close()!!}
                            </div>
                            <div class="btn-group">
                                <a href="{{route('projectmanager.projects.edit', $project->id)}}" class="btn btn-primary">Amend Project Details</a>
                            </div>
                        </div>
                    @else
                        <h5><b>Latest Updates:</b></h5>
                        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@status', $project->id]]) !!}
                        {!! Form::textarea('update', null, ['class'=>'form-control', 'rows'=>3]) !!}
                        {!! Form::close()!!}
                    @endif
                </div>
            </div>

            <br>

            <hr>

            <div class="row">

                <!-- comments section -->
                <div class="col-md-12 comments-section">

                    <!-- comment form -->
                    <h5 align="center"><b>Collaboration Space</b></h5>
                    {!!  Form::open(['method'=>'POST', 'action'=>'ProjectCommentsController@store']) !!}
                    <input type="hidden" name="project_id" value="{{$project->id}}">
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary btn-sm pull-right'])  !!}
                    {!! Form::close()!!}

                    <!-- Display total number of comments on this post  -->
                    @if(count($comments) > 0)
                        <h2><span id="comments_count">{{count($comments)}}</span> Comment(s)</h2>
                    <br>

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
    </div>
</div>

@endsection

@section('scripts')

    <script>$(".comment-details .reply-btn").click(function(){
            $(this).next().slideToggle("slow");
            return false //stops the page scrolling to top on click
            });
    </script>
@stop