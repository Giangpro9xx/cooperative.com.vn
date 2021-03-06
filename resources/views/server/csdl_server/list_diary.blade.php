<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Danh sách nhật ký nông hộ</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    @include('server_view.header_admin')

    @include('server_view.taskbar_admin')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Dữ liệu  nhật ký nông hộ</h2>
                    <p class="card-text">Chúng tôi cung cấp cho bạn các chức năng cập nhật khi bạn bắt đầu xem lại dữ liệu nhật ký nông <hộ></hộ> </p>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->

                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th><strong>ID_DIARY</strong></th>
                                            <th><strong>Tên nhật ký</strong></th>
                                            <th><strong>DIỆN TÍCH(M<sup>2</sup>)</strong></th>
                                            <th><strong>lOẠI CÂY</strong></th>
                                            <th><strong>ĐỊA CHỈ</strong></th>
                                            <th><strong>HÌNH THỨC CANH TÁC</strong></th>
                                            <th><strong>NGÀY BẮT ĐẦU</strong></th>
                                            <th><strong>TÙY CHỌN</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($diary as $diarys)
                                            @if(Auth::user()->role_id == 4)
                                                @if($diarys->id_user  == Auth::user()->id)
                                                    @php($product = DB::table('products')->where('id','=',$diarys->id_product)->get())
                                                    <tr>
                                                        <td>
                                                            <i class="fas fa-warehouse"></i>
                                                        </td>
                                                        <td>diary0{{$diarys->id}}</td>
                                                        <td><a href="{{route('detail_diary',$diarys->id)}}">{{$diarys->name_diary}}</a></td>
                                                        <td>{{$diarys->dientich_diary}}</td>
                                                        @foreach($product as $products)
                                                            <td>{{$products->name_product}}</td>
                                                        @endforeach
                                                        <td>{{$diarys->address_diary}}</td>
                                                        @foreach($technique as $techniques)
                                                            @if($techniques->id == $diarys->id_technique )
                                                                <td>{{$techniques->name_technique}}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>{{date('d-m-Y', strtotime($diarys->created_at))}} </td>
                                                        <td>
                                                            <a href="{{route('detail_diary',$diarys->id)}}" type="button" class="btn mb-2 btn-outline-secondary"><i class="fas fa-eye"></i> </a>
                                                            <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#varyModal{{$diarys->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i></button>
                                                            <div class="modal fade" id="varyModal{{$diarys->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                    <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan đến nhật ký nông hộ
                                                                                        sẽ biến mất vã không thể khôi phục được nửa</label>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                            <a href="{{route('post_delete_diary',$diarys->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @else
                                                @php($product = DB::table('products')->where('id','=',$diarys->id_product)->get())
                                                <tr>
                                                    <td>
                                                        <i class="fas fa-warehouse"></i>
                                                    </td>
                                                    <td>diary0{{$diarys->id}}</td>
                                                    <td><a href="{{route('detail_diary',$diarys->id)}}">{{$diarys->name_diary}}</a></td>
                                                    <td>{{$diarys->dientich_diary}}</td>
                                                    @foreach($product as $products)
                                                        <td>{{$products->name_product}}</td>
                                                    @endforeach
                                                    <td>{{$diarys->address_diary}}</td>
                                                    @foreach($technique as $techniques)
                                                        @if($techniques->id == $diarys->id_technique )
                                                            <td>{{$techniques->name_technique}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td>{{date('d-m-Y', strtotime($diarys->created_at))}} </td>
                                                    <td>
                                                        <a href="{{route('detail_diary',$diarys->id)}}" type="button" class="btn mb-2 btn-outline-secondary"><i class="fas fa-eye"></i> </a>
                                                        <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#varyModal{{$diarys->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i></button>
                                                        <div class="modal fade" id="varyModal{{$diarys->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan đến nhật ký nông hộ
                                                                                    sẽ biến mất vã không thể khôi phục được nửa</label>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                        <a href="{{route('post_delete_diary',$diarys->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        @include('server_view.paner')
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{asset('public/server/js/jquery.min.js')}}"></script>
<script src="{{asset('public/server/js/popper.min.js')}}"></script>
<script src="{{asset('public/server/js/moment.min.js')}}"></script>
<script src="{{asset('public/server/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/server/js/simplebar.min.js')}}"></script>
<script src='{{asset('public/server/js/daterangepicker.js')}}'></script>
<script src='{{asset('public/server/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('public/server/js/tinycolor-min.js')}}"></script>
<script src="{{asset('public/server/js/config.js')}}"></script>
<script src='{{asset('public/server/js/jquery.dataTables.min.js')}}'></script>
<script src='{{asset('public/server/js/dataTables.bootstrap4.min.js')}}'></script>
<script>
    $('#dataTable-1').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
</script>
<script src="{{asset('public/server/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>--}}
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
<script>
    var msg = '{{Session::get('success_delete_diary')}}';
    var exist = '{{Session::has('success_delete_diary')}}';
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
</body>
</html>
