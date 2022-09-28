<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container px-5 my-5">
    <h3 align="center">Data Gaji Pegawai</h3>
    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method='POST'>
        <div class="form-floating mb-3">
            <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
            <label for="namaPegawai">Nama Pegawai</label>
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Harap masukan nama Pegawai.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="agama" aria-label="Agama">
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">Konghucu</option>
                <option value="Kristen">Kristen</option>
            </select>
            <label for="agama">Agama</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check">
                <input class="form-check-input" value="manager" type="radio" name="jabatan" data-sb-validations="required" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="asisten" type="radio" name="jabatan" data-sb-validations="required" />
                <label class="form-check-label" for="asisten">Asisten</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="kabag" type="radio" name="jabatan" data-sb-validations="required" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="staff" type="radio" name="jabatan" data-sb-validations="required" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="jabatan:required">Harap Pilih 1 Jabatan.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="belum" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="belum">Belum</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" name="simpan" type="submit">Simpan</button>



        </div>
    </form>
</div>

    <?php
    error_reporting(0);
    $button = $_POST["simpan"];
    $nama = $_POST["namaPegawai"];
    $agama = $_POST["agama"];
    $jabatan = $_POST["jabatan"];
    $status =   $_POST["status"];
    $jAnak = $_POST["jumlahAnak"];

    switch ($jabatan) {
        case 'manager': $gapok = 20000000;break;
        case 'asisten': $gapok = 15000000;break;
        case 'kabag': $gapok = 10000000;break;
        case 'staff': $gapok = 4000000;break;
        default: $gapok = 0; break;
    }

    $tunjab = 20/100*$gapok;
    if ($status == 'menikah' && $jAnak<= 2) $tunjkel = 5/100*$gapok;
    else if ($status == 'menikah' && $jAnak>2 && $jAnak<=5) $tunjkel = 10/100*$gapok;
    else if ($status == 'menikah' && $jAnak> 5) $tunjkel = 15/100*$gapok;
    else {
        $tunjkel = 0;
    }

    $gajikotor = $gapok + $tunjab + $tunjkel;
    $Zprofesi = ($agama == 'Islam' && $gajikotor>=6000000)? 2.5/100 * $gajikotor : 0 ;

    $thp = $gajikotor - $Zprofesi;
    


    if (isset($button)) { ?>
        <section id="table">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Agama</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                    <th>Jumlah anak</th>
                    <th>Gaji pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Keluarga</th>
                    <th>Gaji Kotor</th>
                    <th>Zakat profesi</th>
                    <th>Take Home Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $nama ?></td>
                    <td><?= $agama ?></td>
                    <td><?= $jabatan ?></td>
                    <td><?= $status ?></td>
                    <td><?= $jAnak ?></td>
                    <td><?= number_format($gapok, 2, ',', '.'); ?></td>
                    <td><?= number_format($tunjab, 2, ',', '.'); ?></td>
                    <td><?= number_format($tunjkel, 2, ',', '.'); ?></td>
                    <td><?= number_format($gajikotor, 2, ',', '.'); ?></td>
                    <td><?= number_format($Zprofesi, 2, ',', '.'); ?></td>
                    <td><?= number_format($thp, 2, ',', '.'); ?></td>
                </tr>
            </tbody>
          </table>
    </section>
    <?php } ?>
    





    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

