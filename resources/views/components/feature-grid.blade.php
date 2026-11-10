@props(['features'])

{{-- Cards with a gradient icon, title and description: [['icon' => 'fa-solid fa-x', 'title' => ..., 'description' => ...]] --}}
<div {{ $attributes->class('container-page grid gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8') }}>
    @foreach ($features as $feature)
        <div x-glow x-reveal="{{ 0.1 * ($loop->index % 3 + 1) }}" class="group rounded-[1.25rem] border border-feature-border bg-feature p-7 backdrop-blur-md sm:p-8 xl:p-10">
            <div x-gradient-icon class="mb-6 grid size-16 place-items-center rounded-full text-white shadow-soft transition-transform duration-500 group-hover:scale-110 group-hover:rotate-[10deg] sm:size-[70px]">
                <i class="{{ $feature['icon'] }} fa-2x" aria-hidden="true"></i>
            </div>
            <h3 class="mb-3 text-xl font-bold text-fg sm:text-2xl">{{ $feature['title'] }}</h3>
            <p class="leading-relaxed text-muted">{{ $feature['description'] }}</p>
        </div>
    @endforeach
</div>
