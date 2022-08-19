@extends('admin.layout.index')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle d-flex align-items-center justify-content-between">
            <h1>Danh sách</h1>
            <a href="{{route('admin.booking.convenient.create')}}" class="btn btn-info text-white">Thêm mới</a>
        </div><!-- End Page Title -->
        <div class="pagetitle d-flex align-items-center justify-content-between">
            <h1>Tìm thấy <span class="text-danger">{{count($listData)}}</span> bản ghi</h1>
        </div>
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
                    <th scope="col">Icon</th>
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
                                    <img src="{{$value->icon}}" style="object-fit: cover; max-width: 100%; max-height: 100%">
                                </div>
                            </td>
                            <td>
                                {{$value->name}}
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{url('/admin/booking/convenient/edit/'.$value->id)}}" type="button" class="btn btn-success" style="border-radius: inherit">Sửa</a>
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
