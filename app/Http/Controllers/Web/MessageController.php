<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Message\MessageRepositoryInterface;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        MessageRepositoryInterface $messageRepository
    ) {
        $this->messageRepository = $messageRepository;
    }

    public function show()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $input = $request->only($this->messageRepository->getBlankModel()->getFillable());

        $today = Carbon::today('Asia/Tokyo');
        $today->timezone('UTC');

        $tomorrow = Carbon::tomorrow('Asia/Tokyo');
        $tomorrow->timezone('UTC');

        $is = Message::where('user_id', \Auth::user()->id)
        ->whereBetween('created_at', [$today->toDateTimeString(), $tomorrow->toDateTimeString()])
        ->exists();

        if (!isset($input['uuid'])) {
            \Arr::set($input, 'uuid', \Illuminate\Support\Str::uuid());
        }

        $message = $this->messageRepository->create($input);

        return redirect('/dashboard')->with([
            'toast' => [
                'status'  => 'success',
                'message' => '投稿しました',
            ],
        ]);
    }
}
