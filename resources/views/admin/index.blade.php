@extends('layouts.admin')
@section('content')

    <div class="panel panel-default" >
            <canvas id="myRAGChart"></canvas>
    </div>
    <div class="panel panel-default" >
        <canvas id="myStatusChart"></canvas>
    </div>
    <div class="panel panel-default" >
        <canvas id="myDeptChart"></canvas>
    </div>
@stop

@section('scripts')

   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

   <script>

       var ctx = document.getElementById('myRAGChart').getContext('2d');
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
