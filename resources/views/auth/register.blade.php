@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form Registrasi Kandidat') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="regForm">
                        @csrf

                        <!-- Step 1: Profil -->
                        <div class="tab">
                            <h3>Profil Kandidat</h3>

                            <!-- Nama Lengkap -->
                            <div class="form-group">
                                <label for="name">{{ __('Nama Lengkap') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>

                            <!-- KTP -->
                            <div class="form-group">
                                <label for="ktp">{{ __('Nomor Induk Kependudukan (KTP)') }}</label>
                                <input type="text" class="form-control" name="ktp" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>

                            <!-- Konfirmasi Email -->
                            <div class="form-group">
                                <label for="email-confirm">{{ __('Konfirmasi Email') }}</label>
                                <input type="email" class="form-control" name="email_confirmation" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Ulangi Password') }}</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Step 2: Alamat -->
                        <div class="tab">
                            <h3>Alamat Lengkap Domisili</h3>

                            <div class="form-group">
                                <label for="provinsi">{{ __('Provinsi') }}</label>
                                <input type="text" class="form-control" name="provinsi" required>
                            </div>

                            <div class="form-group">
                                <label for="kota">{{ __('Kabupaten / Kota') }}</label>
                                <input type="text" class="form-control" name="kota" required>
                            </div>

                            <div class="form-group">
                                <label for="kecamatan">{{ __('Kecamatan') }}</label>
                                <input type="text" class="form-control" name="kecamatan" required>
                            </div>

                            <div class="form-group">
                                <label for="desa">{{ __('Desa / Kelurahan') }}</label>
                                <input type="text" class="form-control" name="desa" required>
                            </div>

                            <div class="form-group">
                                <label for="kode_pos">{{ __('Kode Pos') }}</label>
                                <input type="text" class="form-control" name="kode_pos" required>
                            </div>

                            <div class="form-group">
                                <label for="status_rumah">{{ __('Status Rumah') }}</label>
                                <select class="form-control" name="status_rumah" required>
                                    <option value="Rumah Pribadi">Rumah Pribadi</option>
                                    <option value="Sewa">Sewa</option>
                                </select>
                            </div>
                        </div>

                        <!-- Step 3: Data Tambahan -->
                        <div class="tab">
                            <h3>Data Tambahan</h3>

                            <div class="form-group">
                                <label for="birthplace">{{ __('Tempat, Tanggal Lahir') }}</label>
                                <input type="text" class="form-control" name="birthplace" value="Kota Tasikmalaya" required>
                                <input type="date" class="form-control" name="birthdate" value="2003-01-04" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('No. Ponsel') }}</label>
                                <input type="text" class="form-control" name="phone" value="085156361450" required>
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">{{ __('Whatsapp') }}</label>
                                <input type="text" class="form-control" name="whatsapp" value="085156361450" required>
                            </div>

                            <div class="form-group">
                                <label for="status_pernikahan">{{ __('Status Pernikahan') }}</label>
                                <select class="form-control" name="status_pernikahan" required>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="berat">{{ __('Berat') }}</label>
                                <input type="text" class="form-control" name="berat" value="70" required>
                            </div>

                            <div class="form-group">
                                <label for="tinggi">{{ __('Tinggi') }}</label>
                                <input type="text" class="form-control" name="tinggi" value="175" required>
                            </div>

                            <div class="form-group">
                                <label for="cv">{{ __('Upload CV') }}</label>
                                <input type="file" class="form-control-file" name="cv" required>
                            </div>
                        </div>

                        <!-- Navigation buttons -->
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Multi-step form logic
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";

  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }

  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Selanjutnya";
  }

  fixStepIndicator(n);
}

function nextPrev(n) {
  var x = document.getElementsByClassName("tab");

  if (n == 1 && !validateForm()) return false;

  x[currentTab].style.display = "none";
  currentTab = currentTab + n;

  if (currentTab >= x.length) {
    document.getElementById("regForm").submit();
    return false;
  }

  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");

  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }

  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}
</script>
@endsection
