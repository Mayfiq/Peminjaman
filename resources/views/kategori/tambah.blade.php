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
                                <strong class="card-title">Tambah Kategori</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                
                                     <form class="px-4" action="{{Route('insertdatakategori')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">kategori</label>
                                <input type="text" name="kategori" value="{{old('kategori')}}" class="form-control @error('kategori')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('kategori')
                                {{$message}}
                              @enderror
                            </div>

                        <button type="submit" class="btn btn-primary">kirim</button>
                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        @endsection