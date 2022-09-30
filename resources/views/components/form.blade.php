<form>
    <div class="mb-3">
        <label for="fullName" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="fullName" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="address">
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="phone" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="phone" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="datepicker" class="form-label">Tanggal Periksa</label>
                <input type="text" class="form-control" id="datepicker" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="position-relative mb-3">
                <label for="unit" class="form-label">Poliklinik/Unit Penunjang</label><br>
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 100%;">
                    SP. Jantung
                </button>
                <ul class="dropdown-menu" style="width: 100%;">
                    <li><a class="dropdown-item" href="#">Regular link</a></li>
                    <li><a class="dropdown-item" href="#" aria-current="true">Active link</a></li>
                    <li><a class="dropdown-item" href="#">Another link</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Pesan</label>
        <input type="text" class="form-control" id="message">
    </div>
    <button type="submit" class="btn btn-success mt-4 p-2" style="width: 100%;">Kirimkan</button>
</form>