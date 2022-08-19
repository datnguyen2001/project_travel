@extends('admin.layout.index')
@section('main')
    <style>
        .image-uploader {
            min-height: 200px;
            border: 1px solid #d9d9d9;
            position: relative
        }

        .image-uploader:hover {
            cursor: pointer
        }

        .image-uploader.drag-over {
            background-color: #f3f3f3
        }

        .image-uploader input[type=file] {
            width: 0;
            height: 0;
            position: absolute;
            z-index: -1;
            opacity: 0
        }

        .image-uploader .upload-text {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        .image-uploader .upload-text i {
            display: block;
            font-size: 3rem;
            margin-bottom: .5rem
        }

        .image-uploader .upload-text span {
            display: block
        }

        .image-uploader.has-files .upload-text {
            display: none
        }

        .image-uploader .uploaded {
            padding: .5rem;
            line-height: 0
        }

        .image-uploader .uploaded .uploaded-image {
            display: inline-block;
            width: calc(16.6666667% - 1rem);
            padding-bottom: calc(16.6666667% - 1rem);
            height: 0;
            position: relative;
            margin: .5rem;
            background: #f3f3f3;
            cursor: default
        }

        .image-uploader .uploaded .uploaded-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute
        }

        .image-uploader .uploaded .uploaded-image .delete-image {
            display: none;
            cursor: pointer;
            position: absolute;
            top: .2rem;
            right: .2rem;
            border-radius: 50%;
            padding: .3rem;
            background-color: rgba(0, 0, 0, .5);
            -webkit-appearance: none;
            border: none
        }

        .image-uploader .uploaded .uploaded-image:hover .delete-image {
            display: block
        }

        .image-uploader .uploaded .uploaded-image .delete-image i {
            color: #fff;
            font-size: 1.4rem
        }
    </style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-capitalize">{{$room->name}}</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="bg-white p-4">
                <div class="bg-white p-4">
                    @if (session('error'))
                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{url('admin/booking/phong/update',$room->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3">{{'Tên phòng  :'}}</div>
                            <div class="col-8">
                                <input class="form-control" name="name" value="{{$room->name}}" type="text" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Ảnh/Video bìa :'}}</div>
                            <div class="col-8">
                                <div class="form-control position-relative div-parent" style="padding-top: calc(50% + 46px);">
                                    <div class="position-absolute w-100 h-100 div-file d-flex justify-content-center align-items-center" style="top: 0; left: 0;z-index: 10">
                                        <button type="button" class="position-absolute clear border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%;z-index: 10"><i class="bi bi-x-lg text-white"></i></button>
                                        @if($room->is_video == 1)
                                            <video class="w-100 h-100" style="object-fit: cover" controls>
                                                <source src="{{$room->banner}}">
                                            </video>
                                        @else
                                            <img src="{{$room->banner}}" class="w-100 h-100" style="object-fit: cover">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Ảnh liên quan :'}}</div>
                            <div class="col-8">
                                @if(count($multimedia))
                                    <div class="card-body d-flex flex-wrap p-0">
                                        @foreach($multimedia as $value)
                                            <div class="w-25 p-1">
                                                <div class="position-relative w-100" style="padding-top: 100%">
                                                    <button type="button" value="{{$value->id}}" class="position-absolute clear-image border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -5px;right: -5px;width: 15px;height: 15px;border-radius: 50%;z-index: 10"><i class="bi bi-x-lg text-white" style="font-size: 8px"></i></button>
                                                    <img src="{{$value->src}}" class="w-100 h-100 position-absolute" style="object-fit: cover; top: 0; left: 0">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="card-body p-0">
                                    <label class="mt-2 mb-2"><i class="fa fa-upload"></i> Chọn hoặc kéo ảnh vào khung bên dưới</label>
                                    <div class="input-image-product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Khoảng giá :'}}</div>
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <input name="price" type="text" value="{{number_format($room->price)}}" required class="form-control format-currency" placeholder="Từ">
                                    <input name="price_2" type="text" value="{{number_format($room->price_2)}}" required class="form-control format-currency" placeholder="Đến">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Thuộc nhà nghỉ/khách sạn :'}}</div>
                            <div class="col-8">
                                <select class="form-select" name="hotel">
                                    <option value="">Nhà nghỉ/khách sạn</option>
                                    @foreach($hotel as $value)
                                        <option value="{{$value->id}}" @if($room->hotel_id == $value->id) selected @endif>{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if(count($convenient))
                            <div class="row mt-3">
                                <div class="col-3">{{'Thuộc tính :'}}</div>
                                <div class="col-8">
                                    <div class="d-flex flex-wrap">
                                        @foreach($convenient as $value)
                                            <?php
                                            $room_convenient = \App\Models\RoomConvenientModel::where('room_id',$room->id)->where('convenient_id', $value->id)->first();
                                            ?>
                                            <div class="form-check" style="width: 33%">
                                                <input class="form-check-input" @if(isset($room_convenient)) checked @endif type="checkbox" value="{{$value->id}}" name="convenient[]" id="elevator_{{$value->id}}">
                                                <label class="form-check-label" for="elevator_{{$value->id}}">{{$value->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row mt-5">
                            <div class="col-3"></div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="{{route('admin.booking.phong.index')}}" class="btn btn-danger" style="margin-right: 20px">Hủy</a>
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                            <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg,video/*" hidden>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
@section('script')
    <script src="{{url('assets/js/format_currency.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let parent,class_button;
        $(document).on("click", ".select-image", function () {
            $('input[name="file"]').click();
            parent = $(this).parent();
            class_button = 'clear';
        });
        $('input[type="file"]').change(function(e){
            imgPreview(this);
        });
        function imgPreview(input) {
            let file = input.files[0];
            console.log(file.size);
            let mixedfile = file['type'].split("/");
            let filetype = mixedfile[0]; // (image, video)
            if(filetype == "image"){
                let reader = new FileReader();
                reader.onload = function(e){
                    $("#preview-img").show().attr("src", );
                    let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                        '<button type="button" class="position-absolute '+class_button+' border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%"><i class="bi bi-x-lg text-white"></i></button>'+
                        '<img src="'+e.target.result+'" class="w-100 h-100" style="object-fit: cover">' +
                        '</div>';
                    parent.html(html);
                }
                reader.readAsDataURL(input.files[0]);
            }else if(filetype == "video" || filetype == "mp4"){
                let html = '<div class="position-absolute w-100 h-100 div-file" style="top: 0; left: 0;z-index: 10">' +
                    '<button type="button" class="position-absolute '+class_button+' border-0 bg-danger p-0 d-flex justify-content-center align-items-center" style="top: -10px;right: -10px;width: 30px;height: 30px;border-radius: 50%;z-index: 14"><i class="bi bi-x-lg text-white"></i></button>'+
                    '<video class="w-100 h-100" style="object-fit: cover" controls>\n' +
                    '<source src="'+URL.createObjectURL(input.files[0])+'"></video>'+
                    '</div>';
                parent.html(html);
            }else{
                alert("Invalid file type");
            }
        }
        $(document).on("click", "button.clear", function () {
            $(".div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            $(".div-parent").html(html);
            $('input[name="file"]').val("");
        });
        $("button.clear-image").click(function () {
            let value = $(this).val();
            let url = window.location.origin +'/admin/multimedia/delete/' + value;
            $.confirm({
                title: 'Xác nhận!',
                content: 'Bạn có chắc xóa bản ghi này?',
                buttons: {
                    info: {
                        btnClass: 'btn-blue',
                        text: 'Xác nhận',
                        action: function () {
                            $.ajax({
                                url: url,
                                dataType: 'json',
                                type: 'post',
                                data: null,
                                success: function (data) {
                                    if (data.status) {
                                        location.reload();
                                    } else {
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
    <script src="{{url('assets/js/upload_image.js')}}" type="text/javascript"></script>
@endsection

