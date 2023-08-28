          @extends('layout.admin')
@section('content')
             @extends('layout.sidebar')
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Kategori</strong>
                            </div>
                            <div class="card-body">
                                <a href="/tambahkategori" class="btn btn-success mb-2">Tambah+</a>
                                <table class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Dibuat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                $no = 1;
                                @endphp
                                @foreach ($data as $index=>$row )
                                <tr>
                                 <th scope="row">{{ $index +$data->firstitem()}}</th>
                                    <td>{{ $row->kategori}}</td>
                                    <td>{{ $row->created_at->format('D / M / Y')}}</td>
                        <td> <a href="/deleted/{{ $row->id }}" class="btn btn-sm btn-danger">Hapus</a></td>
                                </tr>
                                @endforeach
                                        
                                    </tbody>
                                </table>
                                  <div>
                            showing
                            {{ $data->firstitem() }}
                            to
                            {{ $data->lastitem() }}
                            of
                            {{ $data->total() }}
                            entries
                        </div>
                        <div class="pull-right">
                            {{ $data ->withQueryString()-> links() }}
                        </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        @endsection