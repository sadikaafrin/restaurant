@extends('layouts.app')
@push('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">  
@endpush
@section('admin_content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Slider</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($sliders as $key => $slider)
                   <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->sub_title }}</td>
                    <td><img src="{{  asset('uploads/slider/'. $slider->image) }}" alt="" style="height: 70px; width: 200px;"></td>
                    <td>
                      <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info">Edit</a>
                      <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy' , $slider->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                      </form>
                      <button class="btn btn-danger" type="button" onclick="
                      if(confirm('Are You sure to delete this?')){
                      event.preventDefault(),
                      document.getElementById('delete-form-{{ $slider->id }}').submit();
                      }else{
                        event.preventDefault();
                      }">
                       Delete </button>
                    </td>
                   </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#example2').DataTable();
});
</script>
@endpush