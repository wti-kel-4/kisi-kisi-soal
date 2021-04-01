<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EEducation master is one of the best eEducational html template, it's suitable for all eEducation websites like university,college,school,online eEducation,tution center,distance eEducation,computer eEducation">
    <meta name="keyword" content="eEducation html template, university template, college template, school template, online eEducation template, tution center template">
    @include('general.style')
</head>

<body>
    @include('general.topbar')
    @yield('body')
    @include('general.script')
</body>
</html>