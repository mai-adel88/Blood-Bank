<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
    integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <!-- custom CSS -->
   <link rel="stylesheet" href="{{asset('blood-bank/css/owl.carousel.min.css')}}">
   <link rel=stylesheet href="{{asset('blood-bank/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="{{asset('blood-bank/css/hover-min.css')}}">
       <link rel="stylesheet" href="{{asset('blood-bank/css/style.css')}}">
     <!-- custom font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    @if(app()->getLocale() == 'en')
    <link rel="stylesheet" href="{{asset('css/ltr-app.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('css/rtl-app.css')}}">
    @endif

    <title>بنك الدم الرئيسية </title>
  </head>
  <body>
    <div class="title">
