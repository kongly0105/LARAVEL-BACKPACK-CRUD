<main>
    <title>Category</title>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="favicon/favicon.ico">
        <link rel="icon" type="image/gif" href="favicon/animated_favicon1.gif">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    </head>
    <body>
        {{-- navbar --}}
        <div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-pie-chart"></i>&nbsp;&nbsp;Admin</a></li>
                        @foreach($categories as $category)
                            <li><a href="{{ backpack_url('categoryItem/'.$category->id) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>
                        <li><a href="/user/create"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Sign Up</a></li>
                        <li><a href="/login"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Sign In</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        {{-- end --}}

        <div class="container" style="margin-top: 40px;">
            <div class="row">
                <div class="container">
                    <img src="/image/advertise.jpg" alt="Sandwich" width="100%" height="280px" style="border-radius: 5px">
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="container">
                    @foreach ($cateId as $cateId)
                        <div class="col-lg-4">
                            <div class="card shadow-lg border-0 rounded-lg mt-1">
                                <div class="card-body">
                                    <div class="post">
                                        <div class="post_pic">
                                            {{-- <li><a href="{{ URL('categoryItem/'.$cateId->id.'') }}" method="GET"><img src="{{ asset('storage/' . $cateId->image) }}" alt="" style="height: 100%; width: 100%; border-radius: 5px"></a></li> --}}
                                            <img src="{{ asset('storage/' . $cateId->posts_image) }}" alt="" style="height: 100%; width: 100%; border-radius: 5px" />
                                        </div>
                                        <div class="style">
                                            <h4><b>{{$cateId->title}}</b></h4>
                                            <p>{{$cateId->content}}</p>
                                            <p style="text-decoration: none; margin-top:10px"><i class="fa fa-calendar"></i> 28-12-2021 <i class="fas fa-clock"></i> 2 Hours</p>
                                            <p class="btn btn-warning">{{($cateId->categories)->title}}</p>
                                            @foreach ($cateId->tags as $tag)
                                                <p class="btn btn-info">{{$tag->title}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</main>

