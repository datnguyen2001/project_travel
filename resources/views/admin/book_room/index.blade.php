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

        <div class="pagetitle d-flex justify-content-between">
            <h1>Danh sách</h1>
            <p style="font-weight: bold">Tìm thấy <span class="text-danger">{{count($book_room)}}</span> bản ghi</p>
        </div><!-- End Page Title -->
        <form class="d-flex align-items-center" method="get" action="{{route('admin.book_room.index')}}">
            <select name="type_search" class="form-select w-25" style="margin-right: 15px">
                <option value="">Tìm kiếm theo</option>
                <option value="1" @if(request()->get('type_search') == 1) selected @endif>Tên khách hàng</option>
                <option value="2" @if(request()->get('type_search') == 2) selected @endif>SĐT khách hàng</option>
                <option value="3" @if(request()->get('type_search') == 3) selected @endif>Tên nhà nghỉ</option>
                <option value="4" @if(request()->get('type_search') == 4) selected @endif>SĐT nhà nghỉ</option>
            </select>
            <input name="key_search" type="text" value="{{request()->get('key_search')}}" class="form-control w-50">
            <button class="btn btn-info" style="margin-left: 15px">Tìm kiếm </button>
            <a href="{{route('admin.book_room.index')}}" class="btn btn-danger" style="margin-left: 15px">Hủy </a>
        </form>
        <section class="section dashboard">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên khách </th>
                    <th scope="col">SĐT khách hàng </th>
                    <th scope="col">Email khách hàng </th>
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Tên nhà nghỉ/khách sạn</th>
                    <th scope="col">SĐT nhà nghỉ/khách sạn</th>
                    <th scope="col">...</th>
                </tr>
                </thead>
                <tbody>
                @if(count($book_room))
                    @foreach($book_room as $key => $value)
                        <tr>
                            <th scope="row">{{$key + 1}}</th>
                            <td>{{$value->name_customer}}</td>
                            <td>
                                {{$value->phone_customer}}
                            </td>
                            <td>{{$value->email_customer}}</td>
                            <td>
                                @if(isset($value->room_id))
                                    <a href="{{route('admin.booking.phong.edit', $value->room_id)}}">{{$value->name_room}}</a>
                                    @else
                                    {{$value->name_room}}
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.booking.hotel.edit', \Illuminate\Support\Str::slug($value->name_hotel))}}">
                                    {{$value->name_hotel}}
                                </a>
                            </td>
                            <td>{{$value->phone_hotel}}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-success btn-delete" value="{{$value->id}}" style="border-radius: inherit">Sale </button>
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
            $.confirm({
                title: 'Xác nhận !',
                content: '' +
                    '<form action="" class="formName">' +
                    '<div class="form-group">' +
                    '<label class="mb-2">Trạng thái</label>' +
                    '<select class="form-select" name="type">' +
                    '<option value="1">Thành công</option>' +
                    '<option value="0">Thất bại</option>' +
                    '</select>' +
                    '<label class="mt-2 mb-2">Lý do nếu có</label>' +
                    '<textarea rows="4" name="content" placeholder="Your name" class="name form-control"></textarea>' +
                    '</div>' +
                    '</form>',
                buttons: {
                    formSubmit: {
                        text: 'Submit',
                        btnClass: 'btn-blue',
                        action: function () {
                            let data = {};
                            data['type'] = $('select[name="type"]').val();
                            data['content'] = $('textarea[name="content"]').val();
                            $.ajax({
                                url: window.location.origin + '/admin/book_room/sale/'+ value,
                                data: data,
                                type: 'post',
                                dataType: 'json',
                                success: function (data) {
                                    if (data.status){
                                        location.reload();
                                    }
                                }
                            })
                        }
                    },
                    cancel: function () {
                        //close
                    },
                },
                onContentReady: function () {
                    // bind to events
                    var jc = this;
                    this.$content.find('form').on('submit', function (e) {
                        // if the user submits the form by pressing enter in the field.
                        e.preventDefault();
                        jc.$$formSubmit.trigger('click'); // reference the button and click it
                    });
                }
            });
        });
    </script>
@endsection
