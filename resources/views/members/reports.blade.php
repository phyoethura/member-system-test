@extends('layouts.app')

@section('content')
<h1>Member Reports</h1>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Members by Age Group - Chart</h5>
            </div>
            <div class="card-body">
                <canvas id="ageChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Age Group Summary</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Age Group</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ageGroups as $group => $count)
                        <tr>
                            <td>{{ $group }}</td>
                            <td>{{ $count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>{{ array_sum($ageGroups) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5>All Members - Detailed List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        <th>Age Group</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members->sortBy('date_of_birth') as $member)
                    <tr>
                        <td>{{ $member->full_name }}</td>
                        <td>{{ $member->date_of_birth->format('d/m/Y') }}</td>
                        <td>{{ $member->age }}</td>
                        <td>
                            @if($member->age <= 10) 0-10
                            @elseif($member->age <= 20) 11-20
                            @elseif($member->age <= 30) 21-30
                            @elseif($member->age <= 40) 31-40
                            @elseif($member->age <= 50) 41-50
                            @elseif($member->age <= 60) 51-60
                            @else 60+
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('ageChart').getContext('2d');
    const ageData = @json($ageGroups);
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(ageData),
            datasets: [{
                label: 'Number of Members',
                data: Object.values(ageData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 205, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(199, 199, 199, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(199, 199, 199, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endsection