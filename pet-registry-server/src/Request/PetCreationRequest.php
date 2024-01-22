<?php declare(strict_types=1);

namespace App\Request;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Choice;

class PetCreationRequest
{
    public function __construct(
        // #[Assert\NotBlank(message: 'Dog\'s name cannot be empty')]
        // #[Assert\Type(type: 'string', message: 'Dog\'s name must be a string')]
        // public readonly string $petName,

        // #[Assert\NotBlank(message: 'Dog\'s breed cannot be empty')]
        // #[Assert\Type(type: 'string', message: 'Dog\'s breed must be a string')]
        // public readonly string $breed,

        // #[Assert\Choice(choices: ["I don't know", "It's a mix"], message: 'Invalid choice for breed')]
        // public readonly string $choice,

        // #[Assert\NotBlank(message: 'Gender cannot be empty')]
        // #[Assert\Choice(choices: ["female", "male"], message: 'Invalid gender')]
        // public readonly string $gender,
    ) {
    }
}
