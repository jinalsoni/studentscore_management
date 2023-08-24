@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Result
                        <a href="{{ route('student.add') }}" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="studentTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Standard</th>
                                    <th>Total Marks</th>
                                    <th>Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $std)
                                <tr>
                                    <td>{{ $std->id }}</td>
                                    <td>{{ $std->name }}</td>
                                    <td>{{ $std->standard }}</td>
                                    <td>{{ $std->total_marks }}</td>
                                    <td>{{ $std->rank }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        let table = new DataTable('#studentTable', {
        responsive: true,
        order: [
            [0, 'asc']
        ]
    });
    });
</script>
@endpush