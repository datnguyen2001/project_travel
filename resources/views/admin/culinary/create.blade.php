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
            <h1 class="text-capitalize">Thêm món ăn</h1>
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
                    <form action="{{route('admin.culinary.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="type" value="{{$type}}" hidden>
                        <div class="row">
                            <div class="col-3">{{'Tên món  :'}}</div>
                            <div class="col-8">
                                <input class="form-control" name="name" type="text" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Mô tả ngắn :'}}</div>
                            <div class="col-8">
                                <textarea class="form-control" name="content" type="text" maxlength="255" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Ảnh/Video bìa bài viết :'}}</div>
                            <div class="col-8">
                                <div class="form-control position-relative div-parent" style="padding-top: calc(50% + 46px);">
                                    <button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                        <i style="font-size: 30px" class="bi bi-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Ảnh bài viết :'}}</div>
                            <div class="col-8">
                                <div class="form-control position-relative div-parent-1" style="padding-top: calc(50% + 46px);">
                                    <button type="button" class="position-absolute border-0 bg-transparent select-img-1" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                        <i style="font-size: 30px" class="bi bi-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Video review món :'}}</div>
                            <div class="col-8">
                                <div class="form-control position-relative video-review" style="padding-top: calc(50% + 46px);">
                                    <button type="button" class="position-absolute border-0 bg-transparent select-video" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">
                                        <i style="font-size: 30px" class="bi bi-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-3">{{'Ảnh liên quan :'}}</div>
                            <div class="col-8">
                                <div class="card-body p-0">
                                    <label class="mt-2 mb-2"><i class="fa fa-upload"></i> Chọn hoặc kéo ảnh vào khung bên dưới</label>
                                    <div class="input-image-product">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Mô tả :'}}</div>
                            <div class="col-8">
                                <textarea name="description" class="tinymce-editor"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Khoảng giá :'}}</div>
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <input name="price" type="text" class="form-control format-currency" placeholder="Từ">
                                    <input name="price_2" type="text" class="form-control format-currency" placeholder="Đến">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Đánh giá :'}}</div>
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <input name="rating" type="text" class="form-control format-currency" placeholder="Sao">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Danh mục :'}}</div>
                            <div class="col-8">
                                <select name="category" class="form-select">
                                    <option value="">Chọn</option>
                                    @if(count($category))
                                        @foreach($category as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">{{'Quán ăn liên quan:'}}</div>
                            <div class="col-8">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Chọn</th>
                                        <th scope="col" style="width: 90px">Ưu tiên</th>
                                        <th scope="col">Banner</th>
                                        <th scope="col">Tên</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($listRestaurant))
                                        @foreach($listRestaurant as $key => $value)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="restaurant[]" value="{{$value->id}}">
                                                </td>
                                                <td>
                                                    <input type="radio" name="restaurant_id" value="{{$value->id}}">
                                                </td>
                                                <td>
                                                    <div class="w-100 position-relative" style="padding-top: 50%;min-width: 150px">
                                                        @if($value->type == 1)
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
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>Không có dữ liệu</tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3"></div>
                            <div class="col-8 d-flex justify-content-end">
                                <a href="{{route('admin.culinary.index')}}" class="btn btn-danger" style="margin-right: 20px">Hủy</a>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                            <input type="file" name="img_1" accept="image/x-png,image/gif,image/jpeg,video/*" hidden>
                            <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg,video/*" hidden>
                            <input type="file" name="video" accept="video/*" hidden>
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
        let parent,class_button;
        $(document).on("click", ".select-image", function () {
            $('input[name="file"]').click();
            parent = $(this).parent();
            class_button = 'clear';
        });
        $(document).on("click", ".select-video", function () {
            $('input[name="video"]').click();
            parent = $(this).parent();
            class_button = 'clear_video';
        });
        $(document).on("click", ".select-img-1", function () {
            $('input[name="img_1"]').click();
            parent = $(this).parent();
            class_button = 'clear_img_1';
        });
        $('input[type="file"]').change(function(e){
            imgPreview(this);
        });
        $('input[type="video"]').change(function(e){
            imgPreview(this);
        });
        $('input[name="img_1"]').change(function(e){
            imgPreview(this);
        });
        function imgPreview(input) {
            let file = input.files[0];
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
            $(".div-parent .div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-image" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            $(".div-parent").html(html);
            $('input[name="file"]').val("");
        });
        $(document).on("click", "button.clear_video", function () {
            $(".video-review .div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-video" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            $(".video-review").html(html);
            $('input[name="video"]').val("");
        });
        $(document).on("click", "button.clear_img_1", function () {
            $(".div-parent-1 .div-file").remove();
            let html = '<button type="button" class="position-absolute border-0 bg-transparent select-img-1" style="top: 50%;left: 50%;transform: translate(-50%,-50%)">\n' +
                '                                    <i style="font-size: 30px" class="bi bi-download"></i>\n' +
                '                                </button>';
            $(".div-parent-1").html(html);
            $('input[name="img_1"]').val("");
        });
    </script>
    <script src="{{url('assets/js/upload_image.js')}}" type="text/javascript"></script>
@endsection
