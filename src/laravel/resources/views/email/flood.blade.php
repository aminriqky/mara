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
        <h3 class="">Halo {{$name}} ! Wilayah {{$nama_lokasi}} Sedang banjir !</h3>
        <hr class="garis">
        <p>{{$nama_lokasi}} telah di genangi air dengan ketinggian {{$ketinggian}} cm. Air tersebut telah menggenangi wilayah {{$nama_lokasi}} selama lebih kurang {{$durasi}} detik</p>
        <p>Deskripsi Tempat: <br> {{$deskripsi}}</p>
        <h4>Harap persiapkan diri anda untuk melakukan tindak pengungsian</h4>
    </div>
</body>
</html>