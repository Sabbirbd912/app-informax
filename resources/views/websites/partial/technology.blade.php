{{-- <h3 class="text-3xl font-bold mb-8">
    Our Technology Stack
</h3>
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4" role="list" aria-label="Technology Stack">
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-orange-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🌐
        </div>
        <p class="font-semibold text-lg text-gray-800">
            HTML5
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-blue-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🖌️
        </div>
        <p class="font-semibold text-lg text-gray-800">
            CSS3
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-teal-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            💨
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Tailwind
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-purple-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🅱️
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Bootstrap
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-yellow-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            ⚡
        </div>
        <p class="font-semibold text-lg text-gray-800">
            JavaScript
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-red-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🐘
        </div>
        <p class="font-semibold text-lg text-gray-800">
            PHP Laravel
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-cyan-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            ⚛️
        </div>
        <p class="font-semibold text-lg text-gray-800">
            React
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-green-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🚀
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Next.js
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-lime-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🟢
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Node.js
        </p>
    </div>

    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-emerald-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            ☕
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Java
        </p>
    </div>
    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-purple-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🌱
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Spring Boot
        </p>
    </div>

    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-emerald-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🍃
        </div>
        <p class="font-semibold text-lg text-gray-800">
            MongoDB
        </p>
    </div>

    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-indigo-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            📦
        </div>
        <p class="font-semibold text-lg text-gray-800">
            PostgreSQL
        </p>
    </div>

    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-blue-300 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🗄️
        </div>
        <p class="font-semibold text-lg text-gray-800">
            MySQL
        </p>
    </div>

    <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2 border-indigo-200 text-center" role="listitem">
        <div class="text-3xl mb-2" aria-hidden="true">
            🛢️
        </div>
        <p class="font-semibold text-lg text-gray-800">
            Oracle
        </p>
    </div>
</div> --}}



@if($techSection)
    <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">
        {{ $techSection->title }}
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach($techSection->items->where('is_active', true)->sortBy('order') as $item)
            <div class="tech-badge p-6 rounded-xl bg-white shadow-md border-2
                        {{ $item->border_color ?? 'border-gray-200' }} text-center">

                <div class="flex justify-center mb-3">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="h-12 w-12 object-contain">
                    @else
                        <span class="text-3xl">{{ $item->emoji }}</span>
                    @endif
                </div>

                <p class="font-semibold text-lg text-gray-800">
                    {{ $item->name }}
                </p>
            </div>
        @endforeach
    </div>
@endif
