@extends('admin.layouts.master_admin')

@section('title', 'aboute')

@section('page_title', 'imtahan neticeleri')

@section('content')
<section class="content">
    <div class="container-fluid">
                {{-- telim hissesi --}}
                <div class="card">
                    <div class="card-header" style="text-align: center !important;">
                        <h3 class="card-title">Butun telimler</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Modul</th>
                                    <th>submodul</th>
                                    <th>Telebe sayi</th>

                                    <th>Events</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($submoduls as $submodul)
                                <tr>
                                    <td>{{ $submodul->modul->name }}</td>
                                    <td>
                                        {{ $submodul->name }}
                                    </td>
                                    <td>
                                        {{ $answers->where('submodul_id', '=', $submodul->id)->where('teqdim_edilen_cavablar', '!=', null)->count() }}
                                    </td>

                                    <td style="width: 5%; !important;">

                                        <a class="btn btn-primary" href="{{ route('admin.imtahanneticeleri_submodul',['id' => $submodul->id]) }}"><i class="fas fa-edit"></i></a>


                                    </td>
                                </tr>
                                @endforeach





                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Modul</th>
                                    <th>submodul</th>
                                    <th>Telebe sayi</th>

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
