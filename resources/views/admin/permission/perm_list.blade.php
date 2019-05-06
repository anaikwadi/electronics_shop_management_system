@extends('layouts.adminpages')

@section('content')

<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('permission.create')}}">Add New Permission</a>
<hr>

<!--***** CONTENT *****-->     
<div class="row table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="bg-info text-white">
          <th>#</th>
          <th>Name</th>
          <th>Display Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

          @php $inc = ($permissions->currentpage() - 1) * $permissions->perpage() + 1; @endphp
          @foreach($permissions as $row)
          <tr>
              <td>{{ $inc }}</td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->display_name }}</td>
            <td>{{ $row->description }}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('permission.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                <a class="btn btn-danger" href="{{ route('permission.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
              </div>
            </td>
          </tr>
          <?php $inc++; ?>
          @endforeach
        
      </tbody>
    </table>
</div> 

Showing {{ $permissions->firstItem() }} TO  {{ $permissions->lastItem() }} of {{ $permissions->total() }} (for page {{ $permissions->currentPage() }} )
<div class="pull-right">
{!! $permissions->render() !!}
</div>


@endsection