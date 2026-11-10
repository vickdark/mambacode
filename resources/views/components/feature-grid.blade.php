@props(['features'])

{{-- Cards with an icon, title and description: [['icon' => 'fa-solid fa-x', 'title' => ..., 'description' => ...]] --}}
<div {{ $attributes->class('container-page grid gap-4 sm:grid-cols-2 lg:grid-cols-3') }}>
    @foreach ($features as $feature)
        <div x-reveal="{{ 0.08 * ($loop->index % 3 + 1) }}" class="rounded-2xl border border-card-border bg-card p-7 transition hover:border-highlight sm:p-8">
            <span class="grid size-11 place-items-center rounded-xl border border-highlight bg-bg text-primary">
                <i class="{{ $feature['icon'] }}" aria-hidden="true"></i>
            </span>
            <h3 class="mt-5 mb-2 text-xl font-semibold text-fg">{{ $feature['title'] }}</h3>
            <p class="leading-relaxed text-muted">{{ $feature['description'] }}</p>
        </div>
    @endforeach
</div>
