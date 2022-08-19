@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle d-flex align-items-center justify-content-between">
            <h1>Danh sách</h1>
            <a href="{{route('admin.booking.category.create')}}" class="btn btn-info text-white">Thêm mới</a>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @if(session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Tên</th>
                    <th scope="col">...</th>
                </tr>
                </thead>
                <tbody>
                @if(count($listData))
                    @foreach($listData as $key => $value)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>
                                <div class="d-flex align-items-center" style="width: 200px">
                                    <img src="{{$value->img}}" style="object-fit: cover; max-width: 100%; max-height: 100%">
                                </div>
                            </td>
                            <td>
                                {{$value->name}}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/admin/booking/category/edit/'.$value->slug)}}" type="button" class="btn btn-success" style="border-radius: inherit">Sửa</a>
                                    <button type="button" class="btn btn-danger btn-delete" value="{{$value->id}}" style="border-radius: inherit">Xóa</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>Không có dữ liệu</tr>
                @endif
                </tbody>
            </table>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-delete").click(function () {
            let value = $(this).val();
            let url = window.location.origin +'/admin/booking/category/delete/' + value;
            $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn có chắc xóa nhà hàng này?',
                buttons: {
                    info: {
                        btnClass: 'btn-blue',
                        text: 'Xác nhận',
                        action: function(){
                            $.ajax({
                                url: url,
                                dataType: 'json',
                                type: 'post',
                                data: null,
                                success: function (data) {
                                    if (data.status){
                                        location.reload();
                                    }else {
                                        Swal.fire({
                                            title: data.msg,
                                            icon: "error",
                                            showCancelButton: true,
                                            confirmButtonText: "Xác nhận!"
                                        });
                                    }
                                }
                            });
                        }
                    },
                    danger: {
                        btnClass: 'btn-red any-other-class',
                        text: 'Hủy'
                    }
                }
            });
        });
    </script>
@endsection
