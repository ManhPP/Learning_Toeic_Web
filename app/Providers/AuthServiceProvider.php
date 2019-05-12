<?php

namespace App\Providers;

use App\Account;
use App\Comment;
use App\Discussion;
use App\ListeningPart;
use App\Part5;
use App\Part6Paragraph;
use App\Part7Paragraph;
use App\Policies\AccountPolicy;
use App\Policies\CommentPolicy;
use App\Policies\DiscussionPolicy;
use App\Policies\ListeningPartPolicy;
use App\Policies\Part5Policy;
use App\Policies\Part6ParagraphPolicy;
use App\Policies\Part7ParagraphPolicy;
use App\Policies\ReadingPartPolicy;
use App\Policies\ReplyCommentPolicy;
use App\Policies\ReportPolicy;
use App\Policies\TestPolicy;
use App\ReadingPart;
use App\ReplyComment;
use App\Report;
use App\Test;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Account::class => AccountPolicy::class,
        Comment::class => CommentPolicy::class,
        Discussion::class=> DiscussionPolicy::class,
        ListeningPart::class => ListeningPartPolicy::class,
        Part5::class => Part5Policy::class,
        Part6Paragraph::class => Part6ParagraphPolicy::class,
        Part7Paragraph::class => Part7ParagraphPolicy::class,
        ReadingPart::class => ReadingPartPolicy::class,
        ReplyComment::class => ReplyCommentPolicy::class,
        Report::class => ReportPolicy::class,
        Test::class => TestPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
