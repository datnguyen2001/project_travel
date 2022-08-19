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

        <div class="pagetitle">
            <h1>Danh sách</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình ảnh/video</th>
                    <th scope="col">Title</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Đường link</th>
                    <th scope="col">Bật/tắt</th>
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
                                    @if($value->type == 1)
                                        <img src="{{$value->src}}" class="position-absolute w-100 h-100" style="top: 0;left: 0;object-fit: cover">
                                        @else
                                        <video class="position-absolute w-100 h-100" style="top: 0;left: 0;object-fit: cover" controls>
                                            <source src="{{$value->src}}">
                                        </video>
                                    @endif
                                </div>
                            </td>
                            <td>
                                {{$value->title}}
                            </td>
                            <td>{{$value->content}}</td>
                            <td>{{$value->link}}</td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" @if($value->display == 1)checked @endif name="display" value="{{$value->id}}">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/admin/banner/edit/'.$value->id)}}" type="button" class="btn btn-success" style="border-radius: inherit">Sửa</a>
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
        $('input[name="display"]').change(function () {
           let value = $(this).val();
           let url = window.location.origin + '/admin/banner/hide/' + value;
           $.ajax({
              url: url,
              dataType: 'json',
              type: 'post',
              data: null,
              success: function (data) {
                  if (data.status){
                      console.log(data);
                  }
              }
           });
        });
        $(".btn-delete").click(function () {
            let value = $(this).val();
            let url = window.location.origin +'/admin/banner/delete/' + value;
            $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn có chắc xóa banner này?',
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
