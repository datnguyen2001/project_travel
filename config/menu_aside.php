<?php

return [
    'admin' => [
        [
            'name' => 'dashboard',
            'title' => 'Banner hình ảnh',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh sách',
                    'route' => 'admin.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Tạo mới',
                    'route' => 'admin.create',
                    'name' => 'create'
                ]
            ],
        ],
        [
            'name' => 'restaurant',
            'title' => 'Nhà hàng',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh sách',
                    'route' => 'admin.restaurant.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Thêm mới',
                    'route' => 'admin.restaurant.create',
                    'name' => 'create'
                ]
            ]
        ],
        [
            'name' => 'culinary',
            'title' => 'Ẩm thực',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục về ẩm thực',
                    'route' => 'admin.culinary.category',
                    'name' => 'category'
                ],
                [
                    'title' => 'Top đặc sản',
                    'route' => 'admin.culinary.specialties.index',
                    'name' => 'specialties'
                ],
                [
                    'title' => 'Ăn gì ở đây?',
                    'route' => 'admin.culinary.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Blog theo danh mục',
                    'route' => 'admin.culinary.explore_tourism.index',
                    'name' => 'explore_tourism'
                ],
                [
                    'title' => 'Đánh giá và review',
                    'route' => 'admin.culinary.articles.index',
                    'name' => 'articles'
                ]
            ]
        ],
        [
            'name' => 'booth',
            'title' => 'Gian hàng',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục',
                    'route' => 'admin.booth.category.index',
                    'name' => 'category'
                ],
                [
                    'title' => 'Top đặc sản',
                    'route' => 'admin.booth.specialties.index',
                    'name' => 'specialties',
                ],
                [
                    'title' => 'Ăn gì ở đây?',
                    'route' => 'admin.booth.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Đánh giá và review',
                    'route' => 'admin.booth.articles.index',
                    'name' => 'articles'
                ]
            ]
        ],
        [
            'name' => 'booking',
            'title' => 'Booking',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục Booking',
                    'route' => 'admin.booking.category.index',
                    'name' => 'category'
                ],
                [
                    'title' => 'Danh sách nhà nghỉ/khách sạn',
                    'route' => 'admin.booking.hotel.index',
                    'name' => 'hotel'
                ],
                [
                   'title' => 'Danh mục tiện nghi phòng',
                   'route' => 'admin.booking.convenient.index',
                    'name' => 'convenient'
                ],
                [
                    'title' => 'Danh sách phòng',
                    'route' => 'admin.booking.phong.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Đánh giá và review',
                    'route' => 'admin.booking.articles.index',
                    'name' => 'articles'
                ],
                [
                    'title' => 'Blog trải nghiệm',
                    'route' => 'admin.booking.blog.index',
                    'name' => 'blog'
                ]
            ]
        ],
        [
            'name' => 'book_room',
            'title' => 'Danh sách khách đặt phòng',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu'=> [
                [
                    'title' => 'Chưa liên hệ ',
                    'route' => 'admin.book_room.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Đã liên hệ ',
                    'route' => 'admin.book_room.contact',
                    'name' => 'contact'
                ],
            ]
        ],
        [
            'name' =>'explore_tourism',
            'title' => 'Khám phá',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục',
                    'route' => 'admin.explore_tourism.category.index',
                    'name' => 'category'
                ],
                [
                    'title' => 'Danh sách bài viết',
                    'route' => 'admin.explore_tourism.posts.index',
                    'name' => 'posts'
                ]
            ]
        ],
        [
            'name' => 'travel',
            'title' => 'Du lịch',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục',
                    'route' => 'admin.travel.category.index',
                    'name' => 'category'
                ],
                [
                    'title' => 'Đánh giá và review',
                    'route' => 'admin.travel.articles.index',
                    'name' => 'articles'
                ]
            ]
        ],
        [
            'name' => 'tour',
            'title' => 'Địa điểm du lịch',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh mục du lịch',
                    'route' => 'admin.tourist.category.index',
                    'name' => 'category'
                ]
                ,
                [
                    'title' => 'Đánh giá và review',
                    'route' => 'admin.tourist.articles.index',
                    'name' => 'articles'
                ]
            ]
        ],
        [
            'name' => 'contact',
            'title' => 'Liên hệ',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Danh sách',
                    'route' => 'admin.contact.index',
                    'name' => 'index'
                ]
            ]
        ],
        [
            'name' => 'introduce',
            'title' => 'Giới thiệu',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' =>[
                [
                    'title' => 'Banner tính năng',
                    'route' => 'admin.introduce.feature.index',
                    'name' => 'feature'
                ]
                ,[
                    'title' => 'Tính năng',
                    'route' => 'admin.introduce.contentFeature.index',
                    'name' => 'contentFeature'
                ]
                ,[
                    'title' => 'Siêu ứng dụng',
                    'route' => 'admin.introduce.superApp.index',
                    'name' => 'superApp'
                ]
                ,[
                    'title' => 'Banner mô tả ứng dụng',
                    'route' => 'admin.introduce.bannerDescription.index',
                    'name' => 'bannerDescription'
                ]
                ,[
                    'title' => 'Mô tả ứng dụng',
                    'route' => 'admin.introduce.appDescription.index',
                    'name' => 'appDescription'
                ]
                ,[
                    'title' => 'Cẩm nang du lịch',
                    'route' => 'admin.introduce.travelGuide.index',
                    'name' => 'travelGuide'
                ]
                ,[
                    'title' => 'Tìm kiếm dịch vụ theo vị trí',
                    'route' => 'admin.introduce.searchServices.index',
                    'name' => 'searchServices'
                ]
                ,[
                    'title' => 'Nội dung kinh doanh',
                    'route' => 'admin.introduce.businessContent.index',
                    'name' => 'businessContent'
                ]
                ,[
                    'title' => 'icon nội dung kinh doanh',
                    'route' => 'admin.introduce.businessIcon.index',
                    'name' => 'businessIcon'
                ]
                ,[
                    'title' => 'Công nghệ chuyển đổi số',
                    'route' => 'admin.introduce.technology.index',
                    'name' => 'technology'
                ]
                ,[
                    'title' => 'Hỗ trợ khách hàng',
                    'route' => 'admin.introduce.support.index',
                    'name' => 'support'
                ]
            ]
        ],
        [
            'name' => 'introduceVP',
            'title' => 'Giới thiệu về vĩnh phúc',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Giới thiệu',
                    'route' => 'admin.introduce_VP.introduce.index',
                    'name' => 'introduce'
                ],[
                    'title' => 'Vị trí địa lý',
                    'route' => 'admin.introduce_VP.geographical.index',
                    'name' => 'geographical'
                ],[
                    'title' => 'Truyền thống và con người   ',
                    'route' => 'admin.introduce_VP.tradition.index',
                    'name' => 'tradition'
                ]

            ]
        ]
    ],
    'partner' => [
        [
            'name' => 'book_room',
            'title' => 'Danh sách khách đặt phòng',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu'=> [
                [
                    'title' => 'Chưa liên hệ ',
                    'route' => 'partner.book_room.index',
                    'name' => 'index'
                ],
                [
                    'title' => 'Đã liên hệ ',
                    'route' => 'partner.book_room.contact',
                    'name' => 'contact'
                ],
            ]
        ]
    ]
];
