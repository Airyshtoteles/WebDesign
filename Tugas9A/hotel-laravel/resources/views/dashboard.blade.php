@extends('layouts.app')

@section('title', 'Dashboard - Data Kamar')

@push('styles')
<style>
    h2 { text-align: center; color: darkorange; margin-top: 0; margin-bottom: 20px; }
    .container {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
      padding: 0;
    }
    .card {
      width: 250px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      overflow: hidden;
      background-color: white;
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
    .card h3 {
      margin: 10px;
      color: orange;
    }
    .card p {
      margin: 0 10px 10px;
      color: #444;
      font-size: 14px;
    }
    .price {
      color: darkgreen;
      font-weight: bold;
      margin: 0 10px 10px;
    }
</style>
@endpush

@section('content')
  <h2>Kamar & Suite</h2>
  <div class="container">

    <div class="card">
      <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="Deluxe Room">
      <h3>Deluxe Room</h3>
      <p>Wi-Fi | AC | Sarapan</p>
      <p class="price">Rp 1.000.000 / malam</p>
    </div>

    <div class="card">
      <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80" alt="Executive Suite">
      <h3>Executive Suite</h3>
      <p>Wi-Fi | AC | Sarapan | Bathtub</p>
      <p class="price">Rp 1.500.000 / malam</p>
    </div>

    <div class="card">
      <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&q=80" alt="Family Suite">
      <h3>Family Suite</h3>
      <p>Wi-Fi | AC | 2 Kamar Tidur | Sarapan</p>
      <p class="price">Rp 1.800.000 / malam</p>
    </div>

  </div>
@endsection
