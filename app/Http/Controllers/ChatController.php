<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chat/Container', ['auth' => Auth::user()]);
    }

    /**
     * @param Request $request
     * @param ChatRoom $chatRoom
     * @return Collection
     */
    public function messages(Request $request, ChatRoom $chatRoom): Collection
    {
        return ChatMessage::query()
            ->where('chat_room_id', $chatRoom->getAttribute('id'))
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function rooms(): Collection
    {
        return ChatRoom::all();
    }

    public function newMessage(Request $request, ChatRoom $chatRoom): ChatMessage
    {
        $chatMessage = ChatMessage::query()->create([
            'user_id' => Auth::id(),
            'chat_room_id' => $chatRoom->getAttribute('id'),
            'message' => $request->input('message')
        ]);
        broadcast(new MessageEvent($chatMessage))->toOthers();
        return $chatMessage;
    }
}
