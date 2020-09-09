@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update worker info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('workers.update', $worker->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label>Change project: </label>
                            <select name="project_id" id="" class="form-control">
                                 <option value="" selected disabled>Choose project</option>
                                 @foreach ($projects as $project)
                                <option value="{{ $project->id }}" 
                                    @if($project->id == $worker->project_id) selected="selected" @endif
                                    >{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection