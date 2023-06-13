@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ToDo</div>
                    <div class="card-header"> <input class="form-control" id="myInput" type="text" placeholder="Search.."> </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('todo.create') }}" class="btn btn-primary mb-3">Add Todo</a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($todo as $todos)
                                    <tr>
                                        <td>{{ $todos->title }}</td>
                                        <td>{{ $todos->due_date }}</td>
                                        <td>{{ $todos->status }}</td>
                                        <td>
                                            <a href="{{ url('todo/view', $todos->id) }}" class="btn btn-success btn-sm">View</a> 
                                                @if ($todos->due_date < now())
                                                    <button class="btn btn-secondary btn-sm" disabled>Edit</button>
                                                @else
                                                    <a href="{{ url('todo/edit', $todos->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                @endif

                                                <a href="{{ url('todo/delete', $todos->id) }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Move to Trash</button>
                                                </a>
                                            {{-- </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
@endsection
