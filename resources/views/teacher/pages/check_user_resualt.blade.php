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
                <form action="{{ url('teacher/store_check/'.$answer->id) }}" method="POST">
                    @csrf
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>sual</th>
                                <th>Cavab</th>
                                <th>event</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answer->teqdim_edilen_cavablar as $cvb)
                                <tr>
                                    <td>{{ $answer->student->name }} &nbsp; {{ $answer->student->surname }}</td>

                                    <td >{{ 'Sual '.$loop->iteration }}</td>
                                    <td style="{{ ($answer->cavablarin_neticesi[$loop->iteration-1]=='0') ? 'background-color: red' : '' }} {{ ($answer->cavablarin_neticesi[$loop->iteration-1]=='1') ? 'background-color: green' : '' }}">{{ $cvb }}</td>


                                   @if ($answer->cavablarin_neticesi[$loop->iteration-1]=='')
                                    <td style="width: 8%; !important;">
                                        <a class="btn btn-primary" href="{{ url('teacher/check-user-answer/'.$answer->id.'/'.$loop->iteration) }}" onclick="return confirm('Are you sure to delete')"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ url('teacher/check-user-answer_notcorrect/'.$answer->id.'/'.$loop->iteration) }}" onclick="return confirm('Are you sure to delete')"><i class="far fa-trash-alt"></i></a>


                                    </td>
                                   @endif
                                </tr>
                            @endforeach




                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ad Soyad</th>
                                <th>sual</th>
                                <th>Cavab</th>
                                <th>event</th>

                            </tr>
                        </tfoot>
                    </table>


                </form>
            </div>
            <!-- /.card-body -->

        </div>


    </div>
</section>

@endsection
