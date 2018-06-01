@extends('layouts.manage')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-t-30">
            <div class="panel panel-default">
                <div class="panel-heading lead">Dashboard</div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="column">
                                <a href="{{route('books.create')}}" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Create New Book</a>
                            </div>
                            <div class="column">
                                <a href="{{route('categories.index')}}" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Create New Category</a>
                            </div>
                            <div class="column">
                                <a href="{{route('categories.index')}}" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Create New Category</a>
                            </div>
                            <div class="column">
                                <form action="decode" method="post" enctype="multipart/form-data">
                                    <input type="file" name="qrimage" accept="image/*" id="qrimage" class="form-control"><br>
                                    <input type= "submit" class="btn btn-success btn-block"><i class="fa fa-user-plus m-r-10"></i> Scan QR Code</a>
                                </form>
                                <div class="links">
                                    <video id="preview"></video>
                                    Hello World

                                    <script type="text/javascript">
                                        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                                        scanner.addListener('scan', function (content) {
                                            console.log(content);
                                        });
                                        Instascan.Camera.getCameras().then(function (cameras) {
                                            if (cameras.length > 0) {
                                                scanner.start(cameras[0]);
                                            } else {
                                                console.error('No cameras found.');
                                            }
                                        }).catch(function (e) {
                                            console.error(e);
                                        });
                                    </script>

                                </div>
                            </div>
                                            
                            <!--<div class="col-sm-6">
                                {!! Html::linkRoute('categories.index', 'Categories', array('class' => 'btn btn-primary btn-block')) !!}
                            </div>-->
                            <!--$QRCodeReader = new Libern\QRCodeReader\QRCodeReader();
                            $qrcode_text = $QRCodeReader->decode(base64_encode("image_stream"));
                            echo $qrcode_text;-->
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection