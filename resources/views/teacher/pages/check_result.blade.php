@extends('teacher.layouts.master_teacher')

@section('title', 'aboute')

@section('page_title', 'Yoxla')

@section('content')


<section class="content">
    <div class="container-fluid">

{{-- yoxlanmamishdar --}}

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>modul</th>
                            <th>telim</th>
                            <th>yuklenme tarixi</th>
                            <th>event</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($answers as $answer)
                        @if ($answer->status_time == null)
                            <tr>
                                <td>{{ $answer->student->name }} &nbsp; {{ $answer->student->surname }}</td>
                                <td>{{ $answer->modul->name }}</td>
                                <td>{{ $answer->telim->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($answer->suallarin_yuklenme_tarixi) }}</td>
                                <td style="width: 8%; !important;">

                                    <a class="btn btn-primary" href="{{ url('teacher/check-user-answer/'.$answer->id) }}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" href="{{ url('teacher/delet-user-answer/'.$answer->id) }}" onclick="return confirm('Are you sure to delete')"><i class="far fa-trash-alt"></i></a>

                                </td>
                            </tr>
                        @endif
                        @endforeach



                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>submodul</th>
                            <th>telim</th>
                            <th>yuklenme tarixi</th>

                            <th>event</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->

        </div>

{{-- yoxlanmislar --}}

<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>modul</th>
                    <th>telim</th>
                    <th>yuklenme tarixi</th>
                    
                    <th>event</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                @if ($answer->status_time != 0)
                    <tr>
                        <td>{{ $answer->student->name }} &nbsp; {{ $answer->student->surname }}</td>
                        <td>{{ $answer->modul->name }}</td>
                        <td>{{ $answer->telim->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($answer->suallarin_yuklenme_tarixi) }}</td>
                        <td style="width: 8%; !important;">

                            <a class="btn btn-primary" href="{{ url('teacher/check-user-answer/'.$answer->id) }}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{ url('teacher/delet-user-answer-fromdatabase/'.$answer->id) }}" onclick="return confirm('Are you sure to delete')"><i class="far fa-trash-alt"></i></a>

                        </td>
                    </tr>
                @endif
                @endforeach



            </tbody>
            <tfoot>
                <tr>
                    <th>Ad Soyad</th>
                    <th>submodul</th>
                    <th>telim</th>
                    <th>yuklenme tarixi</th>

                    <th>event</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->

</div>
    </div>
</section>

@endsection
