        
             @extends('layout.navbar')
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
                                <a href="/tambahbarang" class="btn btn-success mb-2">Tambah+</a>
                                <table class="table table-striped table-bordered">
                                
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Foto Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>seri</th>
                                            <th>Warna</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php
                                $no = 1;
                                @endphp
                                @foreach ($names as $index=>$row )
                                <tr>
                                 <th scope="row">{{ $index +$names->firstitem()}}</th>
                                    <td><img src="{{ asset('/storage/foto/'.$row->image) }}" class="rounded" style="width: 150px"></td>
                                    <td>{{ $row->nama}}</td>
                                    <td>{{ $row->merk}}</td>
                                    <td>{{ $row->type}}</td>
                                    <td>{{ $row->seri}}</td>
                                    <td>{{ $row->warna}}</td>
                                    <td>{{ $row->kategori->kategori}}</td>
                                    <td>
                    @if($row->status === 'borrowed')
                        <span class="badge badge-success">Borrowed</span>
                    @else
                        <span class="badge badge-secondary">Available</span>
                    @endif
                </td>
                        <td> <a href="/deleted/{{ $row->id }}" class="btn btn-sm btn-danger">Hapus</a>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#qrCodeModal-{{ $row->id }}">Show QR Code</button>
        <a href="{{ route('scan.qr.code', ['id' => $row->id]) }}" class="btn btn-sm btn-secondary">Scan QR Code for {{ $row->nama }}</a>
                        </td>
                          
                                </tr>
                                
    <!-- Modal -->
    <div class="modal fade" id="qrCodeModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="qrCodeModalLabel-{{ $row->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrCodeModalLabel-{{ $row->id }}">QR Code for {{ $row->nama }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($row->qrcode)
                        <img src="{{ asset('storage/' . $row->qrcode) }}" alt="QR Code">
                    @else
                        QR Code not available
                    @endif
                </div>
                <div class="modal-footer">
                    @if($row->qrcode)
                        <a href="{{ route('names.download', ['id' => $row->id]) }}" class="btn btn-primary">Download QR Code</a>
                    @endif
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
                                @endforeach
                                        
                                    </tbody>
                                </table>
                                  <div>
                            showing
                            {{ $names->firstitem() }}
                            to
                            {{ $names->lastitem() }}
                            of
                            {{ $names->total() }}
                            entries
                        </div>
                        <div class="pull-right">
                            {{ $names ->withQueryString()-> links() }}
                        </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
       
     