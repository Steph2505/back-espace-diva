@extends('layouts/app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Articles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    {{-- <li class="breadcrumb-item active"></li> --}}
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="" class="btn bg-success g-2"> <i class="fas fa-plus"></i>Nouveau</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h1 class="fs-3 text-align-center">Liste des articles</h1>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection