@extends('frontend.layouts.master')
<style>
  body { background:#f8f9fa; }
  .filter-sidebar {
    background: #fff;
    padding: 1rem;
    border-radius: .5rem;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
  }
  .package-card {
    background:#fff;
    border-radius:.75rem;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
    padding:1rem;
    display:flex;
    gap:1rem;
    align-items:center;
  }
  .package-img {
    width:120px;
    height:100px;
    object-fit:cover;
    border-radius:.5rem;
    flex-shrink:0;
  }
  @media (max-width: 767.98px){
    .package-card{ flex-direction:column; align-items:flex-start; }
    .package-img{ width:100%; height:180px; }
  }
</style>

@section('content')
<section class="hero-banner" style="padding-top: 200px;">
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar Filters -->
      <aside class="col-md-3 mb-4">
        <div class="filter-sidebar">
          <h5 class="mb-3">Filters</h5>

          <form method="GET" action="{{ url()->current() }}">
            <!-- Category -->
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select name="category" class="form-select">
                <option value="all" {{ request('category', 'all') == 'all' ? 'selected' : '' }}>All Categories</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Price Range -->
            <div class="mb-3">
              <label class="form-label">Price Range</label>
              <select id="price_range" class="form-select" onchange="updatePriceInputs()">
                <option value="all" {{ ( !request('price_min') && !request('price_max') ) ? 'selected' : '' }}>All Prices</option>
                <option value="0-1000" {{ (request('price_min') == 0 && request('price_max') == 1000) ? 'selected' : '' }}>৳0 - ৳1000</option>
                <option value="1001-5000" {{ (request('price_min') == 1001 && request('price_max') == 5000) ? 'selected' : '' }}>৳1001 - ৳5000</option>
                <option value="5001-10000" {{ (request('price_min') == 5001 && request('price_max') == 10000) ? 'selected' : '' }}>৳5001 - ৳10000</option>
                <option value="10001-20000" {{ (request('price_min') == 10001 && request('price_max') == 20000) ? 'selected' : '' }}>৳10001 - ৳20000</option>
                <option value="20001-25000" {{ (request('price_min') == 20001 && request('price_max') == 25000) ? 'selected' : '' }}>৳20001 - ৳25000</option>
              </select>

              <!-- Hidden inputs for min and max price to submit -->
              <input type="hidden" id="price_min" name="price_min" value="{{ request('price_min') }}">
              <input type="hidden" id="price_max" name="price_max" value="{{ request('price_max') }}">
            </div>

            <!-- Number of Persons -->
            <div class="mb-3">
              <label class="form-label">No. of Person</label>
              <select name="persons" class="form-select">
                <option value="" {{ !request('persons') ? 'selected' : '' }}>Any</option>
                <option value="1" {{ request('persons') == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ request('persons') == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ request('persons') == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ request('persons') == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ request('persons') == 5 ? 'selected' : '' }}>5</option>
              </select>
            </div>

            <!-- Days -->
            <div class="mb-3">
              <label class="form-label">Days</label>
              <select name="days" class="form-select">
                <option value="" {{ !request('days') ? 'selected' : '' }}>Any</option>
                <option value="1" {{ request('days') == 1 ? 'selected' : '' }}>1-3</option>
                <option value="4" {{ request('days') == 4 ? 'selected' : '' }}>4-7</option>
                <option value="8" {{ request('days') == 8 ? 'selected' : '' }}>8+</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
          </form>
        </div>
      </aside>

      <!-- Packages List -->
      <section class="col-md-9">
        <div class="row g-3">
          @forelse($packages as $package)
          <div class="col-12">
            <div class="package-card">
              <img src="{{ $package->image ?? 'https://picsum.photos/200/150?random='.$package->id }}" class="package-img" alt="{{ $package->name }}">
              <div>
                <h5 class="mb-2">{{ $package->name }}</h5>
                <p class="mb-1"><i class="bi bi-currency-dollar text-warning"></i>
                  <strong>Package Price:</strong> ৳{{ number_format($package->price, 2) }} 
                  @if($package->price_type) ({{ strtoupper($package->price_type) }}) @endif
                </p>
                <p class="mb-1"><i class="bi bi-calendar-event text-warning"></i>
                  <strong>Number of Days:</strong> {{ $package->no_of_day }}</p>
                <p class="mb-2"><i class="bi bi-people text-warning"></i>
                  <strong>Maximum Persons:</strong> {{ $package->no_of_person }}</p>
                <!-- <a href="#" class="btn btn-primary btn-sm">Book Now</a> -->
              </div>
            </div>
          </div>
          @empty
          <div class="col-12">
            <p>No packages found matching your criteria.</p>
          </div>
          @endforelse

          <!-- Pagination -->
          <div class="col-12 mt-3">
            {{ $packages->links() }}
          </div>
        </div>
      </section>
    </div>
  </div>
</section>

<script>
  function updatePriceInputs() {
    const select = document.getElementById('price_range');
    const val = select.value;
    const [min, max] = val === 'all' ? ['', ''] : val.split('-');

    document.getElementById('price_min').value = min;
    document.getElementById('price_max').value = max;
  }

  // On page load, sync hidden price inputs with selected price range
  window.onload = function() {
    updatePriceInputs();
  }
</script>
@endsection
