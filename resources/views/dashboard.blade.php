@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3> 
                    <p>Produits</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>75</h3> 
                    <p>Reviews</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment-alt"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>10</h3> 
                    <p>Catégories</p>
                </div>
                <div class="icon">
                    <i class="fas fa-th"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>250</h3> 
                    <p>Commandes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>50</h3>
                    <p>Alimentation</p>
                </div>
                <div class="icon">
                    <i class="fas fa-battery-full"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>40</h3> 
                    <p>Informatique</p>
                </div>
                <div class="icon">
                    <i class="fas fa-laptop"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>30</h3> 
                    <p>Câbles & Cordons</p>
                </div>
                <div class="icon">
                    <i class="fas fa-plug"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>60</h3> 
                    <p>Centre De Téléchargement</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cloud-download-alt"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
