@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit ToDo</div>
                    <div class="card-body">
                        <form action="{{ url('todo/update/'.$todos->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$todos->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="3" rows="5">{{$todos->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Due Date <span style="color: red">*Not Before Today*</span></label>
                                <input type="date" name="due_date" id="due_date" min="{{ date('Y-m-d') }}" class="form-control" value="{{$todos->due_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">{{$todos->status}}</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Progress">Progress</option>
                                    <option value="Completed">Completed</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update ToDo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection