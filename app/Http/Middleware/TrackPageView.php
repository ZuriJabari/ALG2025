<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track GET requests and exclude admin/API routes
        if ($request->isMethod('GET') && 
            !$request->is('admin/*') && 
            !$request->is('api/*') &&
            !$request->is('livewire/*')) {
            
            try {
                $userAgent = $request->userAgent() ?? '';
                
                PageView::create([
                    'url' => $request->fullUrl(),
                    'page_title' => null, // Can be set via JavaScript if needed
                    'referrer' => $request->header('referer'),
                    'user_agent' => $userAgent,
                    'ip_address' => $request->ip(),
                    'country' => null, // Can add GeoIP lookup if needed
                    'device_type' => $this->detectDeviceType($userAgent),
                    'viewed_at' => now(),
                ]);
            } catch (\Throwable $e) {
                // Silently fail - don't break the request if tracking fails
                \Log::warning('Page view tracking failed: ' . $e->getMessage());
            }
        }

        return $next($request);
    }

    private function detectDeviceType(string $userAgent): string
    {
        $userAgent = strtolower($userAgent);
        
        if (preg_match('/mobile|android|iphone|ipod|blackberry|iemobile|opera mini/i', $userAgent)) {
            return 'mobile';
        }
        
        if (preg_match('/tablet|ipad|playbook|silk/i', $userAgent)) {
            return 'tablet';
        }
        
        return 'desktop';
    }
}
