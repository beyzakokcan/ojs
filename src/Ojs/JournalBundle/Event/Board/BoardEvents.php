<?php

namespace Ojs\JournalBundle\Event\Board;

final class BoardEvents
{
    const LISTED = 'ojs.board.list';

    const PRE_CREATE = 'ojs.board.pre_create';

    const POST_CREATE = 'ojs.board.post_create';

    const PRE_UPDATE = 'ojs.board.pre_update';

    const POST_UPDATE = 'ojs.board.post_update';

    const PRE_DELETE = 'ojs.board.pre_delete';

    const POST_DELETE = 'ojs.board.post_delete';
}
