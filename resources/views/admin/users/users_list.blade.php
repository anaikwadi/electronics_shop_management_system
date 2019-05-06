@extends('layouts.adminpages')

@section('content')

<h2>{{$title}}</h2>

<a class="btn btn-sm btn-primary" href="{{route('users.create')}}">Add New User</a>
<hr>

    <!--***** CONTENT *****-->     
    <div class="row table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="bg-info text-white">
              <th>#</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

        @php $inc = ($users->currentpage() - 1) * $users->perpage() + 1; @endphp
              @foreach($users as $user)
              <tr>
                <td>{{ $inc }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                @foreach($user->roles as $r)
                    {{$r->display_name}}
                @endforeach
                </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Role"></i> </a>
                    <a class="btn btn-danger" href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                  </div>
                </td>
              </tr>
              <?php $inc++; ?>
              @endforeach
            
          </tbody>
        </table>
    </div> 

Showing {{ $users->firstItem() }} TO  {{ $users->lastItem() }} of {{ $users->total() }} (for page {{ $users->currentPage() }} )
<div class="pull-right">
{!! $users->render() !!}
</div>
@endsection