<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolioData['user']->name ?? 'My Portfolio' }} - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- DEBUG: Tampilkan info data -->
    <style>
        .debug-info {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            z-index: 1000;
            max-width: 300px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- DEBUG INFO -->
    <div class="debug-info">
        <strong>DEBUG INFO:</strong><br>
        User: {{ $portfolioData['user']->name ?? 'NO USER' }}<br>
        Bio Length: {{ strlen($portfolioData['user']->bio ?? '') }} chars<br>
        Title: {{ $portfolioData['user']->professional_title ?? 'NO TITLE' }}<br>
        Updated: {{ $portfolioData['user']->updated_at ?? 'UNKNOWN' }}<br>
        <small>Cache: {{ Cache::has('public_portfolio_data') ? 'HIT' : 'MISS' }}</small>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <!-- ... navigation code ... -->
    </nav>

    <!-- Hero Section -->
    <section id="about" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            @if($portfolioData['user']->photo)
                <img src="{{ asset('storage/' . $portfolioData['user']->photo) }}" 
                     alt="{{ $portfolioData['user']->name }}" 
                     class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-indigo-100">
            @else
                <div class="w-32 h-32 rounded-full mx-auto mb-6 bg-gray-200 flex items-center justify-center border-4 border-indigo-100">
                    <i class="fas fa-user text-gray-400 text-4xl"></i>
                </div>
            @endif
            
            <h1 class="text-4xl font-bold text-gray-900">{{ $portfolioData['user']->name ?? 'Your Name' }}</h1>
            <p class="text-xl text-gray-600 mt-4">{{ $portfolioData['user']->professional_title ?? 'Professional Title' }}</p>
            <p class="text-gray-500 mt-6 max-w-2xl mx-auto leading-relaxed text-lg">
                {{ $portfolioData['user']->bio ?? 'Portfolio description...' }}
            </p>
            
            <!-- DEBUG: Tampilkan data contact -->
            <div class="mt-8 flex justify-center space-x-6 text-sm text-gray-500">
                @if($portfolioData['user']->email)
                    <span><i class="fas fa-envelope mr-1"></i> {{ $portfolioData['user']->email }}</span>
                @endif
                @if($portfolioData['user']->location)
                    <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $portfolioData['user']->location }}</span>
                @endif
                @if($portfolioData['user']->phone)
                    <span><i class="fas fa-phone mr-1"></i> {{ $portfolioData['user']->phone }}</span>
                @endif
            </div>
        </div>
    </section>

    <!-- ... rest of the sections ... -->
</body>
</html>