@extends('layouts.app')
@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Portfolio Dashboard</h1>

                <div class="panel panel-default" >
                    <canvas id="RAGChart" width="100" height="200"></canvas>
                </div>

                <div class="panel panel-default" >
                    <canvas id="myStatusChart" width="100" height="200"></canvas>
                </div>

                <div class="panel panel-default" >
                    <canvas id="myDeptChart" width="100" height="200"></canvas>
                </div>


           </div>
        </div>
    </div>
@stop

@section('scripts')

   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

   <script>

       var ctx = document.getElementById('RAGChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'pie',
           data: {
               labels: ['Red', 'Amber', 'Green'],
               datasets: [{
                   label: 'Projects Count by RAG Status',
                   data: [{{$redRagCount}}, {{$amberRagCount}}, {{$greenRagCount}}],
                   backgroundColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(231, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(54, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderWidth: 1
               }]
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               legend: {
                   display: true,
                   position: 'bottom',
               },
               title: {
                   display: true,
                   position: 'top',
                   fontSize: 14,
                   text: 'Project Count by RAG Status',
               },
               plugins: {
                   datalabels: {
                       color: '#00000',
                   }
               },

           }
       });
   </script>

   <script>

       var ctx = document.getElementById('myStatusChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'pie',
           data: {
               labels: ['Red', 'Amber', 'Green'],
               datasets: [{
                   label: 'Projects Count by RAG Status',
                   data: [{{$redRagCount}}, {{$amberRagCount}}, {{$greenRagCount}}],
                   backgroundColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(231, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(54, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderWidth: 1
               }]
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               legend: {
                   display: true,
                   position: 'bottom',
               },
               title: {
                   display: true,
                   position: 'top',
                   fontSize: 14,
                   text: 'Project Count by RAG Status',
               },
               plugins: {
                   datalabels: {
                       color: '#00000',
                   }
               },

           }
       });
   </script>

   <script>

       var ctx = document.getElementById('myDeptChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'pie',
           data: {
               labels: ['Red', 'Amber', 'Green'],
               datasets: [{
                   label: 'Projects Count by RAG Status',
                   data: [{{$redRagCount}}, {{$amberRagCount}}, {{$greenRagCount}}],
                   backgroundColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(231, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderColor: [
                       'rgba(255, 0, 0, 1)',
                       'rgba(54, 165, 0, 1)',
                       'rgba(0, 128, 0, 1)'
                   ],
                   borderWidth: 1
               }]
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               legend: {
                   display: true,
                   position: 'bottom',
               },
               title: {
                   display: true,
                   position: 'top',
                   fontSize: 14,
                   text: 'Project Count by RAG Status',
               },
               plugins: {
                   datalabels: {
                       color: '#00000',
                   }
               },

           }
       });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>




@stop
