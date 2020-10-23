<?php

namespace App\Policy\Gates;

use App\Models\Admin;
use App\Policy\IPolicy;
use Illuminate\Support\Facades\Gate;

class RegisterGateClasses implements IRegisterGate
{
    private function gates(): array
    {
        return [
            // IPolicy::KEY                => ConcreteAccessGate::class . '@concreteMethod',
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
