@extends('layouts.app')
@section('content')
<div class="card-body">
    {{-- FILTRAVIMAS --}}
    <label>Filtering workers by projects:</label>
    <form class="form-inline" action="{{ route('workers.index') }}" method="GET">
        <select name="project_id" id="" class="form-control">
            <option value="" selected>Visos</option>
            @foreach ($projects as $project)
            <option value="{{ $project->id }}" 
                @if($project->id == app('request')->input('project_id')) 
                    {{-- selected="selected" reiškia kad altiksu filtravimą, ta pasirnkite inpute palieka rodoma --}}
                selected="selected"  
                @endif>{{ $project->title }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Projects</th>
            <th>Actions</th>
        </tr>
        @foreach ($workers as $worker)
        <tr>
            <td>{{ $worker->name }}</td>
            <td>{{ $worker->project->title }}</td>
            <td>
                <form action={{ 
                    route('workers.destroy', $worker->id . 
                    ( app('request')->input('project_id') !== '' 
                    ? '?project_id=' . app('request')->input('project_id') 
                    : '' ))
                    }} method="POST">
                    <a class="btn btn-success" href={{ route('workers.edit', $worker->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('workers.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection
