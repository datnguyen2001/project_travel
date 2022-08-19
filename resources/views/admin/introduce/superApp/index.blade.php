@extends('admin.layout.index')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
@section('main')
    <main id="main" class="main">

        <div class="pagetitle d-flex align-items-center justify-content-between">
            <h1>Danh sách</h1>
            <a href="{{route('admin.introduce.superApp.create')}}" class="btn btn-info text-white">Thêm mới</a>
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
                    <th scope="col">Title</th>
                    <th scope="col">Our Explores</th>
                    <th scope="col">Destinations</th>
                    <th scope="col">Year Experience</th>
                    <th scope="col">...</th>
                </tr>
                </thead>
                <tbody>
                @if(count($superApp))
                    @foreach($superApp as $key => $value)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>
                                <div class="d-flex align-items-center" style="width: 200px">
                                    <img src="{{$value->img_1}}" style="object-fit: cover; max-width: 100%; max-height: 100%">
                                </div>
                            </td>
                            <td>
                                {{$value->title}}
                            </td>
                            <td>
                                {{$value->Explores}}
                            </td>
                            <td>
                                {{$value->Destinations}}
                            </td>
                            <td>
                                {{$value->Experience}}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('admin.introduce.superApp.edit',$value->id)}}" type="button" class="btn btn-success" style="border-radius: inherit">Sửa</a>
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
            let url = window.location.origin +'/admin/introduce/superApp/delete/' + value;
            $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn có chắc xóa siêu ứng dụng này?',
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
        // $('input[name="display"]').change(function () {
        //     $.ajax({
        //         url: window.location.origin + '/admin/explore_tourism/posts/display',
        //         dataType: 'json',
        //         type: 'post',
        //         data: {'id' : $(this).val()},
        //         success: function (data) {
        //             console.log(data);
        //         }
        //     });
        // });
    </script>
@endsection