@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle d-flex justify-content-between">
            <h1>Danh sách</h1>
            <a class="btn btn-info" href="{{route($route)}}">Thêm mới</a>
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
                    <th scope="col">Mô tả</th>
                    <th scope="col">...</th>
                </tr>
                </thead>
                <tbody>
                @if(count($listData))
                    @foreach($listData as $key => $value)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>
                                <div class="w-100 position-relative" style="padding-top: 50%;min-width: 200px">
                                    @if($value->video_active == 0)
                                        <img src="{{$value->banner}}" class="position-absolute w-100 h-100" style="top: 0;left: 0;object-fit: cover">
                                    @else
                                        <video class="position-absolute w-100 h-100" style="top: 0;left: 0;object-fit: cover" controls>
                                            <source src="{{$value->banner}}">
                                        </video>
                                    @endif
                                </div>
                            </td>
                            <td>
                                {{$value->name}}
                            </td>
                            <td>{{$value->content}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/admin/booth/edit/'.$value->id)}}" type="button" class="btn btn-success" style="border-radius: inherit">Sửa</a>
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
            let url = window.location.origin +'/admin/booth/specialties/delete/' + value;
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
