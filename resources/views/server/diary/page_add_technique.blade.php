@extends('server_view.master_admin')
@section('title','Quản lý kỹ thuật canh tác')
@section('content')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-5">
                            <br>
                            <h2 class="h4 mb-1 text-center">THÊM MỚI KỸ THUẬT CANH TÁC</h2>
                            <br>
                            <div class="card shadow" style="margin-top: 10px">
                                <div class="card-body">
                                    <form class="needs-validation" action="{{route('post_add_technique')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Tên kỹ thuật</label>
                                            <input type="text" class="form-control" id="" name="name_technique"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea">Mô tả </label>
                                            <textarea class="form-control" id="validationTextarea" name="description_technique" required></textarea>
                                            <div class="invalid-feedback"> Hãy nhập vào mô tả. </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- customized table -->
                        <div class="col-md-7 my-4">
                            <h2 class="h4 mb-1 text-center">DỮ LIỆU KỸ THUẬT CANH TÁC</h2>
                            <p class="mb-3 text-center">Danh sách chỉ hiển thị với người dùng có quyền Admin</p>
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Tên KT canh tác</th>
                                            <th>Mô tả</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($technique as $techniques)
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-paperclip"></i>
                                                    </td>
                                                    <td>
                                                        TECH-0{{$techniques->id}}
                                                    </td>
                                                    <td>{{ucwords($techniques->name_technique)}}</td>
                                                    <td>{{$techniques->description_technique}}</td>
                                                    <td>{{date('d-m-Y', strtotime($techniques->created_at))}}</td>
                                                    <td>
                                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#edit_unit{{$techniques->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i> Chỉnh sửa</button>
                                                            <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#delete_unit{{$techniques->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i> Xóa</button>
                                                        </div>
                                                        {{--                                                    xoa du lieu unit--}}
                                                        <div class="modal fade" id="delete_unit{{$techniques->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="varyModalLabel">Thông báo</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan sẽ bị xóa sạch và không thể phục hồi</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>
                                                                        <a href="{{route('post_delete_technique',$techniques->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--                                                        Edit du lieu unit--}}
                                                        <div class="modal fade" id="edit_unit{{$techniques->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="varyModalLabel">Cập nhật dữ liệu</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('post_edit_technique',$techniques->id)}}" method="post">
                                                                            @csrf
                                                                            <div class="form-group mb-3">
                                                                                <label for="exampleInputEmail1">Tên kỹ thuật canh tác</label>
                                                                                <input type="text" class="form-control" id="" name="name_technique" value="{{$techniques->name_technique}}"  required>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="exampleInputEmail1">Mô tả</label>
                                                                                <input type="text" class="form-control" id="" name="descript_technique" value="{{$techniques->description_technique}}"  required>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="exampleInputEmail1">Ngày tạo</label>
                                                                                <input type="text" class="form-control" id="" name="date_technique" value="{{date('d-m-Y', strtotime($techniques->created_at))}}"  disabled>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn mb-2 btn-info">Cập nhật</button>
                                                                                <button type="button" class="btn mb-2 btn-primary" data-dismiss="modal">Đóng</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                                        <ul class="pagination justify-content-center mb-0">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div> <!-- customized table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
    <script>
        var msg = '{{Session::get('success_add_technique')}}';
        var exist = '{{Session::has('success_add_technique')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1200,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'Đã thêm'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('success_delete_technique')}}';
        var exist = '{{Session::has('success_delete_technique')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1200,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'Đã xóa'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('success_edit_technique')}}';
        var exist = '{{Session::has('success_edit_technique')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1200,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: 'Đã cập nhật'
            })
        }
    </script>

@endsection
