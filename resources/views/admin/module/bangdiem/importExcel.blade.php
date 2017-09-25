@extends('admin.app')
@section('title','Nhập điểm')
@section('content')

<section class="content">

@include('admin.block.error')
<form action="" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
          <input type="file" name="bangdiem">
          <input type="submit" name="Import" value="Import">
        
  </form>
</section>
@endsection