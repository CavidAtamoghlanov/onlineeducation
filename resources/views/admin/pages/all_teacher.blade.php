@extends('admin.layouts.master_admin')

@section('title', 'Butun muellimler')

@section('page_title', 'Butun muelimler')

@section('content')

<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header" style="text-align: center !important;">
                <h3 class="card-title">DataTable with default features</h3>
                <a class="btn btn-primary" href="{{ route('admin.addteacher') }}" style="float: right !important;">Yeni muellim elave et</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Events</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->surname }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td style="width: 15%; !important;">

                                <a class="btn btn-primary" href="{{ url('admin/edit-teacher/'.$teacher->id) }}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{ url('admin/delete-teacher/'.$teacher->id) }}" onclick="return confirm('Are you sure to delete')"><i class="far fa-trash-alt"></i></a>

                            </td>
                        </tr>
                        @endforeach





                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Events</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</section>
@endsection
