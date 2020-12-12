<?php

namespace App\Policies\Gates;

use App\Models\Admin;
use App\Policies\IPolicy;
use Illuminate\Support\Facades\Gate;

class RegisterGateClasses implements IRegisterGate
{
    private function gates(): array
    {
        return [
            // IPolicy::KEY                => ConcreteAccessGate::class . '@concreteMethod',
            IPolicy::REVIEW_STORE           => ReviewAccessGate::class . '@store',
        ];
    }

    public function registerGates(): void
    {
        Gate::before(fn($user): ?bool => ($user instanceof Admin) ? true : null);

        foreach ($this->gates() as $name => $cateCallable) {
            Gate::define($name, $cateCallable);
        }
    }
}
