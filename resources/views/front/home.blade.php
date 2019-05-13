@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Welcome to the Dublin Airport IT BRM Department</h1>

                <p class="lead" align="justify" >

                    <br>
                    The IT BRM is responsible for coordinating and prioritising the demand from Dublin Airport into IT and ensuring maximum business value from IT investments.
                    We work with business teams to identify areas where IT can transform processes and add value.
                    <br><br>
                    The Dublin Airport IT BRM team has responsibility for IT projects and requests across the entire DAP business.
                    This includes Airport Operations, Asset Care, Commercial, DAP Finance, DAP HR,
                    Airline Relationship Management, Aviation Business Development,
                    Marketing, Strategy, Regulation & Planning, Dublin Airport Central and, amd.
                    <br><br>
                    If you have a project, an IT request, or even the beginnings of a plan or idea, its worthwhile completing the form below to allow your BRM to run through its suitability and the IT involvement.
                    This form gets things kicked off formally and is required to request resources from IT.
                </p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="{{route('admin.projects.create')}}">
                                <img src="/images/Form.jpg" alt="Form" style="width:20%">
                                <div class="caption" align="center">
                                    <p>Request a Project</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="{{route('user.project.approvals')}}">
                                <img src="images/Status.jpg" alt="" style="width:18%">
                                <div class="caption" align="center">
                                    <p>View My Outstanding Requests</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="thumbnail" align="center">
                            <a href="{{route('user.projects.index')}}">
                                <img src="images/Active.jpg" alt="" style="width:20%">
                                <div class="caption">
                                    <p>View My Projects</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
<div style="height: 0px"></div>
</div>
</div>
</div>

@endsection




