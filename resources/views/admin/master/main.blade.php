<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | SIM Kisi - Kisi dan Kartu Soal</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword" content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    <link rel="icon" href="{{ asset('assets/img/logo.jpg') }}" type="image/jpg" sizes="16x16">
    @include('admin.master.style')
    @yield('style')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.master.navbar')
            @include('admin.master.sidebar')
            @yield('body')
            @include('admin.master.footer')
        </div>
    </div>
    @include('admin.master.script')
    @yield('script')
</body>
</html>