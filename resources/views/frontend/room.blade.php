@extends('frontend.layouts.master')

@section('content')
<section class="hero-banner" style="padding-top: 200px;">
    <div class="container">

        {{-- Category Tabs --}}
        <ul class="nav nav-pills justify-content-center mb-4 flex-wrap gap-2">
            <li class="nav-item">
                <a class="nav-link {{ request('type') == 'all' || !request('type') ? 'active' : '' }}" 
                   href="{{ route('rooms', ['type' => 'all']) }}">
                    All
                </a>
            </li>
            @foreach ($roomTypes as $type)
                <li class="nav-item ml-2">
                    <a class="nav-link {{ request('type') == $type->slug ? 'active' : '' }}" 
                       href="{{ route('rooms', ['type' => $type->slug]) }}">
                        {{ $type->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Room Cards --}}
        <div class="row g-4">
            @forelse ($rooms as $room)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="{{ $room->image ?? 'https://picsum.photos/600/400?random=' . $room->id }}" class="card-img-top" alt="Room">
                            <p class="badge bg-warning text-dark position-absolute top-0 end-0 m-2 fw-semibold" style="background: yellow !important;">
                               ৳ {{ number_format($room->roomType->base_price, 2) }} / Night
                            </p>
                        </div>
                        <div class="card-body">
                            <p class="badge bg-warning text-dark mb-2" style="background: yellow !important;">{{ $room->roomType->name ?? 'N/A' }}</p>
                            <h5 class="card-title fw-bold">
                                {{ \Illuminate\Support\Str::limit($room->name, 40) }}
                            </h5>
                            <p class="card-text text-muted small mb-3">
                                {{ \Illuminate\Support\Str::limit($room->description, 100) }}
                            </p>
                            <div class="d-flex flex-wrap gap-3 text-muted small">
                                <span><i class="fas fa-bed me-1 text-warning"></i>{{ $room->beds }} Beds</span>
                                <!-- <span><i class="bi bi-droplet-half me-1 text-warning"></i>{{ $room->baths }} Baths</span> -->
                                <span><i class="fas fa-child me-1 text-warning"></i>{{ $room->roomType->kids_capacity ?? 0 }} Guests</span>
                                <span><i class="fas fa-users me-1 text-warning"></i>{{ $room->roomType->adult_capacity ?? 0 }} Guests</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No rooms found in this category.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $rooms->appends(['type' => request('type')])->links() }}
        </div>
    </div>
</section>
@endsection
