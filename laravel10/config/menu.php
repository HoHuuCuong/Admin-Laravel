<?php
return [
    [
        'label' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'fa-home'
    ],
    [
        'label' => 'Product Manager',
        'route' => 'product.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'All Product',
                'route' => 'product.index',
            ],
            [
                'label' => 'Add Product',
                'route' => 'product.create',
            ]
        ]
    ],
    [
        'label' => 'Category Manager',
        'route' => 'category.index',
        'icon' => 'fa-shopping-cart',
        'items' => [
            [
                'label' => 'All Category',
                'route' => 'category.index',
            ],
            [
                'label' => 'Add Category',
                'route' => 'category.create',
            ]
        ]
    ],
    [
        'label' => 'Blog Manager',
        'route' => 'blog.index',
        'icon' => 'fa-folder-open',
        'items' => [
            [
                'label' => 'All Blog',
                'route' => 'blog.index',
            ],
            [
                'label' => 'Add Blog',
                'route' => 'blog.create',
            ]
        ]
    ],
    [
        'label' => 'Banner Manager',
        'route' => 'banner.index',
        'icon' => 'fa-image',
        'items' => [
            [
                'label' => 'All Banner',
                'route' => 'banner.index',
            ],
            [
                'label' => 'Add Banner',
                'route' => 'banner.create',
            ]
        ]
    ],
    [
        'label' => 'Order Manager',
        'route' => 'orders.index',
        'icon' => 'fa-image',
        'items' => [
            [
                'label' => 'All Order',
                'route' => 'orders.index',
            ],
            [
                'label' => 'Statistic',
                'route' => 'orders.index',
            ]
        ]
    ],
    [
        'label' => 'Account Manager',
        'route' => 'account.index',
        'icon' => 'fa-user',
        'items' => [
            [
                'label' => 'All Account',
                'route' => 'account.index',
            ],
        ]
    ],

]
    ?>