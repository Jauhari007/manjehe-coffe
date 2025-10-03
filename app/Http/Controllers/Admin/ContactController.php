<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index(Request $request)
    {
        $query = Contact::query()->orderBy('created_at', 'desc');
        
        // Filter berdasarkan status
        if ($request->has('status')) {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }
        
        $messages = $query->paginate(15);
        $unreadCount = Contact::unread()->count();
        $totalCount = Contact::count();
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.contacts.partials.messages-list', compact('messages'))->render(),
                'unreadCount' => $unreadCount
            ]);
        }
        
        return view('admin.contacts.index', compact('messages', 'unreadCount', 'totalCount'));
    }

    /**
     * Display the specified contact message.
     */
    public function show(Contact $contact)
    {
        // Mark as read if not already read
        if (!$contact->is_read) {
            $contact->markAsRead();
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Mark message as read/unread
     */
    public function updateStatus(Contact $contact): JsonResponse
    {
        $contact->update(['is_read' => !$contact->is_read]);
        
        return response()->json([
            'success' => true,
            'status' => $contact->is_read ? 'read' : 'unread',
            'message' => $contact->is_read ? 'Pesan ditandai sebagai dibaca' : 'Pesan ditandai sebagai belum dibaca'
        ]);
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dihapus'
        ]);
    }

    /**
     * Mark multiple messages as read
     */
    public function markAllAsRead(): JsonResponse
    {
        $updated = Contact::unread()->update(['is_read' => true]);
        
        return response()->json([
            'success' => true,
            'message' => "{$updated} pesan ditandai sebagai dibaca"
        ]);
    }

    /**
     * Get unread messages count for real-time updates
     */
    public function getUnreadCount(): JsonResponse
    {
        $count = Contact::unread()->count();
        
        return response()->json([
            'count' => $count
        ]);
    }
}