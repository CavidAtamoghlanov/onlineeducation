@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'imtahan neticeleri submodul')

@section('content')
<section class="content">
    <div class="container-fluid">
                {{-- telim hissesi --}}
                <div class="card">
                    <div class="card-header" style="text-align: center !important;">
                        <h3 class="card-title">Butun telimler</h3>

                    </div>
                    @if ( Session::get('success'))
                    <span class="text-success text-lg ml-2">
                        {{ Session::get('success') }}
                    </span>
                    @endif
                    @if ( Session::get('error'))
                    <span class="text-danger text-lg ml-2">
                        {{ Session::get('error') }}
                    </span>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ad</th>
                                    <th>soyad</th>
                                    <th>d cvb say</th>
                                    <th>y cvb say</th>
                                    <th>bal</th>
                                    <th>Events</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($answers as $answer)
                                <tr>
                                    <td>{{ $answer->student->name }}</td>
                                    <td>
                                        {{ $answer->student->surname }}
                                    </td>
                                    <td>
                                        {{ $answerArraytoarray[$answer->student_id]['dCVB'] }}
                                    </td>
                                    <td>
                                        {{ $answerArraytoarray[$answer->student_id]['yCVB'] }}
                                    </td>
                                    <td>
                                        {{ round($answerArraytoarray[$answer->student_id]['dCVBfaiz'],2) }}
                                    </td>

                                    <td style="width: 5%; !important;">

                                        <a class="btn btn-danger" href="{{ route('admin.resetexam', ['student_id' => $answer->student_id, 'answer_id' => $answer->id]) }}" onclick="return confirm('Are you sure to delete')"><i class="fas fa-edit"></i></a>


                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ad</th>
                                    <th>soyad</th>
                                    <th>d cvb say</th>
                                    <th>y cvb say</th>
                                    <th>bal</th>
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
