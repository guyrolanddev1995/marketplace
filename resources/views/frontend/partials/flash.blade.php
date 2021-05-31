@if(session('success'))
<div class="text-center flash" role="alert" style="height: 60px; display:flex; align-items:center; justify-content:center; background-color:rgb(13, 170, 13); color:white">
   {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="text-center flash" role="alert" style="height: 60px; display:flex; align-items:center; justify-content:center; background-color:red; color:white">
   {{ session('error') }}
</div>
@endif

