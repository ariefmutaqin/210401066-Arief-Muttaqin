<form action="{{ route('petugas.update',$petugas->id) }}" method="post">
 @csrf
 @method('put')
 <div class="form-group">
     <label>Nama</label>
     <input type="text" name="name"  class="form-control" value="{{ $petugas->name }}">
 </div>
 {{-- <div class="form-group">
     <label>Username</label>
     <input type="text" name="username"  class="form-control" value="{{ $petugas->username }}">
 </div> --}}
 <div class="form-group">
     <label>Email</label>
     <input type="email" name="email"  class="form-control" value="{{ $petugas->email }}">
 </div>
 
 <div class="form-group">
     <label>Password</label>
     <input type="password" name="password"  class="form-control" value="{{ $petugas->password }}">
 </div>
 <div class="form-group">
    <label>Level</label>
    <select name="level" class="form-control">
        <option selected disabled>-- Pilih Jenis Level -- </option>
        <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}> Admin</option>
        <option value="user" {{ $petugas->level == 'user' ? 'selected' : '' }}> User</option>
    </select>
 
 </div>

 <div class="float-right">
     <button type="submit" class="btn btn-primary">Update</button>
 </div>
 </form>