@extends('admin.layouts.master_admin')

@section('title', 'tesdiq')

@section('page_title', 'tesdiq')

@section('content')



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    @if ( Session::get('success_user'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success_user') }}
                    </span>
                    @endif
                    @if ( Session::get('error_user'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error_user') }}
                    </span>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>surname</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>Event</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }} </td>
                                        <td>{{ $user->email }}</td>
                                        <td> {{ $user->role }}</td>
                                        <td style="width: 15%; !important;">

                                            <a class="btn btn-primary" href="{{ url('admin/success-user/'.$user->id) }}" onclick="return confirm('Are you sure to delete')">
                                                <i class="far fa-check-circle"></i></a>
                                            <a class="btn btn-danger" href="{{ url('admin/delete-user/'.$user->id) }}"
                                                onclick="return confirm('Are you sure to delete')"><i
                                                    class="far fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>name</th>
                                    <th>surname</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>Event</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
