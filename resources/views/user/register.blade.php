@extends('layout.layout')
@section('container')
<br><br><br><br><br><br>
<form action="/register/store" method="post" class="mx-auto mt-5 col-md-6">
    <h1 class="text-center">Please Register</h1>
    @csrf
    <div class="form-group">
        <input type="number" class="form-control" name="role_id" value="2" hidden required>
    </div>
    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap (3-20 karakter)</label>
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap" required>
        <small class="form-text text-muted">Minimal 3 karakter, maksimal 255 karakter.</small>
    </div>
    <div class="form-group">
        <label for="username">Username (-3 karakter)</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
        <small class="form-text text-muted">Minimal 3 karakter, maksimal 255 karakter.</small>
    </div>
    <div class="form-group">
        <label for="password">Password (4-255 karakter)</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
        <small class="form-text text-muted">Minimal 4 karakter, maksimal 255 karakter.</small>
        <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" id="showPassword">
            <label class="form-check-label" for="showPassword">Tampilkan Password</label>
        </div>
    </div>
    <div class="form-group">
        <label for="no_hp">Nomer HP (3-255 karakter)</label>
        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor HP">
        <small class="form-text text-muted">Minimal 3 karakter, maksimal 255 karakter.</small>
    </div>
    <div class="form-group">
        <label for="no_ktp">Nomer KTP (3-255 karakter)</label>
        <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukkan nomor KTP">
        <small class="form-text text-muted">Minimal 3 karakter, maksimal 255 karakter.</small>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Lengkap (3-255 karakter)</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap">
        <small class="form-text text-muted">Minimal 3 karakter, maksimal 255 karakter.</small>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email">
        <small class="form-text text-muted">Email yang valid diperlukan.</small>
    </div>
    <button type="submit" class="btn btn-primary">Daftar</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordInput = document.getElementById('password');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text'; // Show password
        } else {
            passwordInput.type = 'password'; // Hide password
        }
    });
});
</script>

<style>
.form-error {
    color: red;
    font-size: 0.875em;
    display: block;
    margin-top: 0.25em;
}
</style>
@endsection
