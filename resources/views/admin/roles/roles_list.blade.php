@extends('layouts.adminpages')

@section('content')

<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('roles.create')}}">Add New Role</a>
<hr>

<!--***** CONTENT *****-->     
<div class="row table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="bg-info text-white">
          <th>#</th>
          <th>Role Display</th>
          <th>Role Description</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

          @php $inc = ($roles->currentpage() - 1) * $roles->perpage() + 1; @endphp        
          @foreach($roles as $role)
              <tr>
                  <td>{{ $inc }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>{{ $role->description }}</td>
                <td>{{ $role->name }}</td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('roles.edit', ['id' => $role->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                    <a class="btn btn-danger" href="{{ route('roles.show', ['id' => $role->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                  </div>
                </td>
              </tr>
              <?php $inc++; ?>
              @endforeach
        
      </tbody>
    </table>
</div> 

Showing {{ $roles->firstItem() }} TO  {{ $roles->lastItem() }} of {{ $roles->total() }} (for page {{ $roles->currentPage() }} )
<div class="pull-right">
{!! $roles->render() !!}
</div>


@endsection