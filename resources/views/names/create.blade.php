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
                                     
                                      <form class="px-4" action="{{Route('insertdatabarang')}}" method="POST" enctype="multipart/form-data">
                                          @csrf

                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                              <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                              @error('nama')
                                              {{$message}}
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">Foto Barang</label>
                                              <input type="file" name="thumbnail" value="{{old('thumbnail')}}" class="form-control @error('thumbnail')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                              @error('thumbnail')
                                              {{$message}}
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">merk</label>
                                              <input type="text" name="merk" value="{{old('merk')}}" class="form-control @error('merk')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                              @error('merk')
                                              {{$message}}
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="exampleInputEmail1" class="form-label">type</label>
                                              <input type="text" name="type" value="{{old('type')}}" class="form-control @error('type')
                                    is-invalid
                                @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                                              @error('type')
                                              {{$message}}
                                              @enderror
                                          </div>
                                        
                                         
                                            <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                        <div class="col-12 col-md-9">
                                            <select  class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                                                 <option value="">Pilih Kategori</option>
        @foreach ($kategoris as $data)
        <option value="{{ $data->id }}" {{ old('kategori_id') == $data->id ? 'selected' : '' }}>{{ $data->kategori }}</option>
        @endforeach
    </select>
    @if ($errors->has('kategori_id'))
        <div class="invalid-feedback">
            {{ $errors->first('kategori_id') }}
        </div>
    @endif
                                        </div>
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
