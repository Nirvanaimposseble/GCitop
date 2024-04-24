@extends('layouts.master')
@section('title','user')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-14 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Change Password {{ Auth()->User()->nama }}
                    </h4>
                    <form action="/change/password" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="password" class="form-label">Input Old Password</label>
                            <input class="form-control" type="password" id="password" name="old_password" placeholder="Insert old password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="newpassword" class="form-label">Input New Password</label>
                            <input class="form-control" type="password" id="newpassword" name="new_password" placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input class="form-control" type="password" id="confirm_password" name="new_password_confirmation" placeholder="Confirm Password">
                            @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Mendapatkan elemen input password dan checkbox
    var passwordInput = document.getElementById("newpassword");
    var showPasswordCheckbox = document.getElementById("showPassword2");

    // Menambahkan event listener untuk checkbox
    showPasswordCheckbox.addEventListener("change", function() {
        // Jika checkbox dicentang, tampilkan password
        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else { // Jika checkbox tidak dicentang, sembunyikan password
            passwordInput.type = "password";
        }
    });
</script>
@endsection
