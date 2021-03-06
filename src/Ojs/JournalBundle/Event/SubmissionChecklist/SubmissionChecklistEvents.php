<?php

namespace Ojs\JournalBundle\Event\SubmissionChecklist;

final class SubmissionChecklistEvents
{
    const LISTED = 'ojs.submission_checklist.list';

    const PRE_CREATE = 'ojs.submission_checklist.pre_create';

    const POST_CREATE = 'ojs.submission_checklist.post_create';

    const PRE_UPDATE = 'ojs.submission_checklist.pre_update';

    const POST_UPDATE = 'ojs.submission_checklist.post_update';

    const PRE_DELETE = 'ojs.submission_checklist.pre_delete';

    const POST_DELETE = 'ojs.submission_checklist.post_delete';
}
