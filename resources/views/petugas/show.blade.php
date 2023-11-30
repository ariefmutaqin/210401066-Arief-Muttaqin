<style>
 .list-group-item span {
     display: block;
     font-weight: bold;
     margin-bottom: 5px; /* Sesuaikan dengan jarak antara tulisan dan nilai */
 }
</style>
<div class="card mb-3">
 <div class="row g-0">
    <div class="col-md-4">
        @if ($petugas->gambar)
            <img width="150" height="150" class="rounded-circle" src="{{ asset('storage/'.$petugas->gambar) }}" alt="{{ $petugas->name }}" />
        @else
            <!-- Gambar default jika tidak ada gambar -->
            <img width="150" height="150" class="rounded-circle" src="{{ asset('template/img/avatar/default.jpeg') }}" alt="Default Image" />
        @endif
    </div>
    
     <div class="col-md-8">
         <div class="card-body">
             <div class="card-text">
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item">
                         <span>Nama:</span> {{ $petugas->name }}
                     </li>
                     <li class="list-group-item">
                         <span>Username:</span> {{ $petugas->username }}
                     </li>
                     <li class="list-group-item">
                         <span>Email:</span> {{ $petugas->email }}
                     </li>
                 </ul>
             </div>
             <div class="card-text text-right"><small class="text-muted">{{  $petugas->level }}</small></div>
         </div>
     </div>
 </div>
</div>

<script>
  function readURL() {
         var input = this;
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $(input).prev().attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
         }
     }

     $(function () {
         $(".uploads").change(readURL)
         $("#f").submit(function(){
             return false
         })
     })

</script>