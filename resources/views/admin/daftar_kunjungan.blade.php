<!DOCTYPE html>
<html>
    <head>
        <title>Buku Tamu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="col-12 m-0 p-0" style="height: 100vh;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Buku Tamu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <form id="form-logout" method="post" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn-light btn-block">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container h-100">
                <div class="row align-items-center h-100 d-flex justify-content-center">
                    <div class="col">
                        <form id="pilihan-tanggal" method="get" action="/dashboard">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label>Pilih Tanggal</label>
                                    <input name="tanggal" type="date" value="{{ $tanggal }}">
                                </div>
                                <div class="col-4">
                                    <input class="form-check-input" type="checkbox" name="show_deleted" value="true" 
                                        @if($showDeleted === "true")
                                            checked
                                        @endif
                                    >
                                    <label>Show Deleted</label>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Nomor Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Instansi</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Tanggal Kunjungan</th>
                                    <th scope="col">Tanda Tangan</th>
                                    <th scope="col">Command</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftarTamu as $tamu)
                                    <tr 
                                        @if($tamu->deleted === true)
                                        class="table-danger"
                                        @endif
                                    >
                                        <td>{{ $tamu->nama }}</td>
                                        <td>{{ $tamu->nomorTelepon }}</td>
                                        <td>{{ $tamu->alamat }}</td>
                                        <td>{{ $tamu->instansi }}</td>
                                        <td>{{ $tamu->tujuanKunjungan }}</td>
                                        <td>{{ $tamu->tanggalKunjungan }}</td>
                                        <td><img src="{{ $tamu->tandaTangan }}" width="80" height="40"></td>
                                        @if($tamu->deleted)
                                            <td>
                                                <form id="restore-{{ $tamu->id }}" method="post" action="/kunjungan/status">
                                                    @csrf
                                                    <input name="id" value="{{ $tamu->id }}" hidden> 
                                                    <input name="status" value="restore" hidden> 
                                                    <button type="submit" class="btn btn-success btn-block" >Restore</button>
                                                </form>
                                            </td>
                                        @else($tamu->deleted)
                                            <td>
                                                <form id="delete-{{ $tamu->id }}" method="post" action="/kunjungan/status">
                                                    @csrf
                                                    <input name="id" value="{{ $tamu->id }}" hidden> 
                                                    <input name="status" value="delete" hidden> 
                                                    <button type="submit" class="btn btn-danger btn-block" >Delete</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>