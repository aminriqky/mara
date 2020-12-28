<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemberitahuan Mara</title>
    <style>
        body {
            background-color:#bdc3c7;
            margin:0;
        }
        .card {
            background-color:#fff;
            padding:20px;
            margin:20%;
            text-align:center;
            margin:0px auto;
            width: 580px; 
            max-width: 580px;
            margin-top:10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        img {
            width: 50px;
            height: 50px;
        }

        .garis {
            width: 75%;
        }
        
    </style>
</head>
<body>
    <div class="card">
        @if($horizontal < 300 || $vertikal < 300)
            <h3 class="">Halo {{$name}} ! Wilayah {{$nama_lokasi}} Berpotensi tanah longsor !</h3>
            <hr class="garis">
            <p>Telah terjadi pergeseran tanah sebesar {{$horizontal}} cm secara horizontal, dan sebesar {{$vertikal}} cm secara vertikal, di lokasi {{$nama_lokasi}}. Pergeseran tanah ini berpotensi sebagai tanah longsor.</p>
            <p>Deskripsi Tempat: <br> {{$deskripsi}}</p>
            <h4>Harap berhati hati pada saat melewati daerah tersebut</h4>
        @else
            <h3 class="">Halo {{$name}} ! Wilayah {{$nama_lokasi}} Mengalami tanah longsor !</h3>
            <hr class="garis">
            <p>Telah terjadi pergeseran tanah sebesar {{$horizontal}} cm secara horizontal, dan sebesar {{$vertikal}} cm secara vertikal, di lokasi {{$nama_lokasi}}. Pergeseran tanah ini merupakan tanah longsor.</p>
            <p>Deskripsi Tempat: <br> {{$deskripsi}}</p>
            <h4>Harap untuk tidak melewati daerah tersebut karena masih dalam kategori berbahaya</h4>
        @endif
    </div>
</body>
</html>