@extends('admin.layouts.master_admin')

@section('title', 'Butun telimler')

@section('page_title', 'Butun telimler')

@section('content')

<section class="content">
    <div class="container-fluid">
                {{-- telim hissesi --}}
                <div class="card">
                    <div class="card-header" style="text-align: center !important;">
                        <h3 class="card-title">Butun telimler</h3>
                        <a class="btn btn-primary" href="{{ route('admin.addtelim') }}" style="float: right !important;">Yeni
                            telim elave et</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>submodul</th>
                                    <th>qurucu</th>

                                    <th>Events</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($telimler as $telim)
                                <tr>
                                    <td>{{ $telim->name }}</td>
                                    <td>
                                        @if($telim->submodul_id)
                                        {{ $telim->submodul->name }}
                                        @else
                                        Bilinmir
                                        @endif
                                    </td>
                                    <td>
                                        @if($telim->telimci_id)
                                        {{ $telim->user->name }}
                                        @else
                                        Bilinmir
                                        @endif
                                    </td>

                                    <td style="width: 15%; !important;">

                                        <a class="btn btn-primary" href="{{ url('admin/edit-telim/'.$telim->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ url('admin/delete-telim/'.$telim->id) }}"
                                            onclick="return confirm('Are you sure to delete')"><i
                                                class="far fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>modul</th>
                                    <th>qurucu</th>

                                    <th>Events</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
        {{-- submodul hissesi --}}
        <div class="card">
            <div class="card-header" style="text-align: center !important;">
                <h3 class="card-title">Butun submodullar</h3>
                <a class="btn btn-primary" href="{{ route('admin.addtelim') }}" style="float: right !important;">Yeni
                    submodul elave et</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>modul</th>
                            <th>qurucu</th>

                            <th>Events</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($submoduls as $submodul)
                        <tr>
                            <td>{{ $submodul->name }}</td>
                            <td>
                                @if($submodul->modul_id)
                                {{ $submodul->modul->name }}
                                @else
                                Bilinmir
                                @endif
                            </td>
                            <td>
                                @if($submodul->telimci_id)
                                {{ $submodul->user->name }}
                                @else
                                Bilinmir
                                @endif
                            </td>

                            <td style="width: 15%; !important;">

                                <a class="btn btn-primary" href="{{ url('admin/edit-submodul/'.$submodul->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{ url('admin/delete-submodul/'.$submodul->id) }}"
                                    onclick="return confirm('Are you sure to delete')"><i
                                        class="far fa-trash-alt"></i></a>

                            </td>
                        </tr>
                        @endforeach





                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>modul</th>
                            <th>qurucu</th>

                            <th>Events</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        {{-- modul hissesi --}}
        <div class="card">
            <div class="card-header" style="text-align: center !important;">
                <h3 class="card-title">Butun modullar</h3>
                <a class="btn btn-primary" href="{{ route('admin.addtelim') }}" style="float: right !important;">Yeni
                    modul elave et</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>

                            <th>Events</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($moduls as $modul)
                        <tr>
                            <td>{{ $modul->name }}</td>
                            <td>
                                @if($modul->telimci_id)
                                {{ $modul->user->name }}
                                @else
                                Bilinmir
                                @endif
                            </td>

                            <td style="width: 15%; !important;">

                                <a class="btn btn-primary" href="{{ url('admin/edit-modul/'.$modul->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{ url('admin/delete-modul/'.$modul->id) }}"
                                    onclick="return confirm('Are you sure to delete')"><i
                                        class="far fa-trash-alt"></i></a>

                            </td>
                        </tr>
                        @endforeach





                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>

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
