<?php

declare(strict_types=1);

namespace spec\App\Domain\Connoisseur\Event;

use App\Domain\Connoisseur\Model\Email;
use App\Domain\Connoisseur\Model\Id;
use App\Domain\Connoisseur\Model\Name;
use App\Domain\Connoisseur\Model\Password;
use PhpSpec\ObjectBehavior;
use Prooph\Common\Messaging\DomainEvent;

final class ConnoisseurRegisteredSpec extends ObjectBehavior
{
    function it_represents_connoisseur_registerded_event_occurrence(): void
    {
        $this->beConstructedThrough('withData', [
            new Id('e8a68535-3e17-468f-acc3-8a3e0fa04a59'),
            new Name('Krzysztof Krawczyk'),
            new Email('krawczyk@biale.pl'),
            new Password('$2a$04$N2x1MTIgy8fth66TdWZ1NeHIjJIrK7Ns09I9xk1PDRn8IqkQSckua'),
        ]);

        $this->id()->shouldBeLike(new Id('e8a68535-3e17-468f-acc3-8a3e0fa04a59'));
        $this->name()->shouldBeLike(new Name('Krzysztof Krawczyk'));
        $this->email()->shouldBeLike(new Email('krawczyk@biale.pl'));
        $this->password()->shouldBeLike(new Password('$2a$04$N2x1MTIgy8fth66TdWZ1NeHIjJIrK7Ns09I9xk1PDRn8IqkQSckua'));
    }

    function it_is_command(): void
    {
        $this->shouldHaveType(DomainEvent::class);
    }
}
