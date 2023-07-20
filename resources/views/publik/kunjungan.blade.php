<!DOCTYPE html>
<html>
    <head>
        <title>Buku Tamu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container " style="height: 100vh;">
            <div class="row align-items-center h-100 d-flex justify-content-center">
                <div class="col-md-4">
                    <form id="form-tambah-kunjungan" class="was-validated" method="post" action="/kunjungan/baru">
                        @csrf
                        <p class="fs-4 fw-bold text-dark text-center">
                            Kunjungan Tamu
                        </p>
                        <p class="fs-6 text-dark text-center">
                            Kepada tamu diharapkan untuk memasukkan informasi diri dan tujuan kunjungan
                        </p>
                        
                        <div class="form-outline mb-3">
                            <label class="form-label primary-font" for="input-nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="input-nama" class="form-control" placeholder="nama lengkap" required/>
                            <div class="invalid-feedback">
                                Harus diisi
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label primary-font" for="input-nomor-telepon">Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" id="input-nomor-telepon" class="form-control" placeholder="nomor telepon" required/>
                            <div class="invalid-feedback">
                                Harus diisi
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label primary-font" for="input-alamat">Alamat</label>
                            <input type="text" name="alamat" id="input-alamat" class="form-control" placeholder="alamat" required/>
                            <div class="invalid-feedback">
                                Harus diisi
                            </div>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label primary-font" for="input-instansi">Instansi (optional)</label>
                            <input type="text" name="instansi" id="input-instansi" class="form-control" placeholder="instansi"/>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label primary-font" for="input-tujuan-kunjungan">Tujuan Kunjungan</label>
                            <input type="text" name="tujuan_kunjungan" id="input-tujuan-kunjungan" class="form-control" placeholder="tujuan kunjungan" required/>
                            <div class="invalid-feedback">
                                Harus diisi
                            </div>
                        </div>
                        <div class="form-outline mb-3 justify-content-center">
                            <div class="row d-flex flex-column">
                                <label class="form-label primary-font" for="input-tujuan-kunjungan">Tanda Tangan</label>
                                <div class="d-flex justify-content-center">
                                    <canvas id="input-tanda-tangan" width="240" height="120" class="border border-dark"></canvas>
                                </div>
                                <input type="text" name="tanda_tangan" id="input-tanda-tangan-hidden" class="form-control" hidden required/>
                                <div class="invalid-feedback">
                                        Harus diisi
                                </div>
                                <div class="row m-0 p-2">
                                    <div class="m-0 p-2">
                                        <button type="button" class="btn btn-warning btn-block mx-1" onclick="tandaTanganUndo();">Undo</button>
                                        <button type="button" class="btn btn-danger btn-block mx-1" onclick="tandaTanganReset();">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.6/dist/signature_pad.umd.min.js"></script>
        <script src="/js/kunjungan.js"></script>
    </body>
</html>