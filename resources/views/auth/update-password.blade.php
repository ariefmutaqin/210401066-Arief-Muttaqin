<!-- resources/views/auth/change-password.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-xl-8 order-xl-1 mt-4">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('profile.updatePassword', $user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ganti Password</h3>
                                <div class="flash" data-flash="{{ session()->get('success') }}"></div>
                            </div>
                            <div class="col-4 text-right">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Ganti Password</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="old_password">Password Lama</label>
                                    <input type="password" id="old_password" class="form-control" name="old_password">
                                    @error('old_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for="customCheckLogin">
                                       
                                      <span class="text-muted">Show password</span>
                                    </label>
                                  </div> --}}
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="new_password">Password Baru</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password">
                                    @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="new_password_confirmation">Konfirmasi Password Baru</label>
                                    <input type="password" id="new_password_confirmation" class="form-control" name="new_password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
<script>
    $(document).ready(function(){

          // show and hide password
          $('#customCheckLogin').on('click',function () {
             
             if ($(this).is(':checked')) {
                 $('#old_password').attr('type','text');
             } else{
                  $('#old_password').attr('type','password');
             }
          })
    })
</script>