@props(['active' => false])
<a {{ $attributes }} class="flex items-center {{ $active ? 'active-nav-link':' ' }} text-black py-4 pl-6 nav-item">
            
    {{ $slot }}
</a>