<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - ALG 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-white min-h-screen flex items-center justify-center px-4">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-500/10 mb-6">
                <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Something went wrong</h1>
            <p class="text-xl text-gray-400 mb-8">We're experiencing technical difficulties. Our team has been notified and is working to fix the issue.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="inline-flex items-center justify-center h-12 px-6 rounded-full bg-gradient-to-r from-teal-500 to-teal-600 text-white font-semibold transition-all hover:shadow-lg hover:-translate-y-0.5">
                Go to Homepage
            </a>
            <button onclick="window.location.reload()" class="inline-flex items-center justify-center h-12 px-6 rounded-full border border-gray-700 text-gray-300 hover:bg-slate-900 transition-all">
                Try Again
            </button>
        </div>

        <p class="mt-12 text-sm text-gray-500">
            If this problem persists, please contact us at 
            <a href="mailto:alg@leoafricainstitute.org" class="text-teal-400 hover:underline">alg@leoafricainstitute.org</a>
        </p>
    </div>
</body>
</html>
