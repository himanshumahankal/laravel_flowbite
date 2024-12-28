<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};

new
#[Layout('layouts.app')]
#[Title('Welcome')]
class extends Component {
    //
}; ?>

@assets
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    color: #333;
  }

  .navigation {
    display: flex;
    justify-content: flex-end;
    gap: 20px;
    padding: 15px 20px;
    height: 74px;
    /* background-color: #007bff; */
    /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
  }

  .navigation a {
    text-decoration: none;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .navigation a:hover {
    background-color: #0056b3;
    color: #fff;
    font-weight: bold;
  }

  .container {
    margin: 0;
    height: calc(100vh - 74px); /* Adjust height to exclude navigation bar */

    /* display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; */

    display: grid;
    place-items: center;
    align-content: center;

    text-align: center;
    font-size: 26px;
    font-weight: bold;
  }

  .container h1 {
    font-size: 34px;
    margin: 0 0 10px;
  }

  .container p {
    font-size: 15px;
    color: #888;
  }
</style>
@endassets

<div>
  <!-- Navigation Links -->
  @if (Route::has('login'))
    <div class="navigation">
      @auth
      <a href="{{ url('/dashboard') }}">
        Dashboard
      </a>
      @else
      <a href="{{ route('login') }}">
        Log in
      </a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}">
          Register
        </a>
        @endif
      @endauth
    </div>
  @endif

  <!-- Main Content -->
  <div class="container">
    <h1>Welcome to {{ config('app.name')}}</h1>
    <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
  </div>
</div>
