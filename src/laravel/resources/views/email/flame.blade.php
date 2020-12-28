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
        @if($suhu >= 35 && $suhu < 100)
            <h3 class="">Halo {{$name}} ! Wilayah {{$nama_lokasi}} berpotensi terjadi kebakaran !</h3>
            <hr class="garis">
            <p>suhu di {{$nama_lokasi}} telah mencapai angka {{$suhu}} Derajat Celcius. Kemungkinan sedang di landa kebakaran</p>
            <p>Deskripsi Tempat: <br> {{$deskripsi}}</p>
            <h4>Harap persiapkan diri anda untuk melakukan tindak pengungsian</h4>
        @else
            <h3 class="">Halo {{$name}} ! Wilayah {{$nama_lokasi}} Sedang kebakaran !</h3>
            <hr class="garis">
            <p>suhu di {{$nama_lokasi}} telah mencapai angka {{$suhu}} Derajat Celcius. Yang menandakan kebakaran sudah cukup besar</p>
            <p>Deskripsi Tempat: <br> {{$deskripsi}}</p>
            <h4>Harap segera mengungsikan diri anda dan keluarga anda ke tempat yang aman</h4>
        @endif
    </div>
</body>
</html>