@props(['listing'])

<x-card class="p-10">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/logo.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="show.html">Senior Laravel Developer</a>
            </h3>
            <div class="text-xl font-bold mb-4">Acme Corp</div>

<x-lsting-tags :tagsCsv="$listing->tags" />
    
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> Boston,
                MA
            </div>
        </div>
    </div>
</x-card>