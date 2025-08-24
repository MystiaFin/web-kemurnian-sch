<div class="hero-slider">
    @if (count($data) > 0)
        <ul class="slider-list">
            @foreach ($data as $banner)
                <li class="slider-item">
                    <img src="{{ $banner['image_urls'] }}" alt="Hero Banner" loading="lazy">
                </li>
            @endforeach
        </ul>
    @endif
</div>

<div id="api-content">Loading data...</div>

<script>
    fetch('/api/hero-banners')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const apiContentDiv = document.getElementById('api-content');

            if (data && data.length > 0) {
                const listItems = data.map(banner =>
                    `<li>${banner.image_urls}</li>`
                ).join('');

                apiContentDiv.innerHTML = `<ul>${listItems}</ul>`;
            }
        })
        .catch(error => {
            console.error('Error fetching hero banners:', error);
            const apiContentDiv = document.getElementById('api-content');
            apiContentDiv.innerHTML = '<p>Error loading hero banners</p>';
        });
</script>
