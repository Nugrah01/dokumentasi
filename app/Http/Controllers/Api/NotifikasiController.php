<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Get all notifications for current user
     */
    public function index()
    {
        $user = Auth::user();

        $notifications = Notifikasi::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(20)
            ->get();

        return ApiResponse::success($notifications);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        $notification = Notifikasi::findOrFail($id);

        if ($notification->user_id !== Auth::id()) {
            return ApiResponse::error('Unauthorized', 403);
        }

        $notification->update(['is_read' => true]);

        return ApiResponse::success(null, 'Marked as read');
    }

    /**
     * Delete notification
     */
    public function destroy($id)
    {
        $notification = Notifikasi::findOrFail($id);

        if ($notification->user_id !== Auth::id()) {
            return ApiResponse::error('Unauthorized', 403);
        }

        $notification->delete();

        return ApiResponse::success(null, 'Deleted');
    }

    /**
     * Mark all as read
     */
    public function markAllAsRead()
    {
        Notifikasi::where('user_id', Auth::id())
            ->update(['is_read' => true]);

        return ApiResponse::success(null, 'All marked as read');
    }

    /**
     * Get unread count
     */
    public function unreadCount()
    {
        $count = Notifikasi::where('user_id', Auth::id())
            ->where('is_read', false)
            ->count();

        return ApiResponse::success(['count' => $count]);
    }

    /**
     * Create notification (helper method, use this from other controllers)
     */
    public static function create($userId, $judul, $message, $type = 'info')
    {
        return Notifikasi::create([
            'user_id' => $userId,
            'judul' => $judul,
            'message' => $message,
            'type' => $type,
        ]);
    }
}