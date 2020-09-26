<?php
namespace App\Repositories\Message;

use App\Models\Message;
use App\Repositories\Base\BaseRepository;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    public function getBlankModel()
    {
        return new Message();
    }
}
