@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add Student</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Standard</label>
                            <input type="text" name="standard" class="form-control" id="standard" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Marks</label>
                            <input type="number" name="total_marks" class="form-control" id="total_marks" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('student.list') }}" class="btn btn-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection